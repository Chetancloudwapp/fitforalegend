<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Fitforalegend</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('front/images/favicon.ico')}}" />
        <link href="{{ url('front/css/vendor/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ url('front/css/vendor/vendor.min.css')}}" rel="stylesheet">
        <link href="{{ url('front/css/style.css')}}" rel="stylesheet">
        <link href="{{ url('front/css/custom.css')}}" rel="stylesheet">
        <link href="{{ url('front/fonts/icomoon/icons.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      
        <style>
            .fancybox-content {
            overflow: hidden;
            background-color: #fff;
            height: 600px !important;
            width: 750px !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            text-align: center;
            display: block !important;
            margin: auto !important;
        }
        /*background: url(../images/model-img.png) !important;*/

            .col-md-9{
            width:50%;
            }
            /*.dropdn-content.minicart-drop .dropdn-content-block{*/
            /*    display:none !important;*/
            /*}*/
            /*.header-side-panel .dropdn-content-block {*/
            /*     display:none !important;*/
            /*}*/
        </style>
    </head>
    <body class="has-smround-btns has-loader-bg equal-height">
       
        <!-- header code starts here -->
        @include('front.layout.header')
        
        <!-- Middlecontent starts here -->
        @yield('content')

        <!-- footer content starts here -->
        @include('front.layout.footer')
        
        <div class="js-popupPromo" data-src="ajax/promo-modal-fashion.html" data-effect="fireworks" data-expires="0" data-only-index="true"></div>
        <script src="{{ url('front/js/vendor-special/lazysizes.min.js')}}"></script>
        <script src="{{ url('front/js/vendor-special/ls.bgset.min.js')}}"></script>
        <script src="{{ url('front/js/vendor-special/ls.aspectratio.min.js')}}"></script>
        <script src="{{ url('front/js/vendor-special/jquery.min.js')}}"></script>
        <script src="{{ url('front/js/vendor-special/jquery.ez-plus.js')}}"></script>
        <script src="{{ url('front/js/vendor/vendor.min.js')}}"></script>
        <script src="{{ url('front/js/app-html.js')}}"></script>
        <script>
            $(document).ready(function(){
                
                $('#account').click(function(){
                
                $('#dropdnMinicart').toggle();
                $('#dropdnAccount').toggle();
            })
            })
        </script>
        <script>
            $(document).ready(function(){
            $(".men").click(function(){
                $(".mens").toggle();
            });
            });
        </script>
        <script>
            $(document).ready(function(){
            $(".women").click(function(){
            $(".womens").toggle();
            });
            });  
            
        </script>
        <script>
            $(document).ready(function(){
            $(".kid").click(function(){
            $(".kids").toggle();
            });
            }); 
        </script>
        <style>
            #dropdnAccount, #dropdnMinicart{
            display:none;
            }
        </style>
    </body>
</html>