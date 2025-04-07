@extends('layouts.app')  

@section('content')
    <h1>الأصناف</h1>

    <a href="{{ route('admin.categories.create') }}">إضافة صنف جديد</a>

    <table>
        <thead>
            <tr>
                <th>اسم الصنف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}">تعديل</a>

                        <!-- نموذج الحذف -->
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
