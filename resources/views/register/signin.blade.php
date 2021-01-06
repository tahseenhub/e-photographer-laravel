<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/signin.css">
        <title>Sign In</title>
    </head>
    <style>
        .sign-in-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
    <body>
        <div class="text-center logo-center">
            <a href="{{route('home.index')}}"><img src="assets/images/black.png" width="360px;" class="logo"></a>
        </div>
        <div class="center-div">
            <div class="pull-left">
                <font size="4"> 
                    <a href="{{route('home.index')}}"><span class="fa fa-home"></span></a>                    
                </font>
            </div>
            <div class="text-center">
                <a href="{{route('signin.index')}}"><font class="signin"><strong>SIGN IN</strong></font></a>            
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('signup.photographer')}}"><font class="signup"><strong>SIGN UP</strong></font></a>
                <hr class="signin-hr">
            </div>
            <hr>
            {{-- @if (Session::get('email')!= "")
                hello
            @endif --}}
            <form method="POST" action="{{route('login')}}">
                @csrf
                <font class="" size="3" ><strong>Email</strong></font>       
                <input class="mysigninInput form-control @error('email') is-invalid @enderror" type="email" placeholder="example@gmail.com" name="email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                    </span>
                @enderror
                <font class="" size="3" ><strong>Password</strong></font>        
                <input class="mysigninInput form-control @error('password') is-invalid @enderror" type="password" placeholder="######" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                    </span>
                @enderror

                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
                @if (Route::has('password.request'))
                    <a class="pull-right forgot-pass-tex" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <br> <br>
                {{-- <hr class="hr-22px"> --}}
                <div class="text-center">
                    <button type="submit" class="signin-button"><strong>Sign In</strong></button>
                </div>
                
                {{-- @if (Route::has('password.request'))
                    <a class="forgot-pass-text"  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
            </form>
        </div>
    </body>
</html>
