@extends('layouts/master')

@section('content')

<h1>Perfil de Usuario</h1>
<hr>


<div class="col-lg-3 col-lg-offset-1">


        <img src="{{$user->img }}" class="img-thumbnail">
        <input type="file" name="img">
</div>

<div class="col-lg-8">
   <div class="form-control">
   <label>Nombre :</label> <p class="lead">{{ $user->name }} {{ $user->lastname }}</p>

    <label>Correo :</label><p class="lead">{{$user->email }}</p>
   </div>
</div>


@stop