<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyingRows extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactivar las marcas de tiempo

    protected $fillable = ['buying_id','product_id','price','iva','amount','subtotal','total'];
}
