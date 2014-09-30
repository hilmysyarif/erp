@extends('layouts/master')

@section('content')
  <table class="table table-striped table-hover">
		<thead>
 			<th>Fecha</th>
			<th>Ofertas Pendientes</th>
			<th>Ofertas Tomadas</th>
			<th>Acciones</th>
			<tbody>
				@foreach ($offers as $offer) 
					<tr>
						<td>{{$offer->date}}</td>
						<td>{{$offer->where('state','=','pending')->where('date','=',$offer->date)->count()}}</td>
						<td>{{$offer->where('state','=','taken')->where('date','=',$offer->date)->count()}}</td>
						<td><a href="{{URL::route('companies.offer.status', [$companies, $order,$offer->date])}}" class="btn btn-default glyphicon glyphicon-pencil"></a></td>	
					</tr>
				@endforeach
			</tbody>
		</thead>
	</table>

@stop