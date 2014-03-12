var myApp = angular.module('myApp',["ngRoute","checklist-model"]).
	config(function($interpolateProvider){
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');

});

myApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/laenutaotlused', {
                templateUrl: 'assets/partials/laenutaotlused/taotlus.html',
                controller: 'TestController'
            });
    }]);
myApp.controller('NewApplicationsController',['$scope', '$http', function($scope, $http){
	$scope.sisua="laenutaotlused";
	$scope.newApps= function(){

		$http.get('uusbaas/taotlused').success(function(data){

//		$scope.test=data;
		$scope.taotlused=data;
		//console.log($scope.loans);
		});

	}

	$scope.uusData="";
	$scope.mail={
		whom:'',

	};
	$scope.uustaotlus=function(){
		//$scope.
	}
	$scope.loadTaotlus=function(){

//		$scope.uusData=[];
//console.log($scope.taotlused)
	//	console.log($scope.uusData.loetud)	
		$scope.uusData=this.new;

	if($scope.taotlused[this.$index].loetud==0)
		{
	$scope.taotlused[this.$index].loetud=1;
	console.log(this.new)
	$http.post('uusbaas/taotlused/loetud/update', this.new).success(function(data){
	   		

		

	   	
   		})

}
//		console.log($scope.uusData)


	}

    $scope.addToClientList=function(id){
        console.log($scope.uusData)
        $http.post('uusbaas/addToClientList',$scope.uusData).success(function(data){
        	if(data)
        	{
        		alert('Klient on lisatud')
        	}
         //   $scope.loans.push(data);
        });    
    }

    $scope.generatePDF=function(){
    //	console.log($scope.uusData.eesnimi)
        $http.post('uusbaas/wkpdf',$scope.uusData).success(function(data){
         console.log(data)
        }); 
    }
    $scope.saveMarkus=function(){
	//console.log($scope.uusData.markus)
   	$http.post('uusbaas/taotlused/markus/update', $scope.uusData).success(function(data){
	   		if(data){
	   			alert('Salvestatud')	
	   		}
   		})
    }
    $scope.toArh=function(){
    	this.new.status=!this.new.status;
    	console.log(this)
	$http.post('uusbaas/taotlused/arh/update', this.new).success(function(data){

   		})


    }
    $scope.sendMail=function(){
		$http.post('uusbaas/sendmail', $scope.uusData).success(function(data){
		   		if(data){
		   			alert('Saadetud')	
		   		}
	   		})

			console.log($scope);
		}
	$scope.set_color = function (loetud) {


	  if (!$scope.taotlused[this.$index].loetud) {
	    				return { color:'black', fontWeight:'bold'}
	  }
	  else{

	  return	{color:'black', fontWeight:'normal'}
			}

	}


	$scope.getMailTemplate=function(){
		$http.get('uusbaas/mail/template').succss(function(data){
			$scope.uusData.mailText=data
		})
	}
}])
myApp.controller('TestController',['$scope','$http', function ($scope, $http, ngTableParams){
	$scope.greeting = "Argo";
    $scope.subloans=false;
	$scope.stiil={true:'active', false:''}
	$scope.list=[];

	var indexedLoans=[];
	$scope.loansToFilter = function(){
		indexedLoans = [];
		return $scope.loans;
	}
	 $scope.filterLoans = function(loan) {
        var loanIsNew = indexedLoans.indexOf(loan.multirow_id) == -1;

        if (loanIsNew) {
            indexedLoans.push(loan.multirow_id);
        }
        return loanIsNew;
    
    }
    $scope.checkLoans = {
    	loans:[],
    };
    $scope.check=function(){
    	console.log($scope.checkLoans)
    }
    $scope.sw = function(){
      $scope.subloans = !$scope.subloans
    }
	//$scope.showDelete = false;
	$scope.getInfo= function(){

		$http.get('uusbaas/client/'+$scope.newClient).success(function(data){
			$scope.list=[];
	
		$scope.test=data['data'];
		$scope.loans=data['data']['loan'];
		//console.log($scope.loans);
		});

	}
	$scope.addLoan=function (id){
	
		var laen={
			id:$scope.checkLoans.loans[0],
			kl_nr:$scope.newClient,
			laen:$scope.laen,
			tasutud_laen:$scope.tasutud_laen,
			intress:$scope.intress,
			pank:$scope.pank,
			active_loan:1,
			kokku: $scope.total, 
			
		};
//		console.log($scope.select[0].ID)
	//	console.log(this)
	//	console.log($scope.loans)
		//$scope.test['loans'].push(laen);
		//$scope.$apply();
	//	console.log($scope.test)
		/*$scope.$watch('loans', function(o,n){
			if(o!=n){
			//$scope.getInfo();
			}
		});*/
		$http.post('uusbaas/add/loan',laen).success(function(data){
			$scope.loans.push(data);
			$scope.addloansForm.$setPristine;
		});
	};
	$scope.hover = function(laen){
		return $scope.showDelete != $scope.showDelete;
	};
	$scope.toPassive = function(laen){
		
	//	alert(laen.ID);
		console.log(laen.active_loan)
		 laen.active_loan = ! laen.active_loan;
		 console.log(laen.active_loan)
		 console.log($scope.active_loan)
		 $http.post('uusbaas/update/loan',laen);

	};
	$scope.destroy=function(laen){
		$http.delete('uusbaas/removeLoan/'+laen.ID).success(function(data){
		console.log(laen)
			var i=$scope.loans.indexOf(laen);
			//alert(i)
			if(i==-1){
				$scope.loans.pop();
			}else{
			$scope.loans.splice(i, 1);
			}
console.log($scope.loans);
//		$scope.loans.pop(laen);
		})
	}
	$scope.checkbox= function(id){
		if(!id.selected){

		console.log($scope.list.push(id))

		}
		else{
			var i=$scope.list.indexOf(id.$parent.loan.ID);
			//alert(i)
			if(i==-1){
				$scope.list.pop();
			}else{
			$scope.list.splice(i, 1);
			}
		}
console.log($scope.list)
console.log(id.$parent.loan.ID)
	}

    $scope.updateClientForm=function(){
        var clientData={
            kl_nr:$scope.newClient,
            eesnimi:$scope.eesnimi,
            perenimi:$scope.perenimi,
            elukoht:$scope.elukoht,
            telefon:$scope.telefon,
            arveldusarve:$scope.arveldusarve,
            email:$scope.email,
            amet:$scope.amet,
            palk:$scope.palk,
            markus:$scope.markus
        };
        $http.post('uusbaas/update/userdata',clientData).success(function(data){
            if(data){
                alert("Andmed on edukalt uuendatud");

            }else{alert("Tekkis viga andmete töötlemisel!");}

        });
    }
    $scope.updateComments = function(id){
        var comments={
            kl_nr:$scope.newClient,

            markus:$scope.markus
        }
    $http.post('uusbaas/update/userdata',clientData).success(function(data){
        if(data){alert("Andmed on edukalt uuendatud");}else
        {alert("Tekkis viga andmete töötlemisel!");}


     });
    }





}]);
var uniqueItems = function (data, key) {
    var result = [];
    if(data){
	    for (var i = 0; i < data.length; i++) {
	        var value = data[i][key];
	        if (result.indexOf(value) == -1) {
	            result.push(value);
	        }
	    }
	    return result;
	}
};
myApp.filter('groupBy',
    function () {
        return function (collection, key) {
            if (collection === null) return;
            return uniqueItems(collection, key);
        };
    });


