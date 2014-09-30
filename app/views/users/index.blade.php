

@extends('layouts/master')

@section('content')


<div class="centeredTitle Separator">
    <h1>Usuarios</h1>
</div>
<hr>


<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 ">
    <table id="providers" class="row-border hover stripe" cellspacing="0" style="width: 100%">
        <thead>
        <tr>
            <th>
                Email
            </th>
            <th>
                Nombre
            </th>
            <th>
                Empresa
            </th>
            <th>
                Acciones
            </th>

        </tr>

        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->email}}</td>
            <td>{{$user->name." ".$user->last_name}}</td>

            @if($user->provider_id!=0)
            <td>{{$user->provider->fancy_name}}</td>
            @elseif($user->company_id != 0)
            <td>{{$user->company->fancy_name}}</td>
            @elseif($user->role_id == 1)
            <td>Admin</td>
            @else
            <td>Sin Empresa</td>
            @endif
            <td>
                <a class="btn btn-small btn-info"
                   href="{{ URL::to('admins/providers/' . $user->id . '/edit') }}">Editar</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <div class = "row centeredTitle">
        {{HTML::create_button('Usuario','admins.users.create','btnGreen btn btn-success btn-lg')}}
    </div>
</div>
@stop


