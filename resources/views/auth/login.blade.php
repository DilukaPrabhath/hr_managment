<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>sign in / sign up</title>
    <script src="https://kit.fontawesome.com/22769a361a.js"></script>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
        *{
            box-sizing: border-box;
        }
        body{
            font-family: 'Montserrat', sans-serif;
            background : #f6f5f7;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;  
        }
        a:hover{
        background-color: black;
        color: white;
        transition: 2s;
      }
        .h1{
            font-weight: bold;
            margin: 0;
        }
        .p{
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }
        span{
            font-size: 12px; 
        }
        a{
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }
        .container{
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,25), 0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }
        .form-container form{
            background:#fff;
            display: flex;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .social-container{
            margin: 20px 0;
        }
        .social-container a{
            border: 1px solid #ddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }
        .form-container input{
            background :#eee;
            border:none;
            padding: 12px 15px;
            width: 100%;
            margin: 8px 0;
        }
        button{
            border-radius:20px;
            border:1px solid black;
            background-color: white;
            color: #000;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px; 
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in; 
        }
        button:hover{
        background-color: black;
        color: white;
        transition: 2s;
      }
        button:active{
            transform: scale(0.95);
        }
        button:focus{
            outline: none;
        }
        button.ghost{
            background:transparent; 
            border-color: #fff;
        }
        .form-container{
            position: absolute;
            top: 0px;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }
        .sign-in-container{
            left:0;
            width: 50%;
            z-index: 2;
        }
        .sign-up-container{
            left:0;
            width: 50%;
            z-index: 2;
            opacity: 1;
        }
        .overlay-container{
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }
        .overlay{
            background: #000;
            background:linear-gradient(to right, #000, #000) no-repeat 0 0 / cover;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }
        .overlay-panel{
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }
        .overlay-right{
            right: 0;
            transform: translateX(0);
        }

        .overlay-left{
            transform: translateX(-20%);
        }
            /*///////////////////animation/////////////////

    ///////////move signin to the right///////////*/

    .container.right-panel-active .sign-in-container{
        transform:translateX(100%);
    }
/*  ////////////////move overlay to left//////////*/

    .container.right-panel-active .overlay-container{
        transform:translateX(-100%);
    }

    /*///////////bring sign up over sign in//////////*/

    .container.right-panel-active .sign-up-container{
        transform:translateX(100%);
        opacity:1;
        z-index:5;
    }
    /*////////////move overlay back to right////////// */
    .container.right-panel-active .overlay{
        transform: translateX(50%);
    }


    .container.right-panel-active .overlay-left{
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right{
        transform: translateX(20%);
    }
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0 0 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.f
{
 border-radius: 5px;
 width: 70%;
 font-size: 17px;
 margin: 10px;
}
    </style>

</head>
<body>

    <div id="container" class="container" style="border-color: purple;">
        <div class="overlay-panel overlay-left" style="background-color: #8603FF;">
             <img src="{{asset('logo2s.png')}}" width="100%" height="70" style="padding-right:-45px;padding-left: 75px;">

             <h1 style="top: 10%;color: white; position: relative; left: 40px;">WELCOME !</h1>
             <h2 style="color: white; margin-left: 70px; margin-top: 40px;">to</h2>
             <h2 style="color: white; position: relative;left: 40px; margin-top: 5px;">HR SYSTEM</h2>
            
            
        </div>
        <!-- <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                </div>
                <span>or use your account</span>
                
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Forget your password?</a>
                <button>Sign In</button>
            </form>
        </div> -->
        <div class="overlay-panel overlay-right f" style="">
            <div class="card" style="width: 100%;margin-left: 90px;">
                <div class="card-header" style="margin-bottom: 40px;"><h2>{{ __('Login') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror f" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                <div class="col-md-6">
                                @error('email')
                                    <span class="invalid-feedback col-md-6" style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror f" name="password" required autocomplete="current-password">
                                <div class="col-md-6">
                                @error('password')
                                    <span class="invalid-feedback col-md-6" style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" style="visibility: hidden;">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                    {{ __('Login') }}
                                </button>

                               <!--  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div>
                <!-- <div class="overlay-panel overlay-right">
                    <img style="width: 150%; height: 100%" src="img/5655.jpg">
                    <h1 style="position: absolute;top: 20%;left: 50%;transform: translate(-50%, -50%);">Hello,Friend!</h1>
                    <p style="position: absolute;top: 40%;left: 50%;transform: translate(-50%, -50%);">Enter your personal details and start journey with us</p>
                    <button style="color: white;position: absolute;top: 60%;left: 50%;transform: translate(-50%, -50%);" class="ghost" id="signUp">Sign Up</button>
                    
                </div>
                 -->
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
        
        // const signUpButton = document.getElementById('signUp');
        // const signInButton = document.getElementById('signIn');
        // const container = document.getElementById('container');

        // signUpButton.addEventListener('click',()=>container.classList.add('right-panel-active'));
        // signInButton.addEventListener('click',()=>container.classList.remove('right-panel-active'));


    </script>
</body>
</html>