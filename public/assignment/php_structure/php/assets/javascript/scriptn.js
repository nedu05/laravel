var app = angular.module("app", ['ngRoute'])

app.config(function ($routeProvider) {
	$routeProvider
		.when('/', {
			templateUrl: "pages/login.php",
			controller: 'login'
		})
		.when('/dashboard', {
			templateUrl: "pages/dashboard.php",
			controller: 'dashboard'
		})
})

app.service("datacontroller", function () {
	this.userinfo;
})


app.controller('login', function ($scope, $location, datacontroller) {

	$scope.loginForm = function () {
		if ($scope.login.$valid) {
			datacontroller.userinfo = $scope.usname;
			console.log($scope.usname);
			$location.path('/dashboard');

		}

	}
})

app.controller("dashboard", function ($scope, datacontroller) {

	$scope.mm = datacontroller.userinfo;
	console.log($scope.mm);
})