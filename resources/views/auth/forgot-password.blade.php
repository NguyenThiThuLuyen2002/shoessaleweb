<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('forgot.password.submit') }}">
            @csrf

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Send Password Reset Link</button>
        </form>
    </div>
</body>
</html>