<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Selling;
use App\Models\SellingRows;
use App\Models\Inventory;
use App\Models\InventoryLog;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos las ventass
        $sellings = Selling::latest()->paginate(5);

        return view('sellings.index',['sellings'=>$sellings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::all();
        return view(('sellings.create'), compact('products'));
    }

    public function store(Request $request) {
        // Validación de datos
        $request->validate([
            'client' => 'required|string',
            'products.*.id' => 'required|exists:products,id',
            'products.*.cantidad' => 'required|integer|min:1'
        ]);

        foreach ($request->products as $product) {
            // Recuperamos el inventario
            $inventario = Inventory::findOrFail($product['id']);

            // Verificar si la cantidad en el inventario es suficiente
            if ($inventario->amount < $product['cantidad']) {
                // No hay suficiente cantidad en el inventario, regresar con un mensaje de error
                return redirect()->route('sellings.create')->with('error', 'No hay suficiente cantidad en el inventario para el producto ' . $inventario->product->name);
            }
        }

        // Crear la venta en la base de datos
        $selling = Selling::create([
            'client' => $request->client
        ]);

        $subtotal_selling = 0;
        $iva = 0.16;

        // Guardar los detalles de los productos
        foreach ($request->products as $product) {
            // Recuperamos el inventario
            $inventario = Inventory::findOrFail($product['id']);

            $product_model = Product::findOrFail($product['id']);
            $subtotal = $product['cantidad'] * $product_model->base_price;
            $subtotal_selling += $product['cantidad'] * $product_model->base_price;
            $row = new SellingRows([
                'product_id' => $product['id'],
                'price' => $product_model->base_price,
                'amount' => $product['cantidad'],
                'subtotal' => $subtotal,
                'iva' => $iva,
                'total' => ($subtotal * $iva) + $subtotal
            ]);
            $selling->rows()->save($row);

            // Actualizar las ventas en el inventario
            $inventario = Inventory::findOrFail($product['id']);
            $inventario->reducir($product['cantidad']);

            InventoryLog::create([
                'entity_id' => 2,
                'inventory_id' => $inventario->id,
                'initial_inventory' => $inventario->amount + $product['cantidad'],
                'delta_inventory' => $product['cantidad'],
                'final_inventory' => $inventario->amount,
                'row_id' => $row->id,
            ]);
        }

        // Añadimps el subtotal total a la selling
        $selling->subtotal = $subtotal_selling;
        $selling->iva = $iva;
        $selling->total = ($subtotal_selling * $iva) + $subtotal_selling;
        $selling->save();

        // Redirigir al usuario a una página de confirmación
        return redirect()->route('sellings.index')->with('success', 'La venta ha sido registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener los Selling_Rows por su ID
        $selling_rows = SellingRows::where('selling_id', $id)->get();

        // Pasar los datos del producto a la vista
        return view('sellings.show', compact('selling_rows'));
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $sellings = Selling::where('client','LIKE', '%' . $search_text . '%')
        ->paginate(3);

        $sellings->appends(['query' => $search_text]);

        return view('sellings.search',compact('sellings'));
    }

    public function filter(Request $request){
        $startDate=$request->input('start_date');
        $endDate=$request->input('end_date');

        $sellings = Selling::whereBetween('created_at', [$startDate, $endDate])
                            ->paginate(4);
                            $sellings->appends(['start_date' => $startDate])
                                    ->appends(['end_date'=>$endDate]);

        return view('sellings.index',compact('sellings'));
    }
}
