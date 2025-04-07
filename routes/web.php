<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// عرض جميع المنتجات
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

// عرض صفحة إنشاء منتج جديد
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

// تخزين المنتج الجديد في قاعدة البيانات
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

// عرض صفحة تعديل منتج معين
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

// تحديث بيانات المنتج
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');

// حذف منتج
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

// عرض جميع الأصناف
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

// عرض صفحة إنشاء صنف جديد
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');

// تخزين الصنف الجديد
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

// عرض صفحة تعديل صنف معين
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

// تحديث بيانات الصنف
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

// حذف صنف
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
