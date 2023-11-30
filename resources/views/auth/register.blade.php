<!-- resources/views/auth/register.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body >
    <div class="container d-flex align-items-center justify-content-center ">
        <div class="col-10 mt-5 rounded shadow bg-light">
        
            <div class="row ">
                <div class="col-md-6">
                    <!-- left -->
                    <div class="row justify-content-center align-items-center" >
                        <img src="template/client/img/logo.png" alt="logo">
                        <img src="https://hips.hearstapps.com/hmg-prod/images/best-shoes-for-nurses-1654635748.png?crop=0.447xw:1.00xh;0,0&resize=640:*" alt="Bức hình" width="100%" >
                        
                    </div> 
                </div>
                <div class="col-md-6">
                    <!-- right -->
                    <div class="container pt-2 pb-2">                                            
                        <div class=" text-center text-info mt-4 mb-4">
                            <strong>{{ __('ĐĂNG KÝ KHÁCH HÀNG') }}</strong>
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="registrationForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form_group mb-2">
                                <label for="name" >{{ __('Tên') }}<span class="text-danger">*</span></label>
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name"  required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                                                
                            <div class="form_group mb-2">
                                <label for="email">{{ __('Email') }}<span class="text-danger">*</span></label>
                                <div>
                                    <input id="email" type="text" class="form-control @error('emai') is-invalid @enderror"
                                        name="email"  required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                            
                            <div class="form_group mb-2">
                                <label for="password">{{ __('Mật khẩu') }}<span class="text-danger">*</span></label>
                                <div>
                                    <div>
                                        <div class="input-icon ">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            <i id="togglePassword" class="fas fa-regular fa-eye-slash"></i> 
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                       
                            <div class="form_group mb-2">
                                <label for="password_confirmation">{{ __('Nhập lại mật khẩu') }}<span class="text-danger">*</span></label>
                                <div>
                                    <div class="input-icon ">
                                        <input id="password_confirmation" type="password" class="form-control w-100" name="password_confirmation" required autocomplete="new-password" >
                                        <i id="toggleConfirmPassword" class="fas fa-regular fa-eye-slash"></i>
                                    </div>
                                </div>
                                <span id="password-match-error" class="text-danger"></span>                                          
                            </div>
                            <div class="row">
                                <div class="col text-center mt-4">
                                        <button type="submit"  class="btn btn-primary btn-lg w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row d-flex mt-2 justify-content-center align-items-center"> 
                                <p>Do you have an account ? <a class="text-primary" href="{{ route('login') }}" >Login</a></p>
                            </div>                         
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {
        // Lắng nghe sự kiện khi người dùng nhập vào trường email
        $('input[name="email"]').on('input', function () {
            // Lấy giá trị từ trường email
            var emailValue = $(this).val().trim();

            // Kiểm tra xem có phải là địa chỉ email có đuôi là @gmail.com hay không
            var isValidEmail = /^[a-zA-Z0-9._-]+@gmail\.com$/.test(emailValue);

            // Hiển thị thông báo lỗi nếu không hợp lệ
            if (!isValidEmail) {
                $('#email-error').text('Email phải có đuôi @gmail.com');
            } else {
                $('#email-error').text('');
            }

            // Cập nhật trạng thái của nút Register
            // updateButtonState();
        });

        // Cập nhật trạng thái của nút Register
        function updateButtonState() {
            var name = $('input[name="name"]').val().trim();
            var email = $('input[name="email"]').val().trim();
            var password = $('input[name="password"]').val().trim();
            var confirmPassword = $('input[name="password_confirmation"]').val().trim();

            var isValid = name !== "" && email !== "" && password !== "" && confirmPassword !== "";
            isValid = isValid && /^[a-zA-Z0-9._-]+@gmail\.com$/.test(email);

            $('button[type="submit"]').prop('disabled', !isValid);
        }
    });


    document.addEventListener('DOMContentLoaded', function () {
        var passwordField = document.getElementById('password');
        var confirmPasswordField = document.getElementById('password_confirmation');
        var passwordMatchError = document.getElementById('password-match-error');
        var registrationForm = document.getElementById('registrationForm');

        function checkPasswordMatch() {
            var password = passwordField.value;
            var confirmPassword = confirmPasswordField.value;

            if (password !== confirmPassword) {
                passwordMatchError.textContent = 'Mật khẩu không khớp.';
            } else {
                passwordMatchError.textContent = '';
            }
        }

        function checkBothFields() {
            var password = passwordField.value;
            var confirmPassword = confirmPasswordField.value;

            if (password !== '' && confirmPassword !== '') {
                checkPasswordMatch();
            }
        }

        passwordField.addEventListener('input', checkBothFields);
        confirmPasswordField.addEventListener('input', checkBothFields);
    });
</script>

</body>
</html>




