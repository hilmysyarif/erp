@extends('layouts/master')
@section('meta-title','Chile Agríola - Login')
@section('content')

<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 well">
    <div class="centeredTitle"><h1>Inicie Sesión</h1></div>


    {{ Form::open(['route'=> 'sessions.store']) }}
    <!-- Email Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email :') }}
        <div class="input-group">  
          <span class="input-group-addon"><i class = "fa fa-envelope"></i></span>
          {{ Form::text('email', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        </div>                
        {{ errors_for('email', $errors) }}
    </div>
    <!-- Password Form Input -->
    <div class="form-group">
        {{ Form::label('password', 'Password :') }}
        <div class="input-group">  
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            {{ Form::password('password', ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        </div>
        {{ errors_for('password', $errors) }}
    </div>
    <!--Login  Form Input -->
    <div class="form-group">
        {{ Form::submit('Ingresar', ['class'=> 'btn btn-success btn-lg align']) }}
    </div>

    @if(Session::has('flash_message'))
    <span class="label label-danger">
    {{ Session::get('flash_message') }}
    </span>
    @endif

    {{ Form::close() }}
</div>
@stop