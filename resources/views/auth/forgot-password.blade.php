<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotpassword</title>

    <!-- Thêm link CSS của Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyJq4Ck4rGg5J7J7NQZ5Ai85v5JFKdiJSX" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5"> <!-- Thêm class mt-5 để có khoảng cách từ đỉnh trang -->
        <form method="POST" action="{{ route('forgot.password.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        </form>
    </div>
</body>
</html>