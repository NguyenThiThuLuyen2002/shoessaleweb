<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotpassword</title>

    <!-- Thêm link CSS của Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container card col-4 rounded shadow mt-5 p-5"> 
        <div class=" text-center text-info fw-bold  mt-4 ">
            <h3 >Quên mật khẩu ?</h3>
        </div>
        <div >
            <p >Điền email gắn với tài khoản của bạn để nhận đường dẫn thay đổi mật khẩu</p>
        </div>
        <form method="POST" action="{{ route('forgot.password.submit') }}">
            @csrf

            <div class="form-group mt-2">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2">Tiếp tục</button>
        </form>
        <div class=" text-center text-info fw-bold  mt-4 ">
            <a class="form__link" href="{{ route('login') }}">Quay lại đăng nhập</a>
        </div>
    </div>
</body>
</html>