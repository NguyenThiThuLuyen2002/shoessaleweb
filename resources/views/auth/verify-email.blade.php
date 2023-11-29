

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 shadow">
                    <div class="card-header  bg-info"><h5>{{ __('Xác minh địa chỉ email của bạn') }}</h5></div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để lấy liên kết xác minh. ') }}
                        {{ __('Nếu bạn không nhận được email') }},

                        <form method="POST" action="{{ isset($user) ? route('verifyEmail', ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]) : '#' }}">
                            @csrf
                            <button  type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click vào đây để yêu cầu gửi lại') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
