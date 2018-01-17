@extends('template-frontend')

@section('title')

@endsection

@section('content')






    <div class="default-margin"></div>

    <div class="banner" style=" background:url({{asset('img/ballon.png')}})  no-repeat      ;">
        <div class="layer">
            <div class="container">
                <div class="text-center section ">

                    <p class="white-color">Vote <sup>+</sup> est une application qui vous aide à choisir le prochain
                        ballon d'or</p>
                    <h1 class="white-color"> Vote et décide du prochain ballon d'or </h1>
                    <a href="http://www.fifa.com/" target="_blank"
                       class="wfc-button white-color main-bg  main-border-color bordered">Voir l'actualité fifa</a>
                    <a href="{{route('allplayers')}}" title="Tous les joueurs"
                       class="wfc-button white-bg main-color main-border-color bordered">Voter</a>

                </div>
            </div>
        </div>

    </div>


    {{--  <div class=" section main-bg white-color">
          <div class=" ">
              <div class="container">

                  <div class="row ">
                      <div class="">
                          <div class="text-center">
                              <h2> Télécharger l'application </h2>
                              <p>  Voter depuis votre smartphone   </p>
                          </div>


                          <div class="col-md-12 text-center" style="font-size: 28px">
                              <a class="white-color"><i class="fa fa-android"></i></a>



                              <a class="white-color"><i class="fa fa-apple"></i></a>


                          </div>




                      </div>


                  </div>
              </div>
          </div>
      </div>--}}
    <div class="section">
        <div class="container">
            <div class="  formation ">
                <div class="row text-center">
                    <div class="text-center">
                        <h2> 6 MEILLEURS
                        </h2>
                        <p>Découvrez les meilleurs joueurs et leurs notes,<br> basées sur leurs performances lors de la
                            saison passée.<br>
                            Il s'agit des 6 joueurs les mieux notés par les internautes. </p>
                    </div>


                    <!-- start of the loop -->

                    @foreach($joueurs as $joueur)
                        <div class="col-md-4">
                            <div class="formation-wrapper white-bg">

                                <img class="img-responsive " src="{{asset('upload/'.$joueur->profile)}}" alt="image">
                                <div class="detail-wrapper">
                                    <h3 class="formation-titile">{!!  $joueur->firstName.' <br/>'.$joueur->lastName!!}</h3>
                                    <span class="main-color">{{$joueur->vote }} Votes</span><br>
                                    <span class=" "><i class="fa fa-map-marker"></i> {{$joueur->poste }}  - </span>
                                    <span class=" "><i class="fa fa-globe"></i> {{$joueur->club }}</span>
                                    <p class="formation-excerpt"></p>
                                    <p>{{ substr($joueur->description , 0, 100)}}...</p>
                                    <p class="text-center">
                                    <a href="{{route('frontend.show',$joueur)}}"
                                       class="wfc-button main-color main-border-color bordered loop-btn-margin">En savoir + </a>
                                    </p>
                                </div>

                            </div>
                        </div>

                    @endforeach
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="{{route('allplayers')}}"
                               class="wfc-button white-color main-bg  main-border-color bordered">Tous les joueurs</a>

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