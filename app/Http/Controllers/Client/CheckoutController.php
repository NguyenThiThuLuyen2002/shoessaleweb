<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Query\OrExpr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $productName = request('name');
        $productPrice = request('price');
        $productDetailId = request('detailId');
        $productSize = request('size');
        $productColor = request('color');
        $productQuantity = request('quantity');
        $totalAmount = request('total');


        return view('client.checkout.index', compact('productName', 'productPrice', 'productSize', 'productColor', 'productQuantity', 'totalAmount'));
    }

    public function vnpay_payment(Request $request)
    {
        $data = $request->all();
        $quantity = $data['quantity'];
        $idProductDetail =  $data['id_product_detail'];
        $address =  $data['address'];

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

        // Bây giờ $vnp_Returnurl chứa các tham số mới nằm sau cùng trong URL

        $vnp_Returnurl = "http://127.0.0.1:8000/vnpay-callback";

        //$vnp_Returnurl .= "&id_product_detail={$idProductDetail}&quantity={$quantity}";
        // Nếu $vnp_Returnurl không có dấu "?" (chưa có tham số), thêm dấu "?" vào đầu
        if (strpos($vnp_Returnurl, '?') === false) {
            $vnp_Returnurl .= "?";
        } else {
            // Nếu có tham số, thêm dấu "&" vào cuối
            $vnp_Returnurl .= "&";
        }
        // Thêm tham số vào sau cùng của URL
        $vnp_Returnurl .= "id_product_detail={$idProductDetail}&quantity={$quantity}&address={$address}";

        $vnp_TmnCode = "CGXZLS0Z";; //Mã website tại VNPAY 
        $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật
        $vnp_TxnRef = Str::uuid();
        $vnp_OrderInfo = 'Thanh toan hoa don';
        $vnp_OrderType = 'bill payment';
        $vnp_Amount = $data['total'] * 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    public function vnpay_callback(Request $request)
    {
        $quantity = $request->input('quantity');
        $idProductDetail = $request->input('id_product_detail');
        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $address = $request->input('address');
        if ($vnp_ResponseCode == '00') {
            DB::beginTransaction();
            try {
                $order = new Order();
                $order->vnp_TxnRef = $vnp_TxnRef; // Sử dụng UUID
                $order->id_user = Auth::id();
                $order->time_create = now();
                $order->checkout = 'Đã thanh toán';
                $order->address = $address;
                $order->save();

                $orderDetail = new OrderDetail();
                $orderDetail->id_order = $order->id;
                $orderDetail->id_product_detail = $idProductDetail;
                $orderDetail->quantity = $quantity;
                $orderDetail->status = 'Chờ xác nhận';
                $orderDetail->save();

                DB::commit(); // Commit transaction if everything is successful
            } catch (\Exception $e) {
                DB::rollback(); // Rollback in case of an error
                dd($e->getMessage());
                // Handle error message or log the error if necessary
            }
            return redirect()->route('checkout_success');
        }
    }
    public function checkout_success()
    {
        return view('client.checkout.success');
    }
}
