@extends('client.layouts.app')
@section('title', 'Thanh toán')
@section('content')
<div class="breadcrumb-option">
    <div class="d-flex justify-content-center align-items-center text-center py-5">
        <img src="{{ asset('template/client/img/success.png') }}" style="width:110px;height:100px">
        <h4>Đặt hàng thành công!</h4>
        <a>Xem đơn hàng</a>
    </div>
</div>
@endsection