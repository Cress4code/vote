@extends('template-frontend')

@section('title')

@endsection

@section('content')






    <div class="default-margin"></div>

    <div class="banner" style=" background:url({{asset('img/ballon.png')}})  no-repeat ; height: 300px ">
        <div class="layer">
            <div class="container">
                <div class="text-center section ">
                    <h1 class="white-color"> {{$joueur->firstName .' '.$joueur->lastName }} </h1>

                </div>
            </div>
        </div>

    </div>


    <div class="section">
        <div class="container">
            <div class="  formation ">

                <div class="row">
                    <div class=" white-bg">

                        <div class="col-md-8">
                            <div class="detail-wrapper">
                                <img src="{{asset('upload/'.$joueur->profile )}}">
                                <h3 class="formation-titile">{{$joueur->firstName .' '.$joueur->lastName }}&nbsp; </h3>
                                <span class="main-color">{{$joueur->vote }} Votes</span>
                                <p class="formation-excerpt"></p>
                                <p class="text-justify">{!! $joueur->description !!}</p>
                                <p></p>


                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="formation-wrapper main-bg white-color text-center" style="padding: 10px">
                            <span class="white-bg main-color widget-icon">
                                <i class="fa fa-check"></i>
                            </span>
                                <h3 class="">VOTE <sup>+</sup></h3>
                                <p>
                                    Accordez votre vote à ce joueur. Qu'attendez-vous?

                                </p>
                                <a href="#" data-user="{{json_encode($joueur)}}" class="wfc-button main-color white-bg main-border-color bordered voted">Voter</a>


                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>


    </div>

    <div class=" section main-bg white-color">
        <div class=" ">
            <div class="container">

                <div class="row ">
                    <div class="">
                        <div class="text-center">
                            <h2> Télécharger l'application </h2>
                            <p> Voter depuis votre smartphone </p>
                        </div>


                        <div class="col-md-12 text-center" style="font-size: 28px">
                            <a class="white-color"><i class="fa fa-android"></i></a>


                            <a class="white-color"><i class="fa fa-apple"></i></a>


                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection