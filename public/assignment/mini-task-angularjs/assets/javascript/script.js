var app = angular.module("app", ['ngRoute'])
app.config(function ($routeProvider) {
	$routeProvider
		.when('/', {
			templateUrl: "signup.html",
			controller: 'signup'
		})
		.when('/login', {
			templateUrl: "login.html",
			controller: 'login'

		})
		.when('/main', {
			templateUrl: "main.html",
			controller: 'main'

		})
		.when('/dashboard', {
			templateUrl: "dashboard.html",
			controller: 'dashboard'

		})
		.when('/overview', {
			templateUrl: "overview.html",
			controller: 'overview'

		})

})

//=============== service ==================== //
app.service("dataSharing", function () {
	this.index;
	this.signupData = [{ id: 12, name: 'red', password: 123, color: ['rgb(184,230,21)', 'rgb(19,127,241)', 'rgb(163,129,171)', 'rgb(252,1,66)'] },
	{ id: 13, name: 'red', password: 124, color: [] }];
	this.guestuser = { id: 13, name: 'guest', password: 124, color: [] };
	this.id = 1;
	this.usrname;

})


app.controller("signup", function ($scope, dataSharing, $location) {

	$scope.submitForm = function () {
		$scope.message = "user register successfully"

		if ($scope.signup.$valid) {
			dataSharing.signupData.push({ id: dataSharing.id++, name: $scope.username, email: $scope.email, password: $scope.password, colors: [] });

			console.log(dataSharing.signupData);
			$location.path('/login')

		}
		$scope.username = '';
		$scope.email = '';
		$scope.password = '';

		$scope.signup.$setPristine();
		$scope.signup.$setUntouched();


	}

	$scope.guest = function () {
		dataSharing.usrname = dataSharing.guestuser.name;
		$location.path('/main')
		console.log(dataSharing.guestuser);
		// dataSharing.signupData=false;

	}


})


app.controller("login", function ($scope, dataSharing, $location) {
	$scope.message = ''
	$scope.loginForm = function () {
		if ($scope.login.$valid) {

			$scope.uii = dataSharing.signupData;
			$scope.uii.forEach((ds, i) => {
				if (ds.name == $scope.usname && ds.password == $scope.uspassword) {

					dataSharing.index = i;
					dataSharing.usrname = $scope.usname;
					$location.path('/main')

				} else {
					$scope.message = 'invalid credentials'
				}
			})
		}
	}
})


app.controller("main", function ($scope, dataSharing) {

	$scope.vv = dataSharing.usrname;






	$scope.addColors = function () {

		var red = (Math.floor(Math.random() * 255));
		var green = (Math.floor(Math.random() * 255));
		var blue = (Math.floor(Math.random() * 255));
		var ncolor = 'rgb' + ('(' + red + ',' + green + ',' + blue + ')');




		if (dataSharing.signupData[dataSharing.index].color.length < 4) {
			$scope.ncolor = ncolor;
			dataSharing.signupData[dataSharing.index].color.push(ncolor);
		} else {
			$scope.message = " reached maximum color filled "
		}

		// console.log(dataSharing.guestuser[0].color.push(ncolor));

	}

	$scope.show = false;
	$scope.preview = function () {
		$scope.het = dataSharing.signupData[dataSharing.index].color
		$scope.show = !$scope.show;

		// $scope.tr=dataSharing.guestuser.color


		// console.log($scope.het );
		// console.log($scope.tr);
	}
})



//====Admin page login ====//
app.controller("dashboard", function ($scope, $location) {
	$scope.error = '';
	$scope.loginForm = function () {
		if ($scope.usname == 'admin' && $scope.uspassword == 'admin') {
			$location.path('/overview')
		} else {
			$scope.error = 'invalid credentials'
		}
	}
})

app.controller("overview", function ($scope, dataSharing) {
	$scope.hh = dataSharing.signupData


})