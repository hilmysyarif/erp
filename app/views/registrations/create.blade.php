@extends('layouts/master')

@section('content')
<div class="well col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
    <div class="centeredTitle"><h1>Formulario de Registro</h1></div>



    <!-- Check  if the User is Admit or not  and send it to the right controller-->
    @if(isset($role) and $role==1)
    {{ Form::open(['route'=> 'admins.users.store']) }}
    @else
    {{ Form::open(['route'=> 'registration.store']) }}

    @endif
    <!---->



<!-- Email Form Input -->
<div class="form-group">
    {{ Form::label('email', 'Email:') }}
    <div class="input-group">
        <span class="input-group-addon"><i class = "fa fa-envelope"></i></span>  
        {{ Form::text('email', null , ['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    </div>
    {{ errors_for('email', $errors) }}
</div>






<!-- Password Form Input -->
<div class="form-group">
{{ Form::label('password', 'Contraseña:') }}
    <div class="input-group">
        <span class="input-group-addon"><i class = "fa fa-key"></i></span>  
        {{ Form::password('password', ['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    </div>
    {{ errors_for('password', $errors) }}
</div>
<!-- Password_confirmation Form Input -->
<div class="form-group">
{{ Form::label('password_confirmation', 'Confirmar Contraseña:') }}
    <div class="input-group">
        <span class="input-group-addon"><i class = "fa fa-key"></i></span>  
        {{ Form::password('password_confirmation', ['class'=> 'formText form-control input-lg', 'required'=>'required']) }}
    </div>    
    {{ errors_for('password_confirmation', $errors) }}
</div>

    @if(isset($role) and $role==1)
    <!-- WorkPLace Form Input -->
        <div class="form-group">
            {{ Form::label('workplace', 'Seleccione la empresa :', ['class'=> 'form-label']) }}
            <select name="workplace" class="form-control">
                @foreach($providers as $provider)

                <option value="1{{$provider->id}}">{{$provider->fancy_name}}</option>

                @endforeach

                @foreach($companies as $company)

                <option value="2{{$company->id}}">{{$company->fancy_name}}</option>

                @endforeach

            </select>


        </div>


     @endif

<!--Create Account  Form Input -->
<div class="form-group">
    {{ Form::submit('Crear una cuenta', ['class'=> 'btn btn-success btn-lg align']) }}
</div>
{{ Form::close()  }}

</div>
@stop