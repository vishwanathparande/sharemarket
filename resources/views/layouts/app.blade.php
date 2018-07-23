<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ProSchool') }}</title>

        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}" defer></script>-->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('js/js.cookie.min.js') }}" defer></script>
        <script src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.min.js') }}" defer></script>
        <script src="{{ asset('js/jquery.blockui.min.js') }}" defer></script>
        <script src="{{ asset('assets/bootstrap-switch/js/bootstrap-switch.min.js') }}" defer></script>

        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/components-rounded.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins.min.css') }}" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">
        <style>
            #loading {
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                position: fixed;
                display: block;
                opacity: 0.9;
                background-color: #fff;
                z-index: 99;
                text-align: center;
            }

            #loading-image {
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 9999;
            }
        </style>
        <script type="text/javascript">
$(document).ready(function () {

    /*----Ajax Loading Start----*/
    $("#loading").hide();
    $(document).ajaxStart(function () {
        $("#loading").show();
    });
    $(document).ajaxComplete(function () {
        $("#loading").hide();
    });
    $(document).ajaxError(function () {
        $("#loading").hide();
    });
    /*----Ajax Loading End----*/
});
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ProSchool') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                            @if (Auth::user()->role == 'user')
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/files">
                                    Videos
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/users">
                                    Users
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/files">
                                    Videos
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/files/create">
                                    Add Video
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div id="loading" ><img  id="loading-image" src="/img/loading.gif"></div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" role="dialog" style="top:2%; overflow-x:hidden !important; overflow-y:hidden !important;">
                    <div class="modal-dialog" style="margin-top:20%; width:auto;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title left">Share Market Video</h4>
                                <button type="button" class="btn btn-danger videoClose" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body videoBody">
                                <video width="400" controls>
                                    <source src="" type="video/mp4">
                                    Your browser does not support video.
                                </video>
                            </div>
                        </div>

                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </body>
</html>
