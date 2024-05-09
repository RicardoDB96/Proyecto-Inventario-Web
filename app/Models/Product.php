<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','base_price','base_cost','category_id','is_active'];

    /**
    * Get the category associated with the inventory record.
    */
   public function category()
   {
       return $this->belongsTo(Category::class, 'category_id');
   }
}
