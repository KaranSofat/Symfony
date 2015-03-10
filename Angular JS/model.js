var app = angular.module("myApp", ['ngRoute','ui.bootstrap']);

app.config(function($routeProvider){
$routeProvider
.when('/edit', {
				templateUrl : 'edit.html',
				controller  : 'insert'
			})
.when('/dashboard', {
				templateUrl : 'dashboard.html',
				controller  : 'insert'
			})

});
app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
    });
//Create a module for application
app.controller("insert", function($scope,$http,$location) {
/*------Start---Insert data in database------------*/
  		 $scope.add=function()
		{
			
			$http.post('crud.php?action=insert',{
			
				'name':$scope.name

			})
        	
			.success(function(data,status,header,config)
			{
				
			})	
		
		}	
/*------End---Insert data in database------------*/



/*------Start---fetch data from database------------*/
		$scope.fetch=function()
		{

			$http.get('crud.php?action=fetch',{
			
				

			})
        	
			.success(function(data,status,header,config)
			{

				$scope.names = data;    
        			$scope.currentPage = 1; //current page
        			$scope.entryLimit = 5; //max no of items to display in a page
        			$scope.filteredItems = $scope.names.length; //Initially for no filter  
       				 $scope.totalItems = $scope.names.length;


			})	
		

}

/*------End---fetch data from database------------*/
/*--------Start Pagination here------------*/
  	$scope.setPage = function(pageNo) {
alert(pageNo);
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };


/*-----End pagination here-------------*/

/*------Start---delete data from database------------*/
$scope.deletes=function(id)
{
		
			$http.post('crud.php?action=deletes',{
			
				'id':id

			})
        	
			.success(function(data,status,header,config)
			{
				
			})	
}
/*------End---delete data from database------------*/

/*------Start---Edit data------------*/
$scope.edit=function(id)
{
		
			$http.post('crud.php?action=edit',{
			
				'id':id

			})
        	
			.success(function(data,status,header,config)
			{
				            $scope.namess        =   data[0]["name"];
						$scope.id        =   data[0]["id"];
			})	
}
/*------End---Edit data------------*/

/*------Start---Update data------------*/
$scope.update=function(id)
{
		
			$http.post('crud.php?action=update',{
			
				'id':$scope.id,
				'name':$scope.namess
			
				})
        	
			.success(function(data,status,header,config)
			{
				           
			})	
}
$scope.login=function()
{
		
			$http.post('crud.php?action=login',{
			
				'userName':$scope.userName,
				
			
				})
        	
			.success(function(data,status,header,config)
			{
				 $http(config).then(function(response) {
    					var data = response.data;
						
						if(data == "")
						{
							alert("bad");

						}
						else
						{
							$location.path('dashboard');
						}
					});
  				 
			})	
}


/*------End---Update data------------*/


});













