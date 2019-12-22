<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                overflow: hidden;
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
                right: 25px;
                top: 18px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .landing-wrapper
            {
                padding-top: 50px;
                width: 80%;
                height: 90vh;
            }
            .landing-wrapper .row
            {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
            }
            .landing-img
            {
                padding-top: 100px;
                height: 500px;
                width: 750px;
            }
            .landing-part-1, .landing-part-2
            {
                width: 50%;
            }
            .landing-part-1 h1
            {
                color: #0984e3;
                font-size: 50px;
                font-weight: bold;
            }
            .landing-btn-1, .landing-btn-2
            {
                text-transform: uppercase;
                margin: 20px;
                padding: 20px;
                background: none;
                border: none;
                font-size: 20px;
                border-radius: 20px;
                color: white;
                transition: all 0.3s ease-in-out;
                cursor: pointer;
            }
            .landing-btn-1
            {
                background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            }
            .landing-btn-2
            {
                background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
            }
            .landing-btn-1:hover, .landing-btn-2:hover
            {
                transform: translateY(-10px);
                box-shadow: 0 1px 20px 3px grey;
            }
            @media(max-width: 900px) {
                .landing-wrapper .row
                {
                    display: block;
                }
                .landing-part-1, .landing-part-2
                {
                    width: 100%;
                }
                .landing-part-1 h1
                {
                    color: #0984e3;
                    font-size: 35px;
                    font-weight: bold;
                }
                .landing-btn-1, .landing-btn-2
                {
                    padding: 15px;
                    margin: 10px;
                    margin-left: 0px;
                    font-size: 15px;
                }
                .landing-img
                {
                    padding-top: 50px;
                    height: 300px;
                    width: 300px;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="/home">Home</a>
                        <a href="/student/profile">Profile</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container landing-wrapper">
                <div class="row">
                    <div class="col-6 landing-part-1">
                        <h1>Home Away</h1>
                        <h1>From Home</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cum dolorum, earum est fuga id minus quae saepe temporibus voluptatibus.</p>
                        <button class="landing-btn-1">Watch Video</button>
                        <button class="landing-btn-2">Learn More</button>
                    </div>
                    <div class="col-6 landing-part-2">
                        <img class="img-fluid landing-img" src="{{url('images/landing.svg ')}}">
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
