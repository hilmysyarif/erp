@extends('layouts/master')

@section('content')


<div class="centeredTitle">
    <h1>Provedores</h1>
</div>
<hr>
<div class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4 col-lg-4 col-lg-offset-8">
    {{ Form::open(['action'=>'admins.providers.create','method'=>'get']) }}
    <!--Create Account  Form Input -->
    <div class="form-group">
        {{ Form::submit('Agregar Provedor', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
    </div>
    {{ Form::close() }}

</div>
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 ">
    <table id="providers" class="row-border hover stripe" cellspacing="0" style="width: 100%">
        <thead>
        <tr>
            <th>
                RUT
            </th>
            <th>
                Nombre
            </th>
            <th>
               Acciones
            </th>

        </tr>

        </thead>
        <tbody>
        @foreach($providers as $provider)
        <tr>
            <td>{{$provider->rut}}</td>
            <td>{{$provider->fancy_name}}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('admins/providers/' . $provider->id . '/edit') }}">Editar</a>
                 <a class="btn btn-small btn-info" href="{{ URL::to('admins/providers/' . $provider->id.'/products') }}">Ver Productos</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@stop
