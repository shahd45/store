@extends('layouts.app') 

@section('content')
    <h1>تعديل الصنف</h1>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">اسم الصنف</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>

        <button type="submit">تحديث</button>
    </form>
@endsection
