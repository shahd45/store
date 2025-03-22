<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


// عرض قائمة المنتجات (
Route::get('/products', [ProductController::class, 'index'])->name('admin.index');

// عرض صفحة إضافة منتج جديد
Route::get('/products/create', [ProductController::class, 'create'])->name('admin.create');

// تخزين المنتج الجديد
Route::post('/products', [ProductController::class, 'store'])->name('admin.store');
// صفحة التعديل
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');

// حفظ التعديلات
Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.update');

// حذف المنتج
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.destroy');
///////////////////////
// صفحة عرض الأصناف
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

// صفحة إنشاء صنف جديد
Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');

// حفظ الصنف الجديد
Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

// تعديل الصنف
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

// تحديث الصنف بعد التعديل
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

// حذف الصنف
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

Route::resource('categories', CategoryController::class);
