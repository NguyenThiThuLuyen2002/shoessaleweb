@extends('admin.layouts.app')
@section('title', 'Thêm sản phẩm')
@section('content')
<a href="/admin/products/list" class="btn btn-success mb-2">Danh sách sản phẩm</a>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="">
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="id_category">
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name_category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name_product" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Giá </label>
            <input type="number" name="price" class="form-control" placeholder="Nhập giá" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label>Mô Tả </label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" accept="image/*" name="image_upload" id="image-input" class="form-control">
            <img src="" id="show-image" alt="" width="150px">
        </div>
        <div class="form-group">
            <label>Chi tiết sản phẩm</label>
            <div id="detail-container">
                <div class="row detail-row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Size</label>
                            <input type="number" class="form-control" name="details[0][size]" placeholder="Nhập size">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Màu sắc</label>
                            <input type="text" class="form-control" name="details[0][color]" placeholder="Nhập màu sắc">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="details[0][inventory_number]" placeholder="Nhập số lượng">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="details[0][image_detail_upload123]" accept="image/*" class="image-input-detail form-control">

                        <img src="" class="show-image-detail" alt="" width="80px">
                    </div>
                    <div class="col-sm-1">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <a href="javascript:;" class="btn btn-success" id="add-new-detail">Thêm</a>
                </div>
            </div>
        </div>
    </div>

    <div style="border-top: 1px solid rgba(0, 0, 0);">
        <button type="submit" class="btn btn-primary mt-3" >Thêm Sản Phẩm</button>
    </div>
    @csrf
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/template/admin/js/product.js"></script>
@endsection