@extends('admin.layouts.app')
@section('title', $product->name_product)
@section('content')

<p><a href="/admin/products/list">Danh sách sản phẩm </a>/ <b>{{ $product->name_product }}</b></p>
@if ($product->details->isNotEmpty())
<table class="table table-hover">
    <tr>
        <th>Image</th>
        <th>Size</th>
        <th>Color</th>
        <th>Inventory</th>
        <th>Action</th>
    </tr>
    @foreach ($product->details as $detail)
    <tr>
        <td><img src="/upload/products/details/{{ $detail->avt_detail }}" width="100px" height="100px" alt=""></td>
        <td>{{ $detail->size }}</td>
        <td>{{ $detail->color }}</td>
        <td>{{ $detail->inventory_number }}
        <td>
            <a href="" class="btn btn-warning">Edit</a>
            <button class="btn btn-delete btn-danger">Delete</button>
        </td>
    </tr>
    @endforeach
</table>
@else
<p>Không có thông tin chi tiết cho sản phẩm này!</p>
@endif
@endsection