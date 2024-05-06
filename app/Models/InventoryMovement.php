<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory;

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class);
    }
}
