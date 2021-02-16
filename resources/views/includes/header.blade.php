<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Council &mdash; Assest Management System  &mdash;</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/font-awesome/css/font-awesome.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/magnific-popup/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{asset('template/assets/vendor/select2/select2.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

        <link rel="stylesheet" href="{{asset('template/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/morris/morris.css')}}" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{asset('template/assets/vendor/select2/select2.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
        <link rel="stylesheet" href="{{asset('template/assets/vendor/pnotify/pnotify.custom.css')}}" />
        <!--        <link rel="stylesheet" href="{{asset('template/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/select2/select2.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/dropzone/css/basic.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/dropzone/css/dropzone.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/summernote/summernote.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/summernote/summernote-bs3.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/codemirror/lib/codemirror.css')}}" />
                <link rel="stylesheet" href="{{asset('template/assets/vendor/codemirror/theme/monokai.css')}}" />-->


        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('template/assets/stylesheets/theme.css')}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{asset('template/assets/stylesheets/skins/default.css')}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{asset('template/assets/stylesheets/theme-custom.css')}}">
        
        <link rel="stylesheet" href="{{asset('template/assets/jquery-confirm/dist/jquery-confirm.min.css')}}">
        <!-- Head Libs -->

        <script src="{{asset('template/chartjs/Chart.min.js')}}"></script>
        <script src="{{asset('template/chartjs/utils.js')}}"></script>
        <style>
            canvas {
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
            }
        </style>
        <script src="{{asset('template/assets/vendor/modernizr/modernizr.js')}}"></script>

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="../" class="logo">
                        <img src="assets/images/logo.png" height="35" alt="Porto Admin" />
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">


                    <span class="separator"></span>


                    <span class="separator"></span>

                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            @if (Session::has('username')) 
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                                <span class="name">{{Session::get('username')}}</span>
                                <span class="role">{{Session::get('role')}}</span>
                            </div>
                            @else 

                            <script>
// your "Imaginary javascript"
window.location.href = '{{url("/")}}';
                            </script>
                            @endif
                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>

                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{url('/')}}"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->