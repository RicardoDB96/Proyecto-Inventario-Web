<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyingRows extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactivar las marcas de tiempo

    protected $fillable = ['buying_id','product_id', 'supplier_id','price','iva','amount','subtotal','total'];

    /**
     * Get the product associated with the inventory record.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
