<!DOCTYPE html>
<html>

<body>

  <h2>Login</h2>
  @if(Session::has('success'))
  <p>{{ Session::get('success') }}</p>
  @endif

  @if(Session::has('fail'))
  {{ Session::get('fail') }}
  @endif

  <form action="{{ route('login') }}" method="POST">
    @csrf
    <label for="fname">username:</label><br>
    <input type="text" name="username"><br>
    @error('username')
    <div>{{ $message }}</div>
    @enderror
    <label for="lname">Password:</label><br>
    <input type="text" name="password"><br><br>
    @error('password')
    <div>{{ $message }}</div>
    @enderror
    <input type="submit" value="Submit">
    <div class="flex items-center justify-end mt-4">
      <a href="{{ route('login-with-google') }}">
          <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
          Đăng nhập với google
      </a>
  </div>
  </form>
</body>

</html>
