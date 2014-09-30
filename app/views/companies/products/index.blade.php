@extends('layouts/master')

@section('content')


<div class="centeredTitle">
    <h1>Productos de {{$company->fancy_name}}</h1>
</div>
<hr>
<div class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4 col-lg-4 col-lg-offset-8">
    {{ Form::open(['url'=>'admins/companies/'.$company_id.'/products/create','method'=>'get'])  }}
    <!--Create Account  Form Input -->
    <div class="form-group">
        {{ Form::submit('Agregar Producto', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
    </div>
    {{ Form::close()  }}

</div>
<div class ="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 ">
    <table id="providers" class="row-border hover stripe" cellspacing="0" style="width: 100%">
        <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Nombre
            </th>
            <th>
                Descripción
            </th>
            <th>
                Acción
            </th>

        </tr>

        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>
              <a class="btn btn-default glyphicon glyphicon-trash" href="{{ URL::to('admins/companies/'.$company_id.'/products/'.$product->id) }}"></a>
            </td>        
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@stop
