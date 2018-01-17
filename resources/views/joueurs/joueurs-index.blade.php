@extends('template-backend')

@section('title')
    Les joueurs
@endsection


@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@yield('title') <a href="#" data-toggle="modal" data-target="#modal"
                                                              class="btn btn-info btn-circle right"><i
                                    class="fa fa-plus"></i> </a></h4>
                    <h6 class="card-subtitle">Tous les joueurs </h6>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Nationalité</th>
                                <th>Club</th>
                                <th>Poste</th>

                                <th>Vote</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($joueurs as$joueur)
                                <tr>
                                    <td>{{$joueur->lastName}}</td>
                                    <td>{{$joueur->firstName}}</td>
                                    <td>{{$joueur->nationalite}}</td>
                                    <td>{{$joueur->club}}</td>
                                    <td>{{$joueur->poste}}</td>
                                    <td>{{$joueur->vote}}</td>

                                    <td class="text-center">
                                        <a href="{{route('joueurs.edit', $joueur)}}" data-user="{{json_encode($joueur)}}" title="Ajouter un payement"  class="btn btn-info btn-circle add-ayement"><i class="fa fa-edit"></i> </a>
                                         <a href="{{route('joueurs.destroy', $joueur)}}" title="Supprimer ce joueur"  class="btn btn-danger btn-circle delete"><i class="fa fa-times"></i> </a>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header  ">
                        <h4 class="modal-title main-color text-uppercase" id="titlePayement"> Ajout de @yield('title') </h4>

                    </div>
                    <form method="POST" action="{{route('joueurs.store')}}" enctype="multipart/form-data">
                        <div class="modal-body">

                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input  placeholder="Nom" type="text" required class="form-control" id="userName" name="lastName" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input type="text" placeholder="Prenom" required class="form-control"name="firstName" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input type="text" class="form-control datepicker" required placeholder="Date de naissance" name="datedenaissance"  value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input placeholder="Poste" type="text" required class="form-control" name="poste"  value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input type="text" class="form-control" required placeholder="Nationalité" name="nationalite"  value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input placeholder="Club Actuel" required type="text" class="form-control" name="club"  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">


                                        <textarea type="text" required rows="4" class="form-control" placeholder="Description" name="description"  value=""></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">


                                        <input type="file" class="dropify"  required     id="userName" value="" name="profile">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">Fermer
                            </button>
                            <button type="submit"
                                    class="btn white-color main-bg waves-effect waves-light wfc-button main-bg">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection