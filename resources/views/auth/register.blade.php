<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
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
  font-family: Average, sans-serif;
  width: 300px;
  height: auto; /* Adjusted for content */
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 15px;
  border: 1px solid #000;
  background-color: rgba(255, 255, 255, 0.69);
  padding: 20px;
  text-align: center;
}

.signup-heading {
  color: #F3CB51;
  font-size: 24px;
}

.form-control {
  width: 250px;
  height: 40px;
  border: 1px solid #7E7E7E;
  border-radius: 10px;
  margin-top: 10px;
  padding: 5px;
  font-size: 16px;
}

.details-text {
  margin-top: 10px;
  margin-bottom: 10px;
  color: #000;
  font-size: 15px;
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
}
</style>
</head>
<body>

<div class="container">
  <div class="signup-heading">SIGN UP</div>
  <div class="details-text">Enter your details to create your account</div>
  
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
    
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="submit" class="btn btn-primary">Register</button>
      <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('login') }}'">Cancel</button>
    </div>
  </form>

  <div class="already-account">Already have an account? <a href="{{ route('login') }}">Login</a></div>
  
</div>

</body>
</html>
