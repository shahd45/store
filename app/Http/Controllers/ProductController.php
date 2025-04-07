<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product; 
use App\Models\Category;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    
    // عرض قائمة المنتجات
    public function index()
    {
        $products = Product::with('category')->get(); // جلب كل المنتجات مع الصنف
        return view('admin.products.index', compact('products'));
    }  
    // عرض صفحة إنشاء منتج
    public function create()
{
    $categories = Category::all();  // جلب جميع الأصناف
    return view('admin.products.create', compact('categories'));
}


    // حفظ المنتج في قاعدة البيانات
    public function store(Request $request)
{
    // التحقق من تسجيل الدخول
    if (auth()->check()) {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        // إنشاء المنتج
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),  // استخدام id المستخدم الحالي
        ]);

        return redirect()->route('admin.products.index')->with('success', 'تم إضافة المنتج بنجاح');
    } else {
        // إذا لم يكن المستخدم مسجل دخوله، يعاد توجيه المستخدم إلى صفحة تسجيل الدخول
        return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
    }
}


    // عرض صفحة التعديل
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // إحضار جميع الأصناف لتحديد الصنف أثناء التعديل
        return view('admin.products.edit', compact('product', 'categories'));
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

        return redirect()->route('admin.products.index'); // العودة إلى صفحة المنتجات بعد التحديث
    } 

    // حذف المنتج
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index'); // العودة إلى صفحة المنتجات بعد الحذف
    }
}