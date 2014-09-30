@extends('layouts/master')
@section('content')
{{ HTML::script('js/offers/show_company.js') }}
<h1>Panel de ofertas para el día {{$date}}</h1>

<div class="row">
	<div class="well col-md-8 col-md-offset-2">
		<div class = "row">
			<div class = "col-md-5">
				<div class="panel panel-success">
 					<div class="panel-heading">Cantidades</div>
 					<div class="panel-body">
    				<p style = "float:left">Cantidad máxima diaria </p>
    				<p id = "amount">{{$order_status->max_amount_daily}}</p>
    				
    				<p style = "float:left">Cantidad Tomada </p>
    				<p id ="amount_taken"></p>
						<p style = "float:left">Cantidad Restante </p>
    				<span id ="amount_left"></span>
  				</div>
					</div>
			</div>
			<div class = "col-md-5">
				<div class="panel panel-primary">
 					<div class="panel-heading">Precios</div>
 					<div class="panel-body">
    				<p style = "float:left">Precio a pagar </p>
    				<p id = "price">{{$order_status->price}}</p>
    				
    				<p style = "float:left">Precio Actual </p>
    				<p id = "price_topay"></p>
						
  				</div>
					</div>
			</div>
		</div>
	</div>
</div>		
{{Form::open(['route' => ['companies.offer.take',$companies,$order],'method' => 'post'])}}
		<div class="row">
			<center><h3>Ofertas Pendientes</h3></center>
			<div class="col-md-8 col-md-offset-2">
				<table class="table table-striped">
					<thead>
						<th>Seleccionar</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Compañía</th>
					</thead>
					@foreach ($offers as $offer) 
						<tr>
							<td>{{Form::checkbox('offers[]', $offer->id,null,['id'=>'checkbox'])}}</td>
							<td id = "{{'price'.$offer->id}}">{{$offer->price}}</td>
							<td id = "{{'amount'.$offer->id}}">{{$offer->amount}}</td>
							<td>{{Offer::find($offer->id)->provider->fancy_name}}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	{{ Form::submit('Tomar Ofertas', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
	{{ Form::close() }}
@stop