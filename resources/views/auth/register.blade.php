<!-- resources/views/auth/register.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Thêm Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="content-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <!-- Nội dung layout bên trái -->
                    <div class="row justify-content-center align-items-center" >
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSL_N5g4hSJLYrH9Fw0G61wWYDxPICPUQd9LQ&usqp=CAU" alt="Bức hình" width="100%" >
                        
                    </div> 
                </div>
                <div class="col-md-6">
                    <!-- Nội dung layout bên phải -->
                    <div class="container">
        <div class="row justify-content-center align-items-center" >
            <div class="card" style="border: 0;border-radius: 10px;">
                <div class="col-md-7 offset-md-5 text-primary mt-4"><strong>{{ __('ĐĂNG KÝ KHÁCH HÀNG') }}</strong></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-4">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Tên đăng nhập') }}</label>
                            <div class="col-md-7">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username"  required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>     
                                            
                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-7">
                                <input id="email" type="text" class="form-control @error('emai') is-invalid @enderror"
                                    name="email"  required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  
                        
                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>
                            <div class="col-md-7">
                                <div class="input-group">
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
                    
                        <div class="row mb-4">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu') }}</label>
                            <div class="col-md-7">
                            <div class="input-group">
                                <div class="input-icon ">
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"  oninput="checkPasswordMatch()">
                                    <i id="toggleConfirmPassword" class="fas fa-regular fa-eye-slash"></i>
                                </div>
                            </div>
                            <span id="password-match-error" class="text-warning"></span>
                        </div>
                        <div class="col-md-7 offset-md-6 mt-2"> 
                            <p>Bạn có tài khoản? <a class="text-primary" href="#" >Đăng nhập</a></p>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>                          
                    </form> 
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>

    <!-- Thêm Bootstrap JS và jQuery (đặt trước đó) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


<!-- <!DOCTYPE html>
<html>

<body>

  <h2>Register</h2>
  @if(Session::has('success'))
  <p>{{ Session::get('success') }}</p>
  @endif

  @if(Session::has('fail'))
  {{ Session::get('fail') }}
  @endif

  <form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="fname">Name:</label><br>
    <input type="text" name="name"><br>
    @error('name')
    <div>{{ $message }}</div>
    @enderror
    <label for="fname">Email:</label><br>
    <input type="email" name="email"><br>
    @error('email')
    <div>{{ $message }}</div>
    @enderror
    <label for="lname">Password:</label><br>
    <input type="password" name="password"><br><br>
    @error('password')
    <div>{{ $message }}</div>
    @enderror
    <input type="submit" value="Submit">
  </form>
</body>

</html> -->

<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Register</title>
  <script>
    function checkPasswordMatch() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("password-confirm").value;
      var errorElement = document.getElementById("password-match-error");

      if (password !== confirmPassword) {
        errorElement.textContent = "Mật khẩu không khớp.";
      } else {
        errorElement.textContent = "";
      }
    }
  </script>
</head>

<body>

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-10 col-lg-6 col-xl-7">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-8">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register </p>
                  <div class="container mt-5">
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif

                    @if(Session::has('fail'))
                    <p class="alert alert-danger">{{ Session::get('fail') }}</p>
                    @endif

                    <form action="{{ route('register') }}" method="POST" id="registrationForm">
                      @csrf
                      <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required id="password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="Nhập lại mật khẩu">{{ __('Nhập lại mật khẩu') }}</label>
                        <div class="input-icon">
                          <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required oninput="checkPasswordMatch()">
                          <i id="toggleConfirmPassword" class="fas fa-regular fa-eye-slash"></i>
                        </div>
                        <span id="password-match-error" class="text-warning"></span>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html> -->


