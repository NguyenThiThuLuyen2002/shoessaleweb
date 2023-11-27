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
                    <table>
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
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Tổng thanh toán</h6>
                    <ul>
                        <li>Tổng <span>{{ number_format(request('total'), 0, '.', ',') }} VND</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Thanh toán VNPay</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection