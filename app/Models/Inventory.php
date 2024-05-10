<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Supplier;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','amount','is_active', 'supplier_id'];

    /**
     * Get the product associated with the inventory record.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Get the inventory associated with the inventory record.
     */
    public function inventory()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    /**
     * Aumentar la cantidad en el inventario.
     */
    public function aumentar($cantidad)
    {
        $this->amount += $cantidad;
        $this->save();
    }

    /**
     * Reducir la cantidad en el inventario.
     */
    public function reducir($cantidad)
    {
        $this->amount -= $cantidad;
        $this->save();
    }
}
