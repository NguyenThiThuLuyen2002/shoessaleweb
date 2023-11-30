@extends('client.layouts.app')
@section('title', 'Thanh toán')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thanh toán</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Trang chủ</a>
                        <a href="">Shop</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="table">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Size</th>
                                <th>Màu sắc</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ request('name') }}</td>
                                <td>{{ request('size') }}</td>
                                <td>{{ request('color') }}</td>
                                <td>{{ request('quantity') }}</td>
                                <td>{{ number_format(request('price'), 0, '.', ',') }}</td>
                                <td>{{ number_format(request('total'), 0, '.', ',') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="/vnpay" method="POST">
                <div>
                    <b>Nhập địa chỉ</b>
                <textarea name="address" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Tổng thanh toán</h6>
                    <ul>
                        <li>Tổng <span>{{ number_format(request('total'), 0, '.', ',') }} VND</span></li>
                    </ul>
                    
                        @csrf
                        <input name="total" value="{{  $totalAmount }}" type="hidden">
                        <input name="quantity" value="{{ request('quantity') }}" type="hidden">
                        <input name="id_product_detail" value="{{ request('detailId') }}" type="hidden">
                        <button type="submit" name="redirect" class="primary-btn" style="width: 100%;">Thanh toán VNPay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection