@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>قائمة المنتجات</h2>
        
        <!-- جدول عرض المنتجات -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>اسم المنتج</th>
                    <th>الصنف</th>
                    <th>الكمية</th>
                    <th>تاريخ الإضافة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td> <!-- عرض اسم الصنف -->
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->created_at->format('Y-m-d H:i') }}</td> <!-- عرض التاريخ -->
                        <td>
                            <!-- زر التعديل -->
                            <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-warning">تعديل</a>
                            <!-- زر الحذف -->
                            <form action="{{ route('admin.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
