<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CottonAppAdm</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('css/menu_style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Lato';
            overflow: scroll;
        }
        .container-content {
          margin-left: 10%;
        }
        .btn {
          border-radius: 0;
        }
        .fa-btn {
            margin-right: 6px;
        }
        .navbar{
          position:fixed;
          width: 100%;
        }
        .navbar-brand{
          padding: 0px;
        }
        .navbar-brand{
          padding: 0px;
        }
        .navbar-brand>img {
          height: 100%;
          padding: 15%;
          width: auto;
        }
        .navbar-default {
          border-color: #76D279;
        }
        .panel.noborder {
            border: none;
            box-shadow: none;
        }
        .panel.nopadding {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
            padding-top: 0px !important;
        }
        .panel.noborder > .panel-heading {
            /*border: 1px solid #dddddd;
            border-radius: 0;*/
        }
        .panel > .panel-heading {
            background-image: none;
            background-color: white;
        }
        .panel > .panel-footer {
            background-image: none;
            background-color: white;
        }
        h1.panel-title {
            font-size: 36px;
        }
        h2.panel-title {
            font-size: 30px;
        }
        h3.panel-title {
            font-size: 24px;
        }
        h4.panel-title {
            font-size: 18px
        }
        h5.panel-title {
            font-size: 14px
        }
        h6.panel-title {
            font-size: 10px;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ url('js/jquery.mask.min.js') }}"></script>
    <script src="{{ url('js/maskfield.js') }}"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/images/logo.png') }}" style=""/>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/help') }}">COTTONAPP</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <style>
      div.floating-menu {position:fixed;left:auto;top:50px;}
    </style>
    <div class="floating-menu">
      @include('layouts.menuhelp')
    </div>

    <!-- JavaScripts -->
    {{-- <script src="{{ url('js/maskfield.js') }}"></script> --}}

</body>
</html>
