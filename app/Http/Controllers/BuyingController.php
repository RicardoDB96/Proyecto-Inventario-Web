<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Buying;
use App\Models\BuyingRows;
use App\Models\Inventory;
use App\Models\InventoryLog;

class BuyingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos las compras
        $buyings = Buying::latest()->paginate(5);

        return view('buyings.index',['buyings'=>$buyings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::all();
        return view(('buyings.create'), compact('products'));
    }

    public function store(Request $request) {
        // Validación de datos
        $request->validate([
            'client' => 'required|string',
            'products.*.id' => 'required|exists:products,id',
            'products.*.cantidad' => 'required|integer|min:1'
        ]);

        // Crear la venta en la base de datos
        $buying = Buying::create([
            'client' => $request->client
        ]);

        $subtotal_buying = 0;
        $iva = 0.16;

        // Guardar los detalles de los productos
        foreach ($request->products as $product) {
            $product_model = Product::findOrFail($product['id']);
            $subtotal = $product['cantidad'] * $product_model->base_cost;
            $subtotal_buying += $product['cantidad'] * $product_model->base_cost;
            $row = new BuyingRows([
                'product_id' => $product['id'],
                'price' => $product_model->base_cost,
                'amount' => $product['cantidad'],
                'subtotal' => $subtotal,
                'iva' => $iva,
                'total' => ($subtotal * $iva) + $subtotal, // En este caso, total es igual a subtotal
            ]);
            $buying->rows()->save($row);

            // Actualizar las compras en el inventario
            $inventario = Inventory::findOrFail($product['id']);
            $inventario->aumentar($product['cantidad']);

            // Registro del inventario
            InventoryLog::create([
                'entity_id' => 1,
                'inventory_id' => $inventario->id,
                'initial_inventory' => $inventario->amount - $product['cantidad'],
                'delta_inventory' => $product['cantidad'],
                'final_inventory' => $inventario->amount,
                'row_id' => $row->id,
            ]);
        }

        // Añadimps el subtotal total a la selling
        $buying->subtotal = $subtotal_buying;
        $buying->iva = $iva;
        $buying->total = ($subtotal_buying * $iva) + $subtotal_buying;
        $buying->save();

        // Redirigir al usuario a una página de confirmación
        return redirect()->route('buyings.index')->with('success', 'La compra ha sido registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener los Buying_Rows por su ID
        $buying_rows = BuyingRows::where('buying_id', $id)->get();

        // Pasar los datos del producto a la vista
        return view('buyings.show', compact('buying_rows'));
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $buyings = Buying::where('client','LIKE', '%' . $search_text . '%')
        ->paginate(3);

        $buyings->appends(['query' => $search_text]);

        return view('buyings.search',compact('buyings'));
    }

    public function filter(Request $request){
        $startDate=$request->input('start_date');
        $endDate=$request->input('end_date');

        $buyings = Buying::whereBetween('created_at', [$startDate, $endDate])
                            ->paginate(4);
                            $buyings->appends(['start_date' => $startDate])
                                    ->appends(['end_date'=>$endDate]);

        return view('buyings.index',compact('buyings'));
    }
}
