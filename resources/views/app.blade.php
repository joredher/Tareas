<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel/Vue</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style type="text/css">

            .btn-primary:not(:disabled):not(.disabled):active:focus,
            .btn-warning:not(:disabled):not(.disabled):active:focus,
            .btn-danger:not(:disabled):not(.disabled):active:focus{
                box-shadow: none;
            }

            .form-control:focus{
                outline: none;
                background-color: #fff;
                border-color: #CED4DA;
                box-shadow: none;
            }

            .btn:focus{
                outline: none;
                box-shadow: none;
            }

            .btn{
                cursor: pointer;
            }
        </style>
        <!-- Fonts -->
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    </head>
    <body>
        <div class="container">

            @yield('content')

        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
    </body>
</html>
