app.controller('ClienteController', function ($scope,$http, API_URL) {

    $http.get(API_URL + 'cliente').success(function(data){
        $scope.clientes = data;
    });

    //mostrar modal
    $scope.toggle = function (modalestado, cliente_id){
        $scope.modalestado = modalestado;
        switch (modalestado){
            case 'add' :
                $scope.form_title = "Agregar cliente";
                break;
            case 'edit' :
                $scope.form_title = "Detalle del Cliente";

                $http.get(API_URL + 'cliente/' +cliente_id).success(function (response) {

                    $scope.cliente = response;
                });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
    }


    // Guardar nuevo cliente y actualizar uno existente
    $scope.save = function (modalestado, cliente_id) {

        var url = API_URL + 'cliente';
        if(modalestado === 'edit'){
            url += "/" +id;
        }
        $http({
            method: 'POST',
            url : url,
            data : $.param($scope.cliente),
            headers: {'Content-Type' : 'application/x-www-form-urlenconded'}
        }).success(function (response) {
            console.log(response);
            location.reload();
        }).error(function (response) {
            console.log(response);
            alert('Ha ocurrido un error!');
        });
    }

    //Eliminar Cliente
    $scope.confirmDelete = function (cliente_id) {
        var isConfirmDelete = confirm('¿Estás seguro que de sea eliminar este cliente?');
        if(isConfirmDelete){
            $http({
                method : 'DELETE',
                url : API_URL + 'cliente/' + cliente_id
            }).success(function (data) {
                console.log(data);
                location.reload();
            }).error(function (data) {
                console.log(data);
                alert('No se puede eliminar');
            });
        }else{
            return false;
        }
    }
});