@extends('layouts/master')

@section('content')
<div class="container">
		<div class="row">
			<div class="dark col-md-12">
				<table class="table table-striped">
					<thead>
						<th>Email</th>
						<th>Nombre</th>
						<th>Acción</th>
					</thead>
					<tbody>
						@foreach($admins as $admin)
							<tr>
								<td>{{$admin->email}}</td>
								<td>{{$admin->name}}</td>
								<td>
    							  {{ Form::open(array('route' => array('admins.destroy', $admin->id), 'method' => 'delete')) }}
        							<button id = "{{$admin->id}}" type="submit" class="btn btn-default glyphicon glyphicon-trash"></button>
											<a id = "{{$admin->id}}" href="{{URL::route('admins.edit',$admin->id)}}" class="btn btn-default glyphicon glyphicon-pencil"></a>
    								{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			{{HTML::create_button('admin','admins.create')}}
			</div>
		</div>
	</div>	


@stop