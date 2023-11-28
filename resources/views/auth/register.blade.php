<!-- resources/views/auth/register.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class="col-10 mt-5 rounded shadow">
        
            <div class="row ">
                <div class="col-md-6">
                    <!-- left -->
                    <div class="row justify-content-center align-items-center" >
                        <img src="data:image/jpeg;base64,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" alt="Bức hình" width="100%" >
                        
                    </div> 
                </div>
                <div class="col-md-6">
                    <!-- right -->
                    <div class="container">
                        <div class="row justify-content-center align-items-center" >
                            <div class="card" style="border: 0;border-radius: 10px;">
                                <div class=" text-center text-primary mt-4">
                                    <strong>{{ __('CUSTOMER REGISTRATION') }}</strong>
                                </div>
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
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tên') }}</label>
                                            <div class="col-md-7">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name"  required autocomplete="name" autofocus>
                                                @error('name')
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
                                    
                                        <div class="row mb-2">
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
                                        </div>
                                        
                                        <!-- <div class="row ">
                                            <div class="d-flex justify-content-center w-100 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col text-center">
                                                 <button type="submit" class="btn btn-primary btn-lg">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row d-flex mt-4 justify-content-center align-items-center"> 
                                            <p>Do you have an account ? <a class="text-primary" href="{{ route('form_login') }}" >Login</a></p>
                                        </div>                         
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


