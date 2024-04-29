<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BuyingRows;

class Buying extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactivar las marcas de tiempo

    protected $fillable = ['client','iva','subtotal','total'];

    public function rows()
    {
        return $this->hasMany(BuyingRows::class);
    }
}
