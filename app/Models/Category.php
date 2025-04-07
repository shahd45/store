<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // السماح بالتعبئة الجماعية للـ 'name'
    protected $fillable = ['name'];

    // علاقة "إلى العديد" مع المنتجات (Product)
    public function products()
    {
        return $this->hasMany(Product::class); // يعيد المنتجات المرتبطة بهذا الصنف
    }
}
