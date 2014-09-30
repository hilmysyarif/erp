@extends('layouts/master')

@section('content')
<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
    <div class="centeredTitle Separator">
      <h1>Agregar Admin</h1>
    </div>

<div class="row">
  <div class="col-md-12">
    
{{ Form::model($admin,['method'=>'PATCH','route'=> ['admins.update',$admin->id] ]) }}


<!-- Email Form Input -->
<div class="form-group">
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', null , ['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    {{ errors_for('email', $errors) }}
</div>

<div class="form-group">
  {{ Form::label('name', 'Nombre:') }}
  {{ Form::text('name', null,['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    {{ errors_for('name', $errors) }}
</div>

<div class="form-group">
  {{ Form::label('lastname', 'Apellido:') }}
  {{ Form::text('lastname', null,['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    {{ errors_for('lastname', $errors) }}
</div>
<!-- Password Form Input -->
<div class="form-group">
  {{ Form::label('password', 'Contraseña:') }}
  {{ Form::password('password', ['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
  {{ errors_for('password', $errors) }}
</div>
<!-- Password_confirmation Form Input -->
<div class="form-group">
  {{ Form::label('password_confirmation', 'Confirmar Contraseña:') }}
  {{ Form::password('password_confirmation', ['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    {{ errors_for('password_confirmation', $errors) }}
</div>

  
<!--Create Account  Form Input -->
<div class="form-group">
    {{ Form::submit('Crear una cuenta', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
</div>
{{ Form::close()  }}
  </div>
</div>


</div>
@stop