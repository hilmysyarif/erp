@extends('layouts/master')


@section('content')

<div class="container">
    <div class="row centeredTitle" ng-controller="WeeksController ">


        <h2>
            <button ng-click="previousMonth()" type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </button>


            @{{ date }}

            <button ng-click="nextMonth()" type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        </h2>


        <ul>

            <li ng-repeat="week in weekdays"> @{{ week }}</li>

        </ul>
    </div>
    <div class="row Separator">
        <h2>Seguimiento de Órdenes</h2>
    </div>
    <div class="row ">

        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 productContainer">
            <div class="thumbnail col-md-4">
                {{ HTML::image("/images/products/$product->rzTn_img_url", $alt="$product->name", $attributes =
                array('class'=>'insideImg')) }}
            </div>
            <div class="caption col-md-8">
                <h3>{{$product->name}}</h3>
                <a href="{{ URL::route('orders_for.product',['product'=> $product->id ])}}">
                    <div class="btn btn-success btn-group-sm order" role="button">
                        <p>Ordenes</p>

                        <p class="fa fa-shopping-cart fa-2x">{{$product->orders->count()}}</p>
                    </div>
                </a>
                <a href="#" class="btn btn-default request" role="button">
                    <p>Solicitudes</p>

                    <p class="fa fa-list fa-2x">0</p>
                </a>
            </div>


        </div>
        @endforeach
    </div>
</div>
@stop