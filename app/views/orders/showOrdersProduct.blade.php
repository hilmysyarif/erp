
@extends('layouts/master')

@section('content')
{{ HTML::script('js/orders/showOrdersProduct.js') }}
<div class = "row-fluid">
<div class="col-md-12 col-lg-12 dark">
    <h1>Lista de Órdenes</h1>
<div class="col-md-3 col-lg-3 ">
    <div class="col-lg-12 centeredTitle"><h1>{{$product->name}}</h1></div>
    <div class="col-lg-12">
    {{ HTML::image("/images/products/$product->rz320_img_url", $alt="$product->name", $attributes =
    array('class'=>'insideImg')) }}
    </div>
</div>
<div class="well col-md-9 col-lg-9 ">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <th>Empresa</th>
        <th>Lugar de entrega</th>
        <th>Cantidad Mínima[Kg]</th>
        <th>Cantidad Máxima por Proveedor[Kg]</th>
        <th>Cantidad Máxima diaria[Kg]</th>
        <th>Cantidad Total[Kg]</th>
        <th>Precio Ofertado</th>
        <th>Días Ofertados</th>
        </thead>
        <tbody>
        @foreach($orders as $order)
        

        <tr class="tableData">
            <td><a href="{{ URL::route('providers.orders.show',['companies'=> $order->company->id , 'orders'=> $order->id ]) }}"></a> {{$order->company->fancy_name}}</td>
            <td>{{$order->company->location}}</td>
            <td>{{$order->min_amount}}</td>
            <td>{{$order->max_amount}}</td>
            <td>{{$order->max_amount_daily}}</td>
            <td>{{$order->amount}}</td>
            <td>${{$order->price}}</td>
            <td class="active"><a href="{{ URL::route('providers.offers.show',['provider'=> Auth::user()->provider_id , 'orders'=> $order->id ]) }}">{{count($order->offers()->where('provider_id','=',Auth::user()->provider_id)->get())}}</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>


@stop
