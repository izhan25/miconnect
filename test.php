<?php 

include './actions/middleware/app.php';

?>

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="myctrl"> 


</div>

<script>
var app = angular.module('myApp', []);

app.controller('myctrl', function($scope, $http) {
  var username = 'izhan';
  var password = 'pass';

  $http({
			url: 'http://localhost/MiConnect/resTest.php',
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
			data: 'username=izhanq'+'&password='+password
		}).then(function(response) {
			console.log(response.data);
		})

});
</script>

</body>
</html>