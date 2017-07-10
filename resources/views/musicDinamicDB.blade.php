<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Music</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
              @foreach($generos as $generof)
              @if($genero == $generof->GENERO)
                <div class="title m-b-md">
                    Music (Top {{$genero}})
                </div>
              @endif
              @endforeach

              @foreach($songs as $song)
                <li>{{$song->TITULO}}</a>
              @endforeach

              <!--  <div class="links">
                    <a href="http://www.billboard.com/charts/hot-100" >Despacito</a>
                    <a href="http://www.billboard.com/charts/hot-100">That's What I Like</a>
                    <a href="http://www.billboard.com/charts/hot-100">I'm The One</a>
                    <a href="http://www.billboard.com/charts/hot-100">Shape Of You</a>
                    <a href="http://www.billboard.com/charts/hot-100">Humble</a>
                </div>
                <div class="links">
                  <img src="http://www.billboard.com/images/pref_images/q61808osztw.jpg" width="100" height="100" style="padding-right:40px;padding-left:40px"></img>
                  <img src="http://www.billboard.com/images/pref_images/q59725qvpol.jpg" width="100" height="100" style="padding-right:80px"></img>
                  <img src="http://www.billboard.com/images/pref_images/q64532pl64x.jpg" width="100" height="100" style="padding-right:60px"></img>
                  <img src="http://www.billboard.com/images/pref_images/yyyy8542323582613406699.jpg" width="100" height="100" style="padding-right:40px"></img>
                  <img src="http://www.billboard.com/images/pref_images/q63694v2qz7.jpg" width="100" height="100" style="padding-right:40px"></img>
                </div>
                !-->
            </div>
        </div>
    </body>
</html>
