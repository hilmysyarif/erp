@extends('layouts/master')

@section('content')
<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
    <div class="centeredTitle"><h1>Agregar Producto</h1></div>


{{ Form::open(['url'=>'admins/companies/'.$company_id.'/products/store','method'=>'get'])  }}

<div class="form-group">
    {{Form::select('product',$products, 'S');}}
</div>

  
<!--Create Account  Form Input -->
<div class="form-group">
    {{ Form::submit('Agregar Producto', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
</div>
{{ Form::close()  }}

</div>
@stop