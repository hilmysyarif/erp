@extends('layouts/master')

@section('content')


<div class="centeredTitle Separator">
    <h1>Productos</h1>
</div>
<hr>



<div class ="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 ">
    <table id="providers" class="row-border hover stripe" cellspacing="0" style="width: 100%">
        <thead>
        <tr>
            <th>
                Producto
            </th>
            <th>
                Imagen
            </th>
            <th>
                Acción
            </th>

        </tr>

        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{ HTML::image('images/products/'.$product->rzTn_img_url, $alt="$product->name",$attributes = array())}}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('admins/products/' . $product->id . '/edit') }}">Editar</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
<div class="row centeredTitle">
    {{HTML::create_button('producto', 'admins.products.create', 'btnGreen btn btn-success btn-lg')}}
</div>
</div>
@stop
