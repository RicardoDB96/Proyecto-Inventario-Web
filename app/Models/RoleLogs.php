<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleLogs extends Model
{
    use HasFactory;
    protected $fillable = ['role_id', 'user_id', 'action', 'description'];

    public static function createLog($roleId, $userId, $action, $description)
    {
        return self::create([
            'role_id' => $roleId,
            'user_id' => $userId,
            'action' => $action,
            'description' => $description
        ]);
    }
}
