@extends('layouts/master')

@section('content')

{{ HTML::script('js/providers/fieldcreator.js') }}
{{ HTML::style('css/image-picker.css'); }}
<div class = "row">
    <div class="centeredTitle Separator">
        <h1>Necesitamos Registrar su Empresa</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
<!-- Check  if the User is Admit or not  and send it to the right controller-->
@if(isset($role) and $role==1)
  {{ Form::open(['route'=> 'admins.providers.store']) }}
@else
  {{ Form::open(['route'=> 'providers.store']) }}
@endif
<!---->

    <div ><h3>Identificación</h3></div>
    <hr>
  <!-- Rut Form Input -->
  <div class="form-group">
    {{ Form::label('rut', 'Rut :', ['class'=> 'form-label']) }}
    {{ Form::text('rut', null , ['class'=> 'formText form-control ','required'=>'required']) }}
    {{ errors_for('rut', $errors) }}
  </div>
<div class="form-group">


        {{ Form::label('fancy_name', 'Nombre de la Empresa :',['class'=> 'form-label']) }}

        {{ Form::text('fancy_name', null , ['class'=> 'formText form-control ','required'=>'required']) }}
        {{ errors_for('fancy_name', $errors) }}

</div>
<div class="form-group">


        {{ Form::label('description', 'Razón Social :',['class'=> 'form-label']) }}

        {{ Form::text('description', null , ['class'=> 'formText form-control ','required'=>'required']) }}
        {{ errors_for('description', $errors) }}

</div>

    <div><h3>Ubicación</h3></div>
    <hr>
<div class="form-group">


        {{ Form::label('adress', 'Dirección :',['class'=> 'form-label']) }}

        {{ Form::text('adress', null , ['class'=> 'formText form-control ','required'=>'required']) }}
        {{ errors_for('adress', $errors) }}

</div>
<div class="form-group">

        {{ Form::label('city', 'Ciudad :', ['class'=> 'form-label']) }}

        {{ Form::text('city', null , ['class'=> 'formText form-control ','required'=>'required']) }}
        {{ errors_for('city', $errors) }}

</div>
<div class="form-group">

        {{ Form::label('location', 'Comuna :', ['class'=> 'form-label']) }}

        {{ Form::text('location', null , ['class'=> 'formText form-control','required'=>'required']) }}
        {{ errors_for('location', $errors) }}

</div>
    <div><h3>Contácto</h3></div>
    <hr>

<div class="form-group">

        {{ Form::label('phone_number', 'Teléfono :', ['class'=> 'form-label']) }}

        {{ Form::text('phone_number', null , ['class'=> 'formText form-control']) }}
        {{ errors_for('phone_number', $errors) }}

</div>
<div class="form-group">

        {{ Form::label('cellphone_number', 'Celular :', ['class'=> 'form-label']) }}

        {{ Form::text('cellphone_number', null , ['class'=> 'formText form-control ']) }}
        {{ errors_for('cellphone_number', $errors) }}

</div>
    <div><h3>Qué productos comercializa su empresa?</h3></div>
    <hr>




<div id="selectcontainer" class="container col-lg-12">
    <div class="col-lg-6">
        {{ Form::label('productos', 'Seleccione un Producto :', ['class'=> 'form-label']) }}
        <select name="productos[]" class="form-control" id="ProductSelect">
            @foreach($products as $product)

            <option value="{{$product->id}}">{{$product->name}}</option>

            @endforeach

        </select>


    </div>
    <div class="col-lg-4">
        {{ Form::label('amount1', 'Número de Hectáreas :', ['class'=> 'form-label']) }}

        <input type="text" name="amount[]" class='formText numbersOnly form-control '>

    </div>

</div>
<div class = "row centeredTitle">
    <div class="col-lg-12">
        <div class="col-lg-4 col-lg-offset-4">
            <button type="button" class='btn btn-success' onclick=addField()>Añadir Producto</button>
        </div>
    </div>
    
</div>
<input type="hidden" id="count" name="count" value="1">
<div class="col-md-5 col-xs-offset-3 col-md-offset-5" style='padding-top:3%'>
    {{ Form::submit('Crear Empresa', ['class'=> 'btn btn-lg btn-primary']) }}
</div>


</div>


{{ Form::close()  }}
    </div>
</div>
</div>

@stop