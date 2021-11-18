<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <!-- Design des table -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('/')}}/TableDesign/images/icons/favicon.ico"/>

    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/TableDesign/css/button.css">
    <!--===============================================================================================-->



    <!-- end design des tables -->

    {{--<!-- Bootstrap 3.3.7 -->--}}

    <link rel="stylesheet" href="{{url('/')}}/panel/adminpanel/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{url('/')}}/panel/adminpanel//plugins/datatables/dataTables.bootstrap.css">

    <!-- summernote -->
    <link rel="stylesheet" href="{{url('/')}}/panel/adminpanel/plugins/summernote/summernote-bs4.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{url('/')}}/TableDesign/vendor/jquery/jquery-3.2.1.min.js"></script>

    <style>
        .mr-2{
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .inner p{
            position: relative;
            bottom: -15px;
        }
        .submitbtn,.resetebtn{
                 {{app()->getLocale() =='ar'? 'padding: 10px 8px 10px 25px;': 'padding: 10px 25px 10px 8px;'}}
        }

    </style>
    {{--<!-- jQuery 3 -->--}}



    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/morris/morris.css') }}">

    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck/all.css') }}">
    <link href='{{asset('/css/generalStyle.css')}}' rel='stylesheet' type='text/css'>

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
