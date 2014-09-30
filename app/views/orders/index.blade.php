

@extends('layouts/master')

@section('content')
{{ HTML::script('js/orders/index.js') }}
<div class="row">
    <div class = "col-md-offset-1 col-md-10 dark">
<div class="centeredTitle">
    <h1>Ordenes de Compra</h1>
</div>
<div class="well col-lg-12 col-md-12  col-xs-12 ">
    <table id="providers" class="row-border hover stripe" cellspacing="0" style="width: 100%">
        <thead>
            <th class = "border-top-left-corner">
                Código
            </th>
            <th>
                Producto
            </th>
            <th>
                Fecha Inicio
            </th>
            <th>
                Fecha Térrmino
            </th>
            <th>
                Cantidad Solicitada
            </th>
            <th class = "border-top-right-corner">
                Acciones
            </th>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>

            <td>{{$order->product->name}}</td>

            <td>{{$order->start_date}}</td>

            <td>{{$order->end_date}}</td>

            <td>{{$order->amount}}</td>

            <td>
                <a class="btn btn-small btn-info"
                   href="{{ URL::route('companies.orders.edit',['companies' => Auth::user()->company_id, 'orders' => $order->id ]) }}">Editar</a>

                <a class="btn btn-small btn-info"
                   href="{{ URL::route('companies.offer.show',['companies' => Auth::user()->company_id, 'orders' => $order->id ]) }}">Ver Ofertas</a>

            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
        {{ Form::open(['route'=>['companies.orders.create', Auth::user()->company_id ],'method'=>'get']) }}
    <!--Create Account  Form Input -->
    <div class="form-group centeredTitle">
        {{ Form::submit('Crear Orden', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
    </div>
    {{ Form::close() }}

</div>
</div>
</div>
@stop

