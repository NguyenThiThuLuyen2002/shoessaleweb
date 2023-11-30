<style>
    @font-face {
        font-family: 'YourCustomFont';
        src: url('/fonts/your-custom-font.woff2') format('woff2');
    }
    
    body {
        font-family: 'YourCustomFont', sans-serif;
    }
</style>
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold mb-1">Hoa don ban hang</h2>
                    <h4 class="text-center font-weight-bold mb-0">THT SHOES STORE</h4>
                    <p class="text-center font-weight-bold"><small class="font-weight-bold">Phone No.: 0123456789</small></p>
                    <div class="row pb-2 p-2">
                        <div class="col-md-7">
                            <p class="mb-0"><strong>So hoa don</strong>: {{ $order->vnp_TxnRef }}</p>
                            <p><strong>Ten khach hang</strong>: {{ $user->name }}</p>
                        </div>

                        <div class="col-md-5 text-right">
                            <p class="mb-0"><strong>Ngay tao</strong>: {{ $order->time_create }}</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-uppercase small font-weight-bold">STT</th>
                                    <th class="text-uppercase small font-weight-bold">San pham</th>
                                    <th class="text-uppercase small font-weight-bold">So luong</th>
                                    <th class="text-uppercase small font-weight-bold">Don gia</th>
                                    <th class="text-uppercase small font-weight-bold">Thanh tien</th>
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
                                    <td colspan="2">Tong</td>
                                    <td>{{ $totalQuantity }}</td>
                                    <td> </td>
                                    <td>{{ $totalAmount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <p class="mt-3">Cam on ban da lua chon cua hang cua chung toi. Rat mong duoc gap lai ban!</p>

                </div>
            </div>
        </div>

    </div>

</div>