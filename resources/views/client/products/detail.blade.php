@extends('client.layouts.app')
@section('title', $product->name_product)
@section('content')
<!-- Shop Details Section Begin -->
@if ($product->details->isNotEmpty())
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="/">Home</a>
                        <a href="">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    @foreach ($product->details as $detail)
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">
                                <div class="product__thumb__pic set-bg" data-setbg="/upload/products/details/{{ $detail->avt_detail }}">
                                </div>
                            </a>
                        </li>
                    </ul>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <img id="productImage" src="/upload/products/{{ $product->avt }}" style="width: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h3 id="productName">{{ $product->name_product }}</h3>
                        <h4 id="productPrice" data-price="{{ $product->price }}">{{ number_format($product->price, 0, '.', '.') }} VND</h4>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <select id="productType" class="form-select">
                                    @foreach ($product->details as $detail)
                                    <option value="{{ $detail->id }}" data-size="{{ $detail->size }}" data-color="{{ $detail->color }}" data-id-detail="{{ $detail->id }}">
                                        Size: {{ $detail->size }}, Color: {{ $detail->color }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="product__details__cart__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="productQuantity" type="number" value="1" min="1">
                                </div>
                            </div>
                            <button id="addToCart" class="primary-btn" onclick="addToCart()">Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->
@else
<p>Không có thông tin chi tiết cho sản phẩm này!</p>
@endif
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function addToCart() {
        var productNameElement = document.getElementById('productName');
        var productPriceElement = document.getElementById('productPrice');
        var selectedTypeElement = document.getElementById('productType');
        var productQuantityElement = document.getElementById('productQuantity');

        if (productNameElement && productPriceElement && selectedTypeElement && productQuantityElement) {
            var productName = productNameElement.innerText;
            var productPrice = parseFloat(productPriceElement.getAttribute('data-price')); // Lấy giá trị dưới dạng số
            var selectedSize = selectedTypeElement.options[selectedTypeElement.selectedIndex].getAttribute('data-size');
            var selectedColor = selectedTypeElement.options[selectedTypeElement.selectedIndex].getAttribute('data-color');
            var selectedDetailId = selectedTypeElement.options[selectedTypeElement.selectedIndex].getAttribute('data-id-detail');
            var productQuantity = productQuantityElement.value;

            var totalAmount = parseFloat(productQuantity) * productPrice;

            // Hiển thị giá trị thành tiền
            console.log('Thành Tiền: ' + totalAmount);

            // Chuyển hướng đến trang thanh toán với các tham số
            window.location.href = '/checkout?fromCart=true&name=' + encodeURIComponent(productName) +
                '&price=' + encodeURIComponent(productPrice) +
                '&detailId=' + encodeURIComponent(selectedDetailId) +
                '&size=' + encodeURIComponent(selectedSize) +
                '&color=' + encodeURIComponent(selectedColor) +
                '&quantity=' + encodeURIComponent(productQuantity) +
                '&total=' + encodeURIComponent(totalAmount);
        } else {
            console.error('Some elements are not found');
        }
    }
</script>

@endsection