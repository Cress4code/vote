@extends('template-backend')

@section('title')
    Les votants
@endsection


@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@yield('title')  </h4>
                    <h6 class="card-subtitle">@yield('title')  </h6>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Joueur voté</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($votants as $votant)
                                <tr>
                                    <td>{{$votant->lastName}}</td>
                                    <td>{{$votant->firstName}}</td>
                                    <td>{{$votant->email}}</td>
                                    <td>{{$votant->club}}</td>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection