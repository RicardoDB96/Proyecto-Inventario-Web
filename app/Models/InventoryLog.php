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
}
