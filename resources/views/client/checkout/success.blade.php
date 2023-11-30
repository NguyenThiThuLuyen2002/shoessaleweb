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
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold mb-1">Hóa đơn bán hàng</h2>
                    <h4 class="text-center font-weight-bold mb-0">THT SHOES STORE</h4>
                    <p class="text-center font-weight-bold"><small class="font-weight-bold">Phone No.: 0123456789</small></p>
                    <div class="row pb-2 p-2">
                        <div class="col-md-7">
                            <p class="mb-0"><strong>Số hóa đơn</strong>: {{ $order->vnp_TxnRef }}</p>
                            <p><strong>Tên khách hàng</strong>: {{ $user->name }}</p>
                        </div>

                        <div class="col-md-5 text-right">
                            <p class="mb-0"><strong>Ngày tạo</strong>: {{ $order->time_create }}</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-uppercase small font-weight-bold">STT</th>
                                    <th class="text-uppercase small font-weight-bold">Sản phẩm</th>
                                    <th class="text-uppercase small font-weight-bold">Số lượng</th>
                                    <th class="text-uppercase small font-weight-bold">Đơn giá</th>
                                    <th class="text-uppercase small font-weight-bold">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $index => $orderDetail)
                                @php
                                $totalQuantity += $orderDetail->quantity;
                                $totalAmount += $orderDetail->quantity * $orderDetail->productDetail->product->price;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $orderDetail->productDetail->product->name_product }} ({{ $orderDetail->productDetail->size . ', ' . $orderDetail->productDetail->color }})</td>
                                    <td>{{ $orderDetail->quantity }}</td>
                                    <td>{{ $orderDetail->productDetail->product->price }}</td>
                                    <td>{{ $orderDetail->quantity * $orderDetail->productDetail->product->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot class="font-weight-bold small">
                                <tr>
                                    <td colspan="2">Tổng</td>
                                    <td>{{ $totalQuantity }}</td>
                                    <td> </td>
                                    <td>{{ $totalAmount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <p class="mt-3">Cảm ơn bạn đã lựa chọn cửa hàng chúng tôi. Rất mong được gặp lại bạn!</p>

                </div>
            </div>
            <div class=" mt-3">
                <button class="btn btn-primary" onclick="printContent()">In</button>
                <button class="btn btn-success" onclick="exportToPDF()">Xuất PDF</button>
            </div>
        </div>

    </div>

</div>

@endsection