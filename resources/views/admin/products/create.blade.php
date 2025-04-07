@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>إنشاء منتج جديد</h2>

        <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
            <!-- اسم المنتج -->
            <div class="form-group">
                <label for="name">اسم المنتج</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- السعر -->
            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required min="0" step="0.01">
            </div>

            <!-- الكمية -->
            <div class="form-group">
                <label for="quantity">الكمية</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required min="1">
            </div>

            <label for="category_id">اختر الصنف</label>
<select name="category_id" id="category_id">
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>


            <!-- زر الحفظ -->
            <button type="submit" class="btn btn-primary">حفظ المنتج</button>
        </form>
    </div>
@endsection
