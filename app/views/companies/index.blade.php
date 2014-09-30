@extends('layouts/master')

@section('content')

<div class = "row">
    <div class = "col-md-12">
<div class="centeredTitle Separator">
    <h1>Empresas</h1>
</div>


</div>
<div class ="dark col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 ">
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
                Acción
            </th>

        </tr>

        </thead>
        <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->rut}}</td>
            <td>{{$company->fancy_name}}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('admins/companies/' . $company->id . '/edit') }}">Editar</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('admins/companies/' . $company->id.'/products') }}">Ver Productos</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <div class="row centeredTitle">
        {{HTML::create_button('Empresa','admins.companies.create','btn-success btn-lg')}}
    </div>
</div>
    </div>
</div>
@stop
