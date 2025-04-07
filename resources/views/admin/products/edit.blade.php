@extends('layouts.app')

@section('content')

<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="container">
    <h2>تعديل المنتج</h2>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">اسم المنتج</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الكمية</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الوصف</label>
            <textarea name="description" id="" class="form-control" value="{{ old('description', $product->description) }}" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">السعر</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">التصنيف</label>
            <select name="category_id" class="form-control">
                <option value="">اختر تصنيف</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div></form>

@endsection