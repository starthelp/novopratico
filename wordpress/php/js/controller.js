app.controller('DependenteController', ['$scope', function ($scope) {
 
    $scope.tipos = [];
     
    $scope.lancamento = {
        colaborador: 0,
        nome: "",
        nascimento: "",
        irrf: "", 
        cpf: "",
		salfamilia: ""
    };
 
    $scope.init = function () {
        //carregando os tipos
        if (localStorage.getItem("tps") != null) {
            $scope.tipos = JSON.parse(localStorage.getItem("tps"));
        }
    };
 
    $scope.salvar = function () {
        
        //testando se o formulário é valido
        if (!$scope.formDependente.$valid) {
             
            alert('Verifique os campos');
        }
        else{
           alert('Salvou');
        }
    }
 
    $scope.init();
 
}]);