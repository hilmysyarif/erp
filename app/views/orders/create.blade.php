@extends('layouts/master')

@section('content')
{{ HTML::script('js/orders/create.js') }}

<div class="col-lg-8 col-lg-offset-2 dark">

    <div class="row Separator centeredTitle">
        <h1>Qué producto necesitas comprar?</h1>
    </div>

    {{ Form::open(['route'=> 'companies.orders.store']) }}

    <!-- Product Form Input -->
    <div class="form-group  {{ $errors->has('product_id') ? 'has-error' : '' }}">
        {{ Form::label('productos', 'Seleccione un Producto :', ['class'=> 'form-label']) }}
        <select name="product_id" class="form-group form-control" id="ProductSelect">
            <option value="0">Seleccione un producto....</option>
            @foreach($products as $product)

            <option value="{{$product->id}}">{{$product->name}}</option>

            @endforeach

        </select>
        {{ errors_for('product_id', $errors) }}
    </div>
    <!-- Type of Order Form Input -->
    <div class="form-group  {{ $errors->has('period') ? 'has-error' : '' }}">

        {{ Form::label('productos', 'Periodo de compra :', ['class'=> 'form-label']) }}
        <select name="period" class="form-group form-control" id="periodSelect">

            <option value="0">Seleccione un periodo....</option>
            <option value="1">Día específico</option>
            <option value="2">Todos los días (Lunes-Viernes) en un Periodo</option>
            <option value="3">Todos los días (Lunes-Domingo) un Periodo</option>

        </select>
        {{ errors_for('period', $errors) }}

    </div>
    <!-- Start_date Form Input -->
    <div class="form-group  {{ $errors->has('start_date') ? 'has-error' : '' }}">
        {{ Form::label('start_date', 'Fecha de Inicio :') }}
        {{ Form::text('start_date', null , ['class'=> 'form-control','id'=>'datepicker_start']) }}
        {{ errors_for('start_date', $errors) }}
    </div>


    <!-- End_date Form Input -->
    <div class="hideInput form-group  {{ $errors->has('end_date') ? 'has-error' : '' }}">
        {{ Form::label('end_date', 'Fecha de Término :') }}
        {{ Form::text('end_date', null , ['class'=> 'form-control', 'id'=>'datepicker_end']) }}
        {{ errors_for('end_date', $errors) }}
    </div>


    <!-- Amount Form Input -->
    <div class="form-group  {{ $errors->has('amount') ? 'has-error' : '' }}">
        {{ Form::label('amount', 'Cuántos Kilos necesita comprar en total :') }}
        {{ Form::text('amount', null , ['class'=> 'form-control','id'=>'amount']) }}
        {{ errors_for('amount', $errors) }}
    </div>

    <!-- Min_amount Form Input -->
    <div class="form-group  {{ $errors->has('min_amount') ? 'has-error' : '' }}">
        {{ Form::label('min_amount', 'Mínima cantidad a recibir diáriamente por proveedor :') }}
        {{ Form::text('min_amount', null , ['class'=> 'form-control','id'=>'min_amount']) }}
        {{ errors_for('min_amount', $errors) }}
        <span class="label label-danger" id="spanmin"></span>
    </div>

    <!-- Max_amount Form Input -->
    <div class="form-group  {{ $errors->has('max_amount') ? 'has-error' : '' }}">
        {{ Form::label('max_amount', 'Máxima cantidad a recibir diáriamente por proveedor :') }}
        {{ Form::text('max_amount', null , ['class'=> 'form-control','id'=>'max_amount']) }}
        {{ errors_for('max_amount', $errors) }}
        <span class="label label-danger" id="spanmax"></span>
    </div>

    <!-- Max_amount_daily Form Input -->
    <div class="form-group">
        {{ Form::label('max_amount_daily', 'Máxima cantidad a recibir diariamente por todos los proveedores :') }}
        {{ Form::text('max_amount_daily', null , ['class'=> 'form-control']) }}
        {{ errors_for('max_amount_daily', $errors) }}
    </div>


    <!-- Price Form Input -->
    <div class="form-group  {{ $errors->has('price') ? 'has-error' : '' }}">
        {{ Form::label('price', 'Precio de Compra por kilo :') }}
        {{ Form::text('price', null , ['class'=> 'form-control']) }}
        {{ errors_for('price', $errors) }}
    </div>

    <!--Crear Orden  Form Input -->
    <div class="form-group centeredTitle">
        {{ Form::submit('Crear Orden', ['class'=> 'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
</div>
@stop