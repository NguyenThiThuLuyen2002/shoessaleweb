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
            <form class="form" id="b-form" method="POST" action="{{ route('register') }}">
                @csrf <!-- Add this for Laravel CSRF protection -->
                <h2 class="form_title title">Đăng ký</h2>
                @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                <input class="form__input" type="text" id="name" name="name" placeholder="Tên" required>
                <input class="form__input" type="text" id="email" name="email" placeholder="Email" required>
                <div class="input-wrapper">
                    <input class="form__input" id="password" type="password" name="password" placeholder="Mật khẩu"
                        required>
                    <i id="togglePassword" class="fas fa-regular fa-eye-slash toggle-password"></i>
                </div>
                <div class="input-wrapper">
                    <input class="form__input" id="password-confirm" type="password" name="password_confirmation"
                        placeholder="Nhập lại mật khẩu" required autocomplete="new-password" required
                        oninput="checkPasswordMatch()">
                    <i id="toggleConfirmPassword" class="fas fa-regular fa-eye-slash toggle-password"></i>
                </div>
                <span id="password-match-error" class="text-warning"></span>
                <button class="form__button button" type="submit">ĐĂNG KÝ</button>
            
                <span class="form__span">Bạn đã có tài khoản ? 
                    <a href="{{ route('login') }}">
                       Đăng nhập 
                    </a>
                </span>
            </form>
        </div>
        
        <div class="switch" id="switch-cnt">
            <img src="template/client/img/pic-register.jpg">
        </div>
    </div>
    <script>
        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
    
            if (password !== confirmPassword) {
                document.getElementById("passwordMatchError").style.display = "block";
            } else {
                document.getElementById("passwordMatchError").style.display = "none";
                // Nếu muốn submit form khi mật khẩu khớp, thêm dòng sau:
                // document.getElementById("registrationForm").submit();
            }
        }
    </script>
  </body>

</html>

<script src="template/client/js/togglePassword.js"></script>
<script src="template/client/js/checkpass.js"></script>