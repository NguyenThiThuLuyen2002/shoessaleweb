<!DOCTYPE html>
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
    <input type="text" name="email"><br>
    @error('email')
    <div>{{ $message }}</div>
    @enderror
    <label for="lname">Password:</label><br>
    <input type="text" name="password"><br><br>
    @error('password')
    <div>{{ $message }}</div>
    @enderror
    <input type="submit" value="Submit">
  </form>
</body>

</html>
