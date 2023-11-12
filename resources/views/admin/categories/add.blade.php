@extends('admin.layouts.app')
@section('title', 'Thêm danh mục')
@section('content')

<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="category">Tên danh mục</label>
            <input type="text" name="name_category" class="form-control" placeholder="Nhập tên danh mục">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
    @csrf
</form>
@endsection