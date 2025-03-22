<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product; 
use App\Models\Category;

class ProductController extends Controller
{
    
    // عرض قائمة المنتجات
    public function index()
    {
        $products = Product::with('category')->get(); // جلب كل المنتجات مع الصنف
        return view('admin.index', compact('products'));
    }  
    // عرض صفحة إنشاء منتج
    public function create()
{
    $categories = Category::all();  // جلب جميع الأصناف
    return view('admin.create', compact('categories'));
}


    // حفظ المنتج في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.index'); // العودة إلى قائمة المنتجات بعد الحفظ
    }

    // عرض صفحة التعديل
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // إحضار جميع الأصناف لتحديد الصنف أثناء التعديل
        return view('admin.edit', compact('product', 'categories'));
    }

    // تحديث المنتج بعد التعديل
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.index'); // العودة إلى صفحة المنتجات بعد التحديث
    }

    // حذف المنتج
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.index'); // العودة إلى صفحة المنتجات بعد الحذف
    }
}