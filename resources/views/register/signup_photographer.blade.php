<!DOCTYPE html>
<html lang="en">
<head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/signup.css">
    <title>Signup photographer</title>
</head>
<style>
    .sign-up-active{
            font-weight: bolder;
            color: #3498db;
        }
</style>
<body>
    <div class="text-center logo-center">
        <a href="{{route('home.index')}}"><img src="/assets/images/black.png" class="logo" width="245px;"></a>
    </div>
    
    <div class="center-div">
        <div class="pull-left">
            <font size="4"> 
                <a href="{{route('home.index')}}"><span class="fa fa-home"></span></a>                    
            </font>
        </div>
        <div class="text-center">
            <a href="{{route('signin.index')}}"><font class="signin"><strong>SIGN IN</strong></font></a>                                            
            <!-- <hr> -->
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('signup.photographer')}}"><font class="signup"><strong>SIGN UP</strong></font></a>                
            <hr class="signup-hr">
        </div>
        <!-- <br> -->
        <hr>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('signup.photographer')}}"><button class="work-button active"><strong>Photographer</strong></button></a>
                <hr class="hr-20px">            
    
            </div>
            <div class="col-md-6">
                <a href="{{route('signup.client')}}"><button class="hire-button"><strong>Hire Photographer</strong></button></a>
                <hr class="hr-20px">            
            </div>
        </div>
        <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <font class="" size="3" ><strong>Name</strong></font><hr class="hr-5px">
                    <input class="mysignupInput @error('name') is-invalid @enderror" type="text" placeholder="Example Myname" name="name" value="{{old('name')}}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                    <font class="" size="3" ><strong>Email</strong></font><hr class="hr-5px">         
                    <input class="mysignupInput @error('email') is-invalid @enderror" type="email" placeholder="example@gmail.com" name="email" value="{{old('email')}}" required onkeyup="checkunique('username',this.value)">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                    <font class="" size="3" ><strong>Choose profile picture</strong></font><hr class="hr-5px">          
                    <input class="mysignupInput @error('image') is-invalid @enderror" type="file" placeholder="######" name="image" value="" onchange="readUrl(this)" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                    <img id="previewImage" style="height:100px; width:100px; display: none"/>             
                </div>
                <div class="col-md-6">
                    <font class="" size="3" ><strong>Password</strong></font><hr class="hr-5px">         
                    <input class="mysignupInput @error('password') is-invalid @enderror" type="text" placeholder="example@gmail.com" name="password" value="{{old('password')}}" onkeyup="checkunique('email',this.value)" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                    <font class="" size="3" ><strong>Re-type Password</strong></font><hr class="hr-5px">          
                    <input class="mysignupInput @error('password_confirmation') is-invalid @enderror" type="password" placeholder="######" name="password_confirmation" value="<%= data.password %>" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                        <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                </div>
            </div>
            
            <input type="hidden" value="photographer" name="type">
            
            <div class="text-center">    
                <button type="submit" class="create-button"><strong>Create Account</strong></button>
                <!-- <span class="error">already exist</span> -->

            </div>
        </form>
        
        <!-- <span class="text-center"><strong>OR</strong></span><hr class="hr-5px">          -->
        <div class="text-center">
            <hr class="hr-or">
            <font class="" size="3" ><strong>OR</strong></font><hr class="hr-or">     
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('google_signup','photographer')}}" method="get" enctype="multipart/form-data">
                    <input type="hidden" name="user_type" value="photographer">
                    <button class="gmail-button fa fa-google">&nbsp;&nbsp;&nbsp;&nbsp;Sign UP</strong></button>
                </form>
                {{-- <a href="{{route('google_signup')}}"><button class="gmail-button fa fa-google">&nbsp;&nbsp;&nbsp;&nbsp;Sign UP</strong></button></a> --}}
            </div>
            <div class="col-md-6">
                <button class="fb-button fa fa-facebook">&nbsp;&nbsp;&nbsp;&nbsp;Sign UP</strong></button>
            </div>
        </div>
    </div>

    <script>
        function readUrl(input) {
            if (input.files && input.files[0]) {
                $('#previewImage').show();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewImage')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>