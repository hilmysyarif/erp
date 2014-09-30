@extends('layouts/master')

@section('content')

{{ HTML::script('js/providers/providersForm.js') }}


<h1>Información de su Empresa</h1>
<hr>

@if(isset($role) and $role==1)
{{ Form::model($provider,['method'=>'PATCH','route'=> ['admins.providers.update',$provider->id] ]) }}

@else
{{ Form::model($provider,['method'=>'PATCH','route'=> ['providers.update',$provider->id] ]) }}

@endif

<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">

<h3 class="col-md-12">Identificación</h3>

    <div class="form-group">


        {{ Form::label('rut', 'Rut de la Empresa :',['class'=> 'form-label']) }}

        {{ Form::text('rut', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('rut', '<span class="errors">:message</span>') }}

    </div>

<div class="form-group">


        {{ Form::label('fancy_name', 'Nombre de la Empresa :',['class'=> 'form-label']) }}

        {{ Form::text('fancy_name', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('fancy_name', '<span class="errors">:message</span>') }}

</div>

<div class="form-group">


        {{ Form::label('description', 'Razón Social :',['class'=> 'form-label']) }}

        {{ Form::text('description', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('description', '<span class="errors">:message</span>') }}

</div>
<h3 class="col-md-12">Ubicación</h3>
<div class="form-group">


        {{ Form::label('adress', 'Dirección :',['class'=> 'form-label']) }}

        {{ Form::text('adress', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('adress', '<span class="errors">:message</span>') }}

</div>
<div class="form-group">

        {{ Form::label('city', 'Ciudad :', ['class'=> 'form-label']) }}

        {{ Form::text('city', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('city', '<span class="errors">:message</span>') }}

</div>
<div class="form-group">

        {{ Form::label('location', 'Comuna :', ['class'=> 'form-label']) }}

        {{ Form::text('location', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('location', '<span class="errors">:message</span>') }}

</div>
<h3 class="col-md-12">Contácto</h3>
<div class="form-group">

        {{ Form::label('phone_number', 'Teléfono :', ['class'=> 'form-label']) }}

        {{ Form::text('phone_number', null , ['class'=> 'form-control  formText']) }}
        {{ $errors->first('phone_number', '<span class="errors">:message</span>') }}

</div>
<div class="form-group">

        {{ Form::label('cellphone_number', 'Celular :', ['class'=> 'form-label']) }}

        {{ Form::text('cellphone_number', null , ['class'=> 'form-control input formText']) }}


</div>
<!--Crear Empresa  Form Input -->


<div class="col-md-5 col-xs-offset-3 col-md-offset-5" style='padding-top:3%'>
    {{ Form::submit('Guardar Información', ['class'=> 'btn btn-primary']) }}
</div>

</div>
{{ Form::close()  }}


@stop