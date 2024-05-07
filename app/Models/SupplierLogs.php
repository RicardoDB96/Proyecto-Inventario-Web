<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierLogs extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_id', 'user_id', 'action', 'description'];

    public static function createLog($supplierId, $userId, $action, $description)
    {
        return self::create([
            'supplier_id' => $supplierId,
            'user_id' => $userId,
            'action' => $action,
            'description' => $description
        ]);
    }
}
