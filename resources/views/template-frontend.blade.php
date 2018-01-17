<!DOCTYPE html>
<html lang="en-US" class=" ">
    <title>Voter +</title>
    <link href="https://www.google-analytics.com/" rel="dns-prefetch">
    <link href="#" rel="shortcut icon">
    <link href="#" rel="apple-touch-icon-precomposed">


    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voter le prochain ballon d'or">


    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}} " media="all">
    <link rel="stylesheet"  href="{{asset('css/style.css')}} " media="all">
    <script>
        window.Laravel ={!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style>

        .current_page_item a, .current_page_item a, .current-menu-item a {
            color: #191919 !important;
        }

        .main-bg {
            background-color: #0915a8 !important;
        }

        .second-bg {

            background-color: #191919 !important;
        }



        .main-color, .menu-item a {

            color: #0915a8 !important;
        }

        .second-btn:hover {
            color: #fff;
            background-color: #191919;
        }

        .main-btn:hover {
            color: #fff;
            border-color: #0915a8 !important;
            background-color: transparent !important;
        }

        .white-btn {
            border: 1px solid white;
            color: #fff;
            background-color: transparent !important;
        }

        .second-color, header .menu-open {
            color: #191919 !important;
        }

        .bordered {
            border: 1px solid transparent;
        }

        .main-border-color  {
            border-color: #0915a8 !important;
        }

        .second-border-color {
            border-color: #191919 !important;
        }

        .white-border-color {
            border-color: #FFF !important;
        }

        .white-color {
            color: #fff !important;
        }

        .white-bg {
            background: #fff !important;
        }





    </style>


</head>

<body class="">
<header>
    <nav class="navbar  navbar-fixed-top white-bg  " id="site_header">
        <div class="container">
            <div class="navbar-header nav">

                      <span class="visible-xs" id="menu_right_toggle_1">
                            <img width="20" src="{{asset('img/right-alignment.png')}}">
                    </span>


                <a class="navbar-brand white-color uppercase" id="logo" href="{{public_path()}}"><img src="{{asset('img/vote-logo.png')}}"></a>
            </div>
            <div id="navbar" class="navbar-right collapse navbar-collapse">
                <div class="hidden-sm hidden-xs" id="head_menu">
                    <ul class="nav navbar-nav">
                        <li  class="uppercase"><a href="{{route('frontend.index')}}">Accueil</a></li>
                        <li  class="uppercase" ><a href="{{route('allplayers')}}">Joueurs</a></li>
                    </ul>
                </div>



            </div>



            <div class="white-bg" id="right_menu">
                <span id="close_right_menu">&times;</span>
                <div class="text-center" id="right_menu_head">

                </div>

                <div>
                    <ul class="nav navbar-nav">
                        <li class="menu-item uppercase  "><a href="{{route('frontend.index')}}">Accueil</a></li>
                        <li class="menu-item  uppercase "><a href="{{route('allplayers')}}">Joueurs</a></li>
                    </ul>
                </div>

            </div>

        </div>


        </div>
    </nav>


</header>
@yield('content')

<!-- footer -->
<footer class="footer section   text-center" role="contentinfo">

    <!-- copyright -->
    <p class="copyright">
        © 2018 Copyright Vote<sup>+</sup>.
    </p>
    <!-- /copyright -->

</footer>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header main-bg white-color" style="padding: 50px">
                <h3 class="modal-title text-center"   style="text-transform: uppercase" > </h3>

            </div>
            <div class="modal-body" style="padding: 50px">
                <p>
                    Merci de remplir les données afin de voter
                </p>
                <form method="POST" action="{{route('votants.store')}}" id="votantForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email"  required class="form-control" name="email" id="email">
                        <input type="hidden" class="form-control" name="joueurId" id="joueurId">
                    </div>
                <div style="display: none" id="suiteofform">
                    <div class="form-group">
                        <label   class="col-form-label">Nom:</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" >
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label">Prémom:</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" >
                    </div>
                </div>

                    <div class="text-center">
                        <button
                           class="wfc-button main-bg main-border-color white-color bordered  ">
                            Continuer   </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- /wrapper -->

<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/scripts-frontend.js')}}"></script>
</body>
</html>