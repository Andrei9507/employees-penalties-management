<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link href="{{asset('libs/semanticUI-2.2/semantic.min.css')}}" rel="stylesheet" />
    <link href="{{asset('libs/jquery-ui-1.12.1/jquery-ui.css')}}" rel="stylesheet" />
    <link href="{{asset('libs/jquery-ui-1.12.1/jquery-ui.structure.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />



    <script type="text/javascript" src="{{ asset('libs/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('libs/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('libs/semanticUI-2.2/semantic.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts.js')}}"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    
</head>
<body>
@include('partials.menu')
    <div class="ui container">
       
       @yield('content')
    </div>

 