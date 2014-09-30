@extends('layouts/master')

@section('content')
{{ HTML::script('js/companies/fieldcreator.js') }}


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
<div class="centeredTitle Separator">
    <h1>Necesitamos Registrar su Empresa</h1>
</div>


<!-- Check  if the User is Admit or not  and send it to the right controller-->
@if(isset($role) and $role==1)
    {{ Form::open(['route'=> 'admins.companies.store']) }}
@else
    {{ Form::open(['route'=> 'companies.store']) }}

@endif
<!---->


    <h3 class="col-md-12">Información Básica</h3>

    <!-- Rut Form Input -->
    <div class="form-group">

        {{ Form::label('rut', 'Rut :', ['class'=> 'form-label']) }}

        {{ Form::text('rut', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        {{ $errors->first('rut', '<span class="errors">:message</span>') }}

    </div>
    <div class="form-group">


        {{ Form::label('fancy_name', 'Nombre de la Empresa :',['class'=> 'form-label']) }}

        {{ Form::text('fancy_name', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        {{ $errors->first('fancy_name', '<span class="errors">:message</span>') }}

    </div>
    <div class="form-group">


        {{ Form::label('description', 'Razón Social :',['class'=> 'form-label']) }}

        {{ Form::text('description', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        {{ $errors->first('description', '<span class="errors">:message</span>') }}

    </div>
    <h3 class="col-md-12">Ubicación</h3>

    <div class="form-group">


        {{ Form::label('adress', 'Dirección :',['class'=> 'form-label']) }}

        {{ Form::text('adress', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        {{ $errors->first('adress', '<span class="errors">:message</span>') }}

    </div>
    <div class="form-group">

        {{ Form::label('city', 'Ciudad :', ['class'=> 'form-label']) }}

        {{ Form::text('city', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        {{ $errors->first('city', '<span class="errors">:message</span>') }}

    </div>
    <div class="form-group">

        {{ Form::label('location', 'Comuna :', ['class'=> 'form-label']) }}

        {{ Form::text('location', null , ['class'=> 'formText form-control input-lg','required'=>'required']) }}
        {{ $errors->first('location', '<span class="errors">:message</span>') }}

    </div>
    <h3 class="col-md-12">Contácto</h3>

    <div class="form-group">

        {{ Form::label('phone_number', 'Teléfono :', ['class'=> 'form-label']) }}

        {{ Form::text('phone_number', null , ['class'=> 'formText form-control input-lg']) }}
        {{ $errors->first('phone_number', '<span class="errors">:message</span>') }}

    </div>

    <div id="selectcontainer" class="container col-lg-10 ">
        <div class=" form-group col-lg-8">
            {{ Form::label('productos', 'Seleccione un Producto :', ['class'=> 'form-label']) }}
            <select name="productos[]" class="form-control" id="ProductSelect">
                @foreach($products as $product)

                <option value="{{$product->id}}">{{$product->name}}</option>

                @endforeach

            </select>


        </div>
        </div>


    <div class="col-lg-12">
        <div class="col-lg-4 col-lg-offset-4">
            <button type="button" class='btn btn-success' onclick=addField()>Añadir Producto</button>
        </div>
    </div>
    <input type="hidden" id="count" name="count" value="1">




    <!--Crear Empresa  Form Input -->


<div class="col-md-5 col-xs-offset-3 col-md-offset-5" style='padding-top:3%'>
    {{ Form::submit('Crear Empresa', ['class'=> 'btn btn-lg btn-primary']) }}
</div>


</div>


{{ Form::close()  }}
    </div>
</div>


@stop