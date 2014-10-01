@extends('layouts/masterconfig')

@section('content')
<script src="/js/banks/banks.js"></script>

<div class="centeredTitle Separator col-lg-11 col-lg-offset-1 ">

    <h1>Bancos </h1>

</div>


<div class="col-lg-11 col-lg-offset-1" ng-controller="BanksController">


    <div class="row">

        <div class="col-lg-6 col-lg-offset-6">
            <div class="input-group">
                <input ng-model="newBank" type="text" class="form-control" placeholder="Agregar un Banco">
      <span class="input-group-btn">
        <button ng-click="addBank()" class="btnGreen btn btn-danger" type="button">Crear Banco</button>
      </span>
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->


    </div>
    <!-- /.row -->


    <table class="row-border hover stripe centeredTitle " cellspacing="0" style="width: 100%">
        <thead>
        <tr>
            <th>
                Banco
            </th>

            <th>
                Acción
            </th>

        </tr>

        </thead>
        <tbody>

        <tr ng-repeat="bank in banks">

            <td>@{{bank.name}}</td>

            <td>

                <button ng-click="deleteBank(bank.id)" class="btn btn-small btn-default" type="button">Eliminar</button>
            </td>
        </tr>


        </tbody>
    </table>

</div>
@stop