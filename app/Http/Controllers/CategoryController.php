<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    // عرض الأصناف
    public function index()
    {
        $categories = Category::all(); // جلب جميع الأصناف
        return view('admin.categories.index', compact('categories'));
    }

    // صفحة إنشاء صنف جديد
    public function create()
    {
        return view('admin.categories.create');
    }

    // حفظ الصنف الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index');
    }

    // صفحة تعديل الصنف
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // تحديث الصنف بعد التعديل
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index');
    }

    // حذف الصنف
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
