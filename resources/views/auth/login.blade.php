@extends('layouts.app')

@section('content')
<html>
<head>
<title>Login Form Design</title>
   
<body>
   
    <div class="loginbox">
    <img src="{{ asset('assets/avatar.png') }}" class="avatar">
        <h1>Login Here</h1>
        <form method="POST" action="{{ route('login') }}">
                        @csrf
            <p>Email</p>
           
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
 
            <p>Password</p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  
            <input type="submit" class="btn btn-primary">
                   
                    </input>
                 
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a>
        </form>
        
    </div>

</body>
</head>
</html>
@endsection
