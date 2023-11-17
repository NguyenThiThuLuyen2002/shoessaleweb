@extends('admin.layouts.app')
@section('title', 'Danh sách sản phẩm')
@section('content')
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Category</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->avt }}" width="120px" height="120px" alt=""></td>
        <td>{{ $product->category->name_category }}</td>
        <td>{{ $product->name_product }}</td>
        <td>{{ number_format($product->price, 0, '.', '.') }} VND</td>
        <td>{{ $product->description }}
        <td>
            <a href="/admin/products/detail/{{ $product->id }}" class="btn btn-primary">Detail</a>
            <a href="/admin/products/update/{{ $product->id }}" class="btn btn-warning">Edit</a>
            <button class="btn btn-delete btn-danger">Delete</button>
        </td>
    </tr>
    @endforeach

</table>
{{ $products->links() }}
@endsection