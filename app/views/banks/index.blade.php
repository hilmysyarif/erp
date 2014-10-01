@extends('layouts/masterconfig')

@section('content')
<script src="/js/banks/banks.js"></script>

<div class="centeredTitle Separator col-lg-11 col-lg-offset-1 " ng-controller="BanksController">

    <h1>Bancos </h1>

</div>


<div class="col-lg-11 col-lg-offset-1" ng-controller="BanksController">



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modificar Banco</h4>
                </div>
                <div class="modal-body">


                    Nuevo Nombre
                    <input ng-model="newName" type="text" class="form-control" placeholder="Editar Banco">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button ng-click="updateBank(newName)" type="button" class="btn btn-primary" data-dismiss="modal" >Guardar</button>
                </div>
            </div>
        </div>
    </div>


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

        <tr ng-repeat="bank in banks | orderBy:'name'">

            <td>@{{bank.name}}</td>

            <td>

                <button ng-click="deleteBank(bank.id)" class="btn btn-small btn-danger" type="button">Eliminar</button>
                <!-- Button trigger modal -->
                <button ng-click="editBank(bank.id, bank.name)" class="btn btn-small btn-primary" data-toggle="modal" data-target="#myModal">
                    Editar
                </button>


            </td>


        </tr>


        </tbody>
    </table>

</div>
@stop