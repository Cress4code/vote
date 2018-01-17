@extends('template-frontend')

@section('title')

@endsection

@section('content')






    <div class="default-margin"></div>

    <div class="banner" style=" background:url({{asset('img/ballon.png')}})  no-repeat ; height: 300px ">
        <div class="layer">
            <div class="container">
                <div class="text-center section ">
                    <h1 class="white-color"> Joueurs </h1>

                </div>
            </div>
        </div>

    </div>


    <div class="section">
        <div class="container">
            <div class="  formation ">
                <div class="row text-center">
                    <div class="text-center">
                        <h2> Votez pour le joueur de votre choix
                        </h2>
                        <p>Vous n'avez droit à un seul vote par jour.</p>
                        <br>
                    </div>
                </div>


                <!-- start of the loop -->
@foreach($joueurs as $joueur)
                <div class="row">
                    <div class=" white-bg">
                        <div class="col-md-4">
                            <a href="{{route('frontend.show',$joueur)}}" ><img class="img-responsive " src="{{asset('upload/'.$joueur->profile)}}" alt="image"></a>
                        </div>
                        <div class="col-md-8">
                            <div class="detail-wrapper">
                                <a href="{{route('frontend.show',$joueur)}}" ><h3 class="formation-titile">{{$joueur->firstName .' ' .$joueur->lastName}}&nbsp; </h3></a>
                                <span class="main-color">{{$joueur->vote}} Votes</span>
                                <p class="formation-excerpt"></p>
                                <p class="text-justify">{{ str_replace("<br>", " ", substr($joueur->description , 0, 300))}} <a href="{{route('frontend.show',$joueur)}}">...</a> </p>

                               <div class=" ">
                                   <a href="{{route('frontend.show',$joueur)}}"

                                      class="wfc-button main-color main-border-color bordered main-bg white-color loop-btn-margin">En
                                       savoir + </a>
                                   <a href="#" data-user="{{json_encode($joueur)}}"
                                      class="wfc-button main-color main-border-color bordered  loop-btn-margin voted ">
                                       Voter   </a>
                               </div>


                            </div>

                        </div>
                    </div>

                </div>
                <hr>

@endforeach

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