<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'category_id', 'user_id'];

    // علاقة المنتج بالفئة (Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة المنتج بالمستخدم (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
