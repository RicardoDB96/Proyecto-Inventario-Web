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
            $subtotal = $product['cantidad'] * $product_model->base_price;
            $subtotal_buying += $product['cantidad'] * $product_model->base_price;
            $row = new BuyingRows([
                'product_id' => $product['id'],
                'price' => $product_model->base_price,
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
        return redirect()->route('buyings.create')->with('success', 'La compra ha sido registrada correctamente.');
    } 
}
