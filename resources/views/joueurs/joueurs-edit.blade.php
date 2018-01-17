@extends('template-backend')

@section('title')
    {{$joueur->firstName .' '.  $joueur->lastName}}
@endsection


@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{asset('upload/'.$joueur->profile)}}" class="img-circle" width="150" height="150" />
                        <h4 class="card-title m-t-10">{{$joueur->firstName .' '.  $joueur->lastName}}
                        </h4>

                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Poste</small>
                    <h6>{{$joueur->poste  }}
                    </h6> <small class="text-muted p-t-30 db">Club</small>
                    <h6>{{$joueur->club  }}</h6>



                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Détail</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">


                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="{{route('joueurs.update',$joueur->id)}}" method="post" enctype="multipart/form-data">

                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label class="col-md-12">Prenom</label>
                                    <div class="col-md-12">

                                        <input type="text" required value="{{$joueur->firstName  }}" name="firstName" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nom</label>
                                    <div class="col-md-12">
                                        <input type="text" required value="{{$joueur->lastName  }}" name="lastName" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date de naissance</label>
                                    <div class="col-md-12">
                                        <input type="text" required value="{{$joueur->datedenaissance  }}" name="datedenaissance" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Club</label>
                                    <div class="col-md-12">
                                        <input type="text" required value="{{$joueur->club  }}" name="club" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"> Poste</label>
                                    <div class="col-md-12">
                                        <input type="text" required value="{{$joueur->poste  }}" name="poste" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Nationalité</label>
                                    <div class="col-md-12">
                                        <input type="text"  required value="{{$joueur->nationalite  }}" class="form-control form-control-line" name="nationalite" id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea rows="10" required class="form-control form-control-line" name="description"  > {{$joueur->description  }} </textarea>
                                    </div>
                                </div>
                                <div class="form-group">


                                    <input type="file" class="dropify"      id="userName" value="" name="profile">
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn  wfc-button main-bg white-color ">Modifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection