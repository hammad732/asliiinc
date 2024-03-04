
    <head>
   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      
        <!-- fonts link -->
        
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800&family=Raleway:wght@300;500;600;700&display=swap" rel="stylesheet" />
      
        <title>
          @yield('title')
        </title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
      Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript">
          addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
          }, false);
      
          function hideURLbar() {
            window.scrollTo(0, 1);
          }
        </script>
        <!-- //for-mobile-apps -->
        <!-- <link href="bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
      
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" media="all" />
        {{-- <link rel="stylesheet" href="{{asset('css/custom.css')}}"> --}}
        <!-- //font-awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- js -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <!-- //js -->
        {{-- <link href="images/css" rel="stylesheet" type="text/css" />
        <link href="images/css(1)" rel="stylesheet" type="text/css" /> --}}
      
        <link href="{{ asset('assets/css/skdslider.css') }}" rel="stylesheet" />
        <!-- start-smoth-scrolling -->
        <!-- <script type="text/javascript" src="{{ asset('assets/images/move-top.js.download') }}"></script> -->
        <!-- <script type="text/javascript" src="{{ asset('assets/images/easing.js.download') }}"></script> -->
        <!-- <script type="text/javascript">
            jQuery(document).ready(function ($) {
              $(".scroll").click(function (event) {
                event.preventDefault();
                $("html,body").animate(
                  { scrollTop: $(this.hash).offset().top },
                  1000
                );
              });
            });
          </script> -->
        <!-- start-smoth-scrolling -->
        <!-- <div id="_bsa_srv-CKYI627U_0"></div>
          <div id="_bsa_srv-CKYI653J_1"></div> -->
        <!-- <style type="text/css">
            @keyframes pop-in {
              0% {
                opacity: 0;
                transform: scale(0.1);
              }
              60% {
                opacity: 1;
                transform: scale(1.2);
              }
              100% {
                transform: scale(1);
              }
            }
            @-webkit-keyframes pop-in {
              0% {
                opacity: 0;
                -webkit-transform: scale(0.1);
              }
              60% {
                opacity: 1;
                -webkit-transform: scale(1.2);
              }
              100% {
                -webkit-transform: scale(1);
              }
            }
            @-moz-keyframes pop-in {
              0% {
                opacity: 0;
                -moz-transform: scale(0.1);
              }
              60% {
                opacity: 1;
                -moz-transform: scale(1.2);
              }
              100% {
                -moz-transform: scale(1);
              }
            }
            .minicart-showing #PPMiniCart {
              display: block;
              transform: translateZ(0);
              -webkit-transform: translateZ(0);
              -moz-transform: translateZ(0);
              animation: pop-in 0.25s;
              -webkit-animation: pop-in 0.25s;
              -moz-animation: pop-in 0.25s;
            }
            #PPMiniCart {
              display: none;
              position: fixed;
              left: 50%;
              top: 75px;
            }
            #PPMiniCart form {
              position: relative;
              width: 400px;
              max-height: 400px;
              margin-left: -200px;
              padding: 10px 10px 40px;
              background: #fbfbfb;
              border: 1px solid #d7d7d7;
              border-radius: 4px;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
              font: 15px / normal arial, helvetica;
              color: #333;
            }
            #PPMiniCart form.minicart-empty {
              padding-bottom: 10px;
              font-size: 16px;
              font-weight: bold;
            }
            #PPMiniCart ul {
              clear: both;
              float: left;
              width: 380px;
              margin: 5px 0 20px;
              padding: 10px;
              list-style-type: none;
              background: #fff;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            }
            #PPMiniCart .minicart-empty ul {
              display: none;
            }
            #PPMiniCart .minicart-closer {
              float: right;
              margin: -12px -10px 0;
              padding: 10px;
              background: 0;
              border: 0;
              font-size: 18px;
              cursor: pointer;
              font-weight: bold;
            }
            #PPMiniCart .minicart-item {
              clear: left;
              padding: 6px 0;
              min-height: 25px;
            }
            #PPMiniCart .minicart-item + .minicart-item {
              border-top: 1px solid #f2f2f2;
            }
            #PPMiniCart .minicart-item a {
              color: #333;
              text-decoration: none;
            }
            #PPMiniCart .minicart-details-name {
              float: left;
              width: 62%;
            }
            #PPMiniCart .minicart-details-quantity {
              float: left;
              width: 15%;
            }
            #PPMiniCart .minicart-details-remove {
              float: left;
              width: 7%;
            }
            #PPMiniCart .minicart-details-price {
              float: left;
              width: 16%;
              text-align: right;
            }
            #PPMiniCart .minicart-attributes {
              margin: 0;
              padding: 0;
              background: transparent;
              border: 0;
              border-radius: 0;
              box-shadow: none;
              color: #999;
              font-size: 12px;
              line-height: 22px;
            }
            #PPMiniCart .minicart-attributes li {
              display: inline;
            }
            #PPMiniCart .minicart-attributes li:after {
              content: ",";
            }
            #PPMiniCart .minicart-attributes li:last-child:after {
              content: "";
            }
            #PPMiniCart .minicart-quantity {
              width: 30px;
              height: 18px;
              padding: 2px 4px;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
              font-size: 13px;
              text-align: right;
              transition: border linear 0.2s, box-shadow linear 0.2s;
              -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
              -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
            }
            #PPMiniCart .minicart-quantity:hover {
              border-color: #0078c1;
            }
            #PPMiniCart .minicart-quantity:focus {
              border-color: #0078c1;
              outline: 0;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),
                0 0 3px rgba(0, 120, 193, 0.4);
            }
            #PPMiniCart .minicart-remove {
              width: 18px;
              height: 19px;
              margin: 2px 0 0;
              padding: 0;
              background: #b7b7b7;
              border: 1px solid #a3a3a3;
              border-radius: 3px;
              color: #fff;
              font-size: 13px;
              opacity: 0.7;
              cursor: pointer;
            }
            #PPMiniCart .minicart-remove:hover {
              opacity: 1;
            }
            #PPMiniCart .minicart-footer {
              clear: left;
            }
            #PPMiniCart .minicart-subtotal {
              position: absolute;
              bottom: 17px;
              padding-left: 6px;
              left: 10px;
              font-size: 16px;
              font-weight: bold;
            }
            #PPMiniCart .minicart-submit {
              position: absolute;
              bottom: 10px;
              right: 10px;
              min-width: 153px;
              height: 33px;
              margin-right: 6px;
              padding: 0 9px;
              border: 1px solid #ffc727;
              border-radius: 5px;
              color: #000;
              text-shadow: 1px 1px 1px #fff6e9;
              cursor: pointer;
              background: #ffaa00;
              background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZjZlOSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmFhMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
              background: -moz-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
              background: -webkit-gradient(
                linear,
                left top,
                left bottom,
                color-stop(0%, #fff6e9),
                color-stop(100%, #ffaa00)
              );
              background: -webkit-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
              background: -o-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
              background: -ms-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
              background: linear-gradient(to bottom, #fff6e9 0%, #ffaa00 100%);
            }
            #PPMiniCart .minicart-submit img {
              vertical-align: middle;
              padding: 4px 0 0 2px;
            }
          </style> -->
        <!-- <meta
            http-equiv="origin-trial"
            content="AymqwRC7u88Y4JPvfIF2F37QKylC04248hLCdJAsh8xgOfe/dVJPV3XS3wLFca1ZMVOtnBfVjaCMTVudWM//5g4AAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjk1MTY3OTk5LCJpc1RoaXJkUGFydHkiOnRydWV9"
          />
          <div id="_bsa_srv-CKYDL2JN_2"></div> -->
      </head>








{{-- <head>
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASLII MALL</title> --}}

    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" /> 
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css">
    <!-- Font Awosome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold"> --}}
    {{-- ======== slider css ========== --}}


{{-- ======== zoom css ========== --}}


    {{-- ======== styles css ========== --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}"> --}}

    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> --}}
{{-- </head> --}}







