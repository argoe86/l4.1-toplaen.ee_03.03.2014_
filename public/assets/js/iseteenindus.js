var iseteenindus = angular.module('iseteenindus',['uiSlider', 'ui.bootstrap']).
	config(function($interpolateProvider){
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');

});
	iseteenindus.controller('ItemCtrl', ['$scope', function($scope) {
    $scope.cost = 350
	}]);
iseteenindus.controller('IseController',['$scope','$http', function ($scope, $http){

	$scope.getInfo= function(){

		$http.get('/uusbaas/client/1136').success(function(data){

		$scope.test=data;
		$scope.loans=data['loan'];
		console.log($scope.loans);
		});

	}
	$scope.addLoan=function (){
		var laen={
			kl_nr:$scope.newClient,
			laen:$scope.laen,
			tasutud_laen:$scope.tasutud_laen,
			intress:$scope.intress,
			pank:$scope.pank
			
		};
		//$scope.test['loans'].push(laen);
		$scope.loans.push(laen);
		console.log($scope.newClient)
		$scope.$watch('loans', function(o,n){
			if(o!=n){
			$scope.getInfo();
			}
		});
		$http.post('uusbaas/add/loan',laen);
	};
	$scope.hover = function(laen){
		return $scope.showDelete != $scope.showDelete;
	};
	$scope.delete = function(laen){
		
		//alert(laen.ID);
		console.log(laen.active_loan)
		 laen.active_loan = ! laen.active_loan;
		 console.log(laen.active_loan)
		 console.log($scope.loans)
		 $http.post('uusbaas/update/loan',laen);

	}



 $scope.today = function() {
    $scope.dt = new Date();
  	$scope.dt2 = new Date();

  };
  $scope.today();

  $scope.showWeeks = true;
  $scope.toggleWeeks = function () {
    $scope.showWeeks = ! $scope.showWeeks;
  };

  $scope.clear = function () {
    $scope.dt = null;
  };

  // Disable weekend selection
  $scope.disabled = function(date, mode) {
    return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
  };

  $scope.toggleMin = function() {
    $scope.minDate = ( $scope.minDate ) ? null : new Date();
  };
  $scope.toggleMin();

  $scope.open = function($event) {
    $event.preventDefault();
    $event.stopPropagation();

    $scope.opened = true;
  };

  $scope.dateOptions = {
    'year-format': "'yy'",
    'starting-day': 1
  };

  $scope.formats = ['dd-MM-yyyy'];
  $scope.format = $scope.formats[0];



}]);
