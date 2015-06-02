
$(".txt").on("focusout", function () {
	opcion=$('#id'+this.id+' option:selected').html();
	if(opcion.length==0){
		alert('Ingrese un ID valido');
		this.value=""
		angular.element(this).triggerHandler('input')
	}
});

app.controller('createActivoController', ['$scope', function($scope) {
	$scope.temp={};
	$scope.masivo=false;
  $scope.llena = function () {
  	$scope.temp=angular.copy($scope.detalle);
  	$scope.IdOfna=$scope.detalle.Ubicac;
  }
}]);
