@extends('layouts.master')

@section('content')
<h1>{{$product->name}}</h1>
<article>{{$product->description}}</article>


<p>{{ link_to('/products', 'Volver')}}</p>

@stop