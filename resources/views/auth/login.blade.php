<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login or Sign Up</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
body {
  font-family: Average, sans-serif;
  margin: 0;
  padding: 0;
  min-height: 100vh;
  position: relative;
  background-image: url('img/HOME_1.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

body::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('asset/staff.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  z-index: -1;
}

.container {
  position: absolute;
  width: 300px;
  height: 400px;
  left: 50%; /* Center the container horizontally */
  top: 50%; /* Center the container vertically */
  transform: translate(-50%, -50%); /* Adjust the position correctly */
  border-radius: 15px;
  border: 1px solid #000;
  background-color: rgba(255, 255, 255, 0.69);
  padding: 20px;
  text-align: center;
  box-sizing: border-box;
}

.signup-heading {
  color: #F3CB51;
  font-size: 24px;
  margin-top: 10px;
}

.form-control {
  width: 250px;
  height: 40px;
  border: 1px solid #7E7E7E;
  border-radius: 10px;
  padding: 5px;
  font-size: 16px;
  color: #000;
  margin-top: 10px;
}

.details-text {
  width: 257px;
  height: 18px;
  font-family: Average;
  font-size: 15px;
  font-weight: 400;
  line-height: 18px;
  color: #000000;
  padding: 5px;
  border-radius: 5px;
  margin-top: 10px;
  margin-bottom: 10px;
  text-align: center;
}
.btn-group {
  margin-top: 20px;
  display: flex;
  justify-content: center;
}

.btn-primary {
  background-color: #187DE4;
  border: none;
  color: white;
  padding: 10px 20px;
  margin-right: 10px;
  border-radius: 5px;
  cursor: pointer;
}

.btn-secondary {
  background-color: #FFE2E5;
  border: none;
  color: black;
  padding: 10px 20px;
  margin-left: 10px;
  border-radius: 5px;
  cursor: pointer;
}

.already-account {
  margin-top: 20px;
  margin-bottom: 110px;
}

</style>
</head>
<body>

<div class="container">
 <div class="signup-heading">LOGIN</div>
 <div class="details-text">Enter your details to create your account</div>
 <form method="POST" action="{{ route('login') }}">
    @csrf
    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
    <div class="details-text">Forgot Password?</div>
    <div class="btn-group" role="group">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-secondary" onclick="window.location='#'">Cancel</button>
    </div>
 </form>
 <div class="already-account">Don't have an account yet? <a href="#">Sign Up</a></div>
</div>

</body>
</html>
