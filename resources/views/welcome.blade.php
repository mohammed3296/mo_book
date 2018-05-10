
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
          <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
          <!-- Ionicons -->
          <link rel="stylesheet" href="{{asset('admin/css/ionicons.min.css')}}">    
          <link rel="stylesheet" href="{{asset('css/regstyle.css')}}" type="text/css" />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background: url({{asset('img/bg.jpg')}});">
        <div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"> <a href="#">Mobook</a> </div>
    
         
        <div id="header-main-right">
          <div id="header-main-right-nav">
        
      </div>
          </div>
      </div>
</div>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block" style="width: 500px;height: 50px;font-size: 32px">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-block" style="width: 500px;height: 50px;font-size: 32px">Register</a>
                    @endauth
                
            @endif
            </div>
        </div>
    </body>
</html>
