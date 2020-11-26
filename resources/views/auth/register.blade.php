@extends('layouts.app')

@section('content')
<body>
   
    <div class="loginbox-register">
    <img src="{{ asset('assets/avatar.png') }}" class="avatar">
        <h1>Register Here</h1>
        <form method="POST" action="{{ route('register') }}">
                        @csrf
            <p>Name</p>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                 @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <p>E-Mail Address</p>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            <p>Password</p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   

           
     
            <p>Confirm Password</p>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          
            <input type="submit" class="btn btn-primary">
                   
             </input>
                 
            
        </form>
        
    </div>

</body>

@endsection
