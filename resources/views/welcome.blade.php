<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet">

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
            
            .convertedAmount {
                font-size: 16px;
                font-weight: 600;
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
                        <a href="{{ url('/admin') }}">Admin</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Currency Converter
                </div>
                <div class="body m-b-md">
                    {{ Form::open(['action' => 'WebController@convert', 'class'=>"form-inline", 'method' => 'GET']) }}
                    <div class="form-group">
                        {{ Form::label('amount', 'Amount:') }}
                        {{ Form::text('amount', null, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('convertFrom', 'From:') }}
                        {{ Form::select('convertFrom', [], null, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('convertTo', 'To:') }}
                        {{ Form::select('convertTo', [], null, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Convert', ['class'=>'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
                <div class='convertedAmount'>
                    asdfasdf
                </div>

                <script src="{{ asset('js/app.js') }}"></script>
                <script src="{{ asset('js/web.js') }}"></script>
            </div>
        </div>
    </body>
</html>
