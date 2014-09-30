@extends('layouts/master')


@section('content')
<script src="/js/companies/dashboard.js"></script>

<div class="container">

    <div class="row centeredTitle" ng-controller="WeeksController">


        <h2>
            <button ng-click="previousMonth()" type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </button>


            @{{ date }}

            <button ng-click="nextMonth()" type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        </h2>

        <div class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4 col-lg-4 col-lg-offset-8">


            {{ Form::open(['route'=>['companies.orders.create', Auth::user()->company_id ],'method'=>'get']) }}
            <!--Create Account  Form Input -->
            <div class="form-group">
                {{ Form::submit('Agregar Nueva Orden', ['class'=> 'btnGreen btn btn-success btn-lg']) }}
            </div>
            {{ Form::close() }}

        </div>
        <div class="row Separator col-md-6 col-md-offset-3 centeredTitle">
            <h2>Seguimiento de Órdenes</h2>
        </div>

        <input type="text" placeholder="Filtrar productos" ng-model="search">

        <div class="row ">

            <div ng-repeat="products in orders ">

                <div class="col-sm-6 col-md-4 productContainer" ng-repeat="product in products | filter:search">


                    <div class="thumbnail col-md-4">
                        <img src="/images/products/@{{ product.img }}" alt="@{{ product.name }}" class='insideImg'>
                    </div>
                    <div class="caption col-md-8">
                        <h3>@{{ product.name }}</h3>
                        <a href="orders?product=@{{ product.name }}   @{{ formatted_date }} ">

                            <div class="btn btn-success btn-group-sm order" role="button">
                                <p>Órdenes</p>

                                <p class="fa fa-shopping-cart fa-2x">@{{ product.count }}</p>
                            </div>
                        </a>
                        <a href="#" class="btn btn-default request" role="button">
                            <p>Ofertas</p>

                            <p class="fa fa-list fa-2x">@{{ product.offer_count }}</p>
                        </a>
                    </div>


                    <div class="col-md-12 dashBoardBack">
                        <div class="col-md-4 dashBoardItem">
                            <span class="col-md-12">
                               Semana
                            </span>
                            <span class="col-md-12">
                            Pedidos
                            </span>
                            <span class="col-md-12">
                            Ofertados
                            </span>
                            <span class="col-md-12">
                            Restantes
                            </span>
                        </div>
                        <div class="col-md-2 dashBoardWeek" ng-repeat="value in product">
                            <span class="col-md-12">
                            @{{ value.week }}
                                </span>
                            <span class="c">
                                <span class="col-md-12 dashBoardValue">
                                @{{ value.orders_amount }}
                                    </span>
                                    <span class="col-md-12 dashBoardValue">
                                @{{ value.offer_amount }}
                                        </span>
                                        <span class="col-md-12 dashBoardValue">
                              @{{ value.amount_left}}
                                            </span>


                            </span>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
</div>
@stop