<!doctype html>
<html ng-app="AngularApp" ng-controller="ClienteController">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio con angular</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="{{ asset('angular/angular-route.min.js') }}"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</head>
<body>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Cédula</th>
        <th>Nit</th>
        <th><button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add',0)">Crear Cliente</button></th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat=" cliente in clientes">
        <td>@{{ cliente.cliente_id }}</td>
        <td>@{{ cliente.cliente_nombre }}</td>
        <td>@{{ cliente.cliente_cedula }}</td>
        <td>@{{ cliente.cliente_nit }}</td>
        <td>
            <button id="btn-edit" class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', cliente.cliente_id)">
                <span class="glyphicon glyphicon-edit"></span></button>
            </button>
            <button id="btn-delete" class="btn btn-warning btn-xs btn-detail" ng-click="confirmDelete(cliente.cliente_id)">
                <span class="glyphicon glyphicon-trash"></span></button>
            </button>
        </td>
    </tr>
    </tbody>
</table>

<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="1" role="dialog" aria-labelledby="">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@{{form_title}}</h4>
            </div>
            <div class="modal-body">
                <form name="frmCliente" class="form-horizontal" novalidate>
                    <div class="form-group">
                        <label for="cliente_nombre">Nombre:</label>
                        <input name="cliente_nombre" type="text" class="form-control" id="cliente_nombre" value="@{{cliente.cliente_nombre}}" ng-model="cliente.cliente_nombre" ng-required="true">
                        <span ng-show="frmCliente.clienteNombre.$invalid && frmCliente.clienteNombre.$touched">El campo Nombre es requerido</span>
                    </div>


                    <div class="form-group">
                        <label for="cliente_cedula">Cédula:</label>
                        <input name="cliente_cedula" type="text" class="form-control" id="cliente_cedula" value="@{{cliente.cliente_cedula}}" ng-model="cliente.cliente_cedula" ng-required="true">
                        <span ng-show="frmCliente.clienteCedula.$invalid && frmCliente.clienteCedula.$touched">El campo Cédula es requerido</span>
                    </div>

                    <div class="form-group">
                        <label for="cliente_nit">Nit:</label>
                        <input name="cliente_nit" type="text" class="form-control" id="cliente_nit" value="@{{cliente.cliente_nit}}" ng-model="cliente.cliente_nit" ng-required="true">
                        <span ng-show="frmCliente.clienteNit.$invalid && frmCliente.clienteNit.$touched">El campo Nit es requerido</span>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(estadomodal,cliente_id)">Guardar Cambios</button>
                </div>
            </div>

        </div>

    </div>
</div>

</body>

<script src="{{ asset('angular/app.js') }}"></script>
<script src="{{ asset('angular/angular-route.min.js') }}"></script>
<script src="{{ asset('angular//controllers/ClienteController.js') }}"></script>


</html>