<!DOCTYPE html>
<html ng-app>
<head>

    <title> @yield('meta-title','Chile Agrícola')</title>
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    {{ HTML::style('css/index.css'); }}
    {{ HTML::style('//cdn.datatables.net/1.10.0/css/jquery.dataTables.css') }}
    <!--Datatable's Bootstrap 3 integration-->
    {{ HTML::style('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css') }}


    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}

    {{ HTML::script('js/providers/index.js') }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}


    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    {{ HTML::script('//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}
    <!--Datatable's Bootstrap 3 integration-->s
    {{ HTML::script('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') }}


    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>






</head>
<body>


<!--Barra de navegación-->

@if(Auth::check() and Auth::user()->role_id == 1)
@include('layouts/partials/navbarAdmin')
@elseif(Auth::check() and Auth::user()->company_id != 0)
@include('layouts/partials/navbarCompany')
@elseif(Auth::check() and Auth::user()->provider_id != 0)
@include('layouts/partials/navbarProvider')
@else
@include('layouts/partials/navbar')
@endif

<!-- #############/Barra de navegación##############-->


<!-- #############Content##############-->


<div class="container-fluid content">
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
        </ul>
    </div>
    @include('flash::message')
    @yield('content')
</div>
<!-- #############/Content##############-->




</body>
</html>