<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resetpassword</title>

    <!-- Thêm link CSS của Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container card col-4 rounded shadow mt-5 p-5">
        <div class=" text-center text-info ">
            <h3 class=" fw-bold ">Tạo mật khẩu mới</h3>
            <p></p>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $email ?? old('email') }}" disabled required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" required>
                @error('password')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Đổi mật khẩu</button>
        </form>
    </div>
</body>
</html>