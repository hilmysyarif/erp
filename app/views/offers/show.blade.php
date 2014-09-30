@extends('layouts/master')

@section('content')
	<h1>Lista de ofertas hechas a {{$company->fancy_name}}</h1>	
	<table class="table table-striped table-hover">
    <thead>
      <th>Fecha</th>
      <th>Cantidad Ofertada[Kg]</th>
      <th>Precio Ofertado</th>
      <th>Estado</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    	@foreach ($offers as $offer)
				{{HTML::tr($offer->state)}}
					<td>{{$offer->date}}</td>
					<td>{{$offer->amount}}</td>
					<td>${{$offer->price}}</td>
					<td>{{$offer->state}}</td>
				</tr>
    	@endforeach
    </tbody>
  </table>
@stop