<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
use App\Models\Product;

class InventoryLog extends Model
{
    use HasFactory;

    protected $fillable = ['entity_id','inventory_id','initial_inventory','delta_inventory','final_inventory','row_id','creation_date'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'inventory_id'); // Ajusta 'inventory_id' si es diferente
    }
}
