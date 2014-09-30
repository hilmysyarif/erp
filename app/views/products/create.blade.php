@extends('layouts/master')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
<div class="centeredTitle Separator">
    <h1>Agregar un nuevo Producto</h1>
</div>
<hr>

{{ Form::open(['route'=> 'admins.products.store', 'files' =>true]) }}
<!-- Name Form Input -->
<div class="form-group">
    {{ Form::label('name', 'Nombre del Producto :') }}
    {{ Form::text('name', null , ['class'=> 'form-control']) }}
    {{ errors_for('name', $errors) }}
</div>

<!-- Image Form Upload -->
<div class="form-group">
    {{ Form::label('img_url', 'Agregue una Imagen:') }}
    {{ Form::file('img_url') }}
    {{ errors_for('img_url', $errors) }}
</div>

<!-- Description Form Input -->
<div class="form-group">
    {{ Form::label('description', 'Descripción :') }}
    {{ Form::textarea('description', null , ['class'=> 'form-control']) }}
    {{ errors_for('description', $errors) }}
</div>

<!--Crear Producto  Form Input -->
<div class="form-group centeredTitle">
    {{ Form::submit('Crear Producto', ['class'=> 'btn btn-primary']) }}
</div>
{{ Form::close()  }}
        
    </div>
</div>

@stop