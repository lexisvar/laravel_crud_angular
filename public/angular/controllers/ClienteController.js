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
                $scope.cliente_id = cliente_id;
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
            url += "/" +cliente_id;
        }
        $http.post(url, $scope.cliente).
        success(function(data){
            $('#myModal').modal('hide');
            $scope.clientes = {};
            $http.get(API_URL + 'cliente').success(function(data){
                $scope.clientes = data;
            });

        }).error(function(data, status) {
            console.log("Estado "+status);
            console.log("Data "+data);
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

                $http.get(API_URL + 'cliente').success(function(data){
                    $scope.clientes = data;
                });
            }).error(function (data) {
                console.log(data);
                alert('No se puede eliminar');
            });
        }else{
            return false;
        }
    }
});