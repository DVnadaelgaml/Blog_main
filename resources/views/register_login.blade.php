@extends('layout.master')
@section('styles')
    <style>

        @import url('https://fonts.googleapis.com/css?family=Mukta');

        body {
            font-family: 'Mukta', sans-serif;
            height: 100vh;
            min-height: 550px;
            background-image: url(http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow-y: hidden;
        }

        a {
            text-decoration: none;
            color: #444444;
        }

        .red{
            border: 1px solid red!important;
        }

        .login-reg-panel {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            width: 70%;
            right: 0;
            left: 0;
            margin: auto;
            height: 400px;
            background-color: #4ea8de;
        }

        .white-panel {
            background-color: rgba(255, 255, 255, 1);
            /*height: 500px;*/
            position: absolute;
            top: -150px;
            width: 50%;
            right: calc(50% - 50px);
            transition: .3s ease-in-out;
            z-index: 0;
            box-shadow: 0 0 15px 9px #00000096;
        }

        .login-reg-panel input[type="radio"] {
            position: relative;
            display: none;
        }

        .login-reg-panel {
            color: #fff;
        }

        .login-reg-panel #label-login,
        .login-reg-panel #label-register {
            border: 1px solid #9E9E9E;
            padding: 5px 5px;
            width: 150px;
            display: block;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
        }

        .login-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            left: 0;
            position: absolute;
            text-align: left;
        }

        .register-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            right: 0;
            position: absolute;
            text-align: left;

        }

        .right-log {
            right: 50px !important;
        }

        .login-show,
        .register-show {
            z-index: 1;
            display: none;
            opacity: 0;
            transition: 0.3s ease-in-out;
            color: #242424;
            text-align: left;
            padding: 50px;
        }

        .show-log-panel {
            display: block;
            opacity: 0.9;
        }

        .login-show input[name="phone"]{
            width: 100%;
            display: block;
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #b5b5b5;
            outline: none;
        }

        .login-show input[type="button"] {
            max-width: 150px;
            width: 100%;
            background: #444444;
            color: #f9f9f9;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            border-radius: 2px;
            float: right;
            cursor: pointer;
        }

        .login-show a {
            display: inline-block;
            padding: 10px 0;
        }

        .register-show input[name="phone"]{
            width: 100%;
            display: block;
            margin: 10px 0;
            padding: 12px;
            border: 1px solid #b5b5b5;
            outline: none;
        }
        .register-show input[type="password"],.register-show input[name="email"]
        ,.register-show input[name="name"]{
            width: 50%;
            float: left;
            margin: 20px 0;
            padding: 12px;
            border: 1px solid #b5b5b5;
            outline: none;
        }
        .register-show input[type="button"] {
            max-width: 150px;
            width: 100%;
            background: #444444;
            color: #f9f9f9;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            border-radius: 2px;
            float: right;
            cursor: pointer;
        }

        .credit {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #3B3B25;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            z-index: 99;
        }

        a {
            text-decoration: none;
            color: #2c7715;
        }
    </style>
@endsection
@section('content')
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Have an account?</h2>
            <label id="label-register" for="log-reg-show" class="btn btn-success">Login</label>
            <input type="radio" name="active-log-panel" id="log-reg-show">
        </div>
        <div class="register-info-box">
            <h2> Do not have an account? </h2>
            <label id="label-login" for="log-login-show" class="btn btn-success">Register</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>
            <div class="white-panel">
                <form action="{{route('login')}}" method="post">@csrf
                    <div class="login-show">
                        @if(session('error'))
                        <div class="alert alert-warning">{{session('error')}}</div>
                        @endif
                        <h2>LOGIN</h2>
                        <input type="text" placeholder="Email" name="email" class="{{session('errors') && session('errors')->has('email') ? 'red' : ''}}">
                        <input type="password" placeholder="Password" name="password" class="{{session('errors') && session('errors')->has('password') ? 'red' : ''}}">
                        <input type="submit" value="Login" class="btn btn-dark col-sm-3">
                        {{--                <a href="">Forgot password?</a>--}}
                    </div>
                </form>
                <form action="{{route('registerPost')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="register-show">
                    <h2>REGISTER</h2>
                    <input type="text" class="{{session('errors') && session('errors')->has('name') ? 'red' : ''}}" placeholder="Enter Your Name" name="name">
                    <input type="email" class="{{session('errors') && session('errors')->has('email') ? 'red' : ''}}" placeholder="Email" name="email">
                    <input type="text" class="{{session('errors') && session('errors')->has('phone') ? 'red' : ''}}" placeholder="Phone Number" name="phone">
                    <input type="password" class="{{session('errors') && session('errors')->has('password') ? 'red' : ''}}" placeholder="Password" name="password">
                    <input type="password" class="{{session('errors') && session('errors')->has('password_confirmation') ? 'red' : ''}}" placeholder="Confirm Password" name="password_confirmation">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control  {{session('errors') && session('errors')->has('gender') ? 'red' : ''}}">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Gender</label>
                        <select name="age" id="age" class="form-control  {{session('errors') && session('errors')->has('age') ? 'red' : ''}}">
                            @for($i=15;$i<=90;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" id="">
                    </div>
                    <input type="submit" value="Register" class="btn btn-dark col-sm-3">
                </div>
                </form>
            </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            @if(request()->is('register'))
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');
            @else
            $('.login-info-box').fadeOut();
            $('.login-show').addClass('show-log-panel');
            @endif

        });


        $('.login-reg-panel input[type="radio"]').on('change', function () {
            if ($('#log-login-show').is(':checked')) {
                $('.register-info-box').fadeOut();
                $('.login-info-box').fadeIn();

                $('.white-panel').addClass('right-log');
                $('.register-show').addClass('show-log-panel');
                $('.login-show').removeClass('show-log-panel');

            }
            if ($('#log-reg-show').is(':checked')) {
                $('.register-info-box').fadeIn();
                $('.login-info-box').fadeOut();

                $('.white-panel').removeClass('right-log');

                $('.login-show').addClass('show-log-panel');
                $('.register-show').removeClass('show-log-panel');
            }
        });

    </script>
@endsection
