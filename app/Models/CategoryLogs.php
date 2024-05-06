<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLogs extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'user_id', 'action', 'description'];

    public static function createLog($categoryId, $userId, $action, $description)
    {
        return self::create([
            'category_id' => $categoryId,
            'user_id' => $userId,
            'action' => $action,
            'description' => $description
        ]);
    }
}
