@extends('layouts.app') 

@section('content')
    <h1>إضافة صنف جديد</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label for="name">اسم الصنف</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">حفظ</button>
    </form>
@endsection
