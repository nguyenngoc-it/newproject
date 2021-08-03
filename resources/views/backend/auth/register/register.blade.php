<link href="{{asset('assetsregister/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('assetsregister/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assetsregister/js/jquery.min.js')}}"></script>
<script src="{{asset('assetsregister/js/my.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<link rel="stylesheet" href="{{asset('assets1/css/register/style.css')}}">


<div class="container">

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form method="post" action="{{route('register.store')}}">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="name" type="text">
                </div> <!-- form-group// -->
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group input-group">
                    <div class="input-group-prepend" >
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input  name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email">
                </div> <!-- form-group// -->
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror

                <div class="form-group input-group">
                    <div class="input-group-prepend" id="eye">
                        <span class="input-group-text"> <i class="fas fa-eye-slash" id="icon-eye"></i> </span>
                    </div>
                    <input id="inputpassword" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Create password" type="password">
                </div> <!-- form-group// -->
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group input-group">
                    <div class="input-group-prepend" id="hiden-eye">
                        <span class="input-group-text"> <i class="fas fa-eye-slash" id="hiden-icon-eye"></i> </span>
                    </div>
                    <input id="repeatpassword" name="repeat-password" value="{{old('password')}}" class="form-control @error('repeat-password') is-invalid @enderror" placeholder="Repeat password" type="password">
                </div> <!-- form-group// -->
                @error('repeat-password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="{{route('showFormLogin')}}">Log In</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

</div>
<!--container end.//-->



