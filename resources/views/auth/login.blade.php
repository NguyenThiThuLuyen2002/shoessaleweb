@section('content')
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="template/client/css/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="template/client/font/fontawesome-free-6.4.2-web/css/all.min.css">
    </head>
<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="a-form" method="POST" action="{{ route('login') }}">
                @csrf <!-- Add this for Laravel CSRF protection -->
                <h2 class="form_title title">Đăng nhập</h2>                
                @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                <input class="form__input" type="text" id="email" name="email" placeholder="Email"
                    required>
                <!-- Add the 'required' attribute above -->
                <div class="input-wrapper">
                    <input class="form__input" id="password" type="password" name="password" placeholder="Mật khẩu"
                        required>
                    <i id="togglePassword" class="fas fa-regular fa-eye-slash toggle-password"></i>
                </div>
                <!-- Add the 'required' attribute above -->
                <a class="form__link" href="{{ route('forgot.password.form') }}">Bạn quên mật khẩu?</a>
                <button class="form__button button" type="submit">ĐĂNG NHẬP</button>
                <br>
                <br>
                

                <a href="{{ route('auth.google') }}">
                   
                    Đăng nhập với google
                </a>
                <br>
                <span class="form__span">Bạn chưa có tài khoản ? 
                    <a href="{{ route('register') }}">
                   
                   Đăng ký ngay
                </a></span>
            </form>
        </div>
        
        <div class="switch" id="switch-cnt">
            <img src="template/client/img/pic-login.jpg">
        </div>
    </div>
</body>

</html>

<script src="template/client/js/togglePassword.js"></script>