
//=============== route configuration ==================== //
var app = angular.module("app", ['ngRoute'])
app.config(function ($routeProvider) {
	$routeProvider
		.when('/', {
			templateUrl: "login2.html",
			controller: 'firstPage'
		})
		.when('/secondpage', {
			templateUrl: "secondpage.html",
			controller: 'secondpage'
		})
		.when('/payment', {
			templateUrl: "payment.html",
			controller: 'payment'
		})
})

//=============== service ==================== //
app.service("dataSharing", function () {
	this.index;
	this.userdata = [{ id: 1, name: 'red', email: "abc@qwe.2", password: 1230, balance: 50000 },
	{ id: 2, name: 'blue', email: "abc@qwe.2", password: 1236, balance: 50000 },
	{ id: 3, name: 'green', email: "abc@qwe.2", password: 1230, balance: 50000 }];

	this.signupData = [{ id: 1, movie: 'themes', time: "12.00 Pm", avaiable: 2, cost: 200 },
	{ id: 2, movie: 'datas', time: "1.00 pm", avaiable: 4, cost: 300 },
	{ id: 3, movie: 'texasdark', time: " 9.00 pm", avaiable: 6, cost: 250 }];

	this.bevarage = [{ id: 1, item: "coke", rate: 50, price: 0 },
	{ id: 2, item: "cake", rate: 150, price: 0 },
	{ id: 3, item: "chocolate", rate: 200, price: 0 },
	{ id: 4, item: "water bottle", rate: 20, price: 0 },
	{ id: 5, item: "pop corn", rate: 120, price: 0 }];
	this.id = 1;
	this.usrname;
})

// ============= first page controller =================== //
app.controller("firstPage", function ($scope, $location, dataSharing) {
	
	// ======= signup form ======= //
	$scope.submitForm = function () {
		$scope.message = ''
		$scope.cache = dataSharing.bevarage;
		for (i = 0; i < $scope.cache.length; i++) {
			$scope.cache[i].price = 0;
		}

		if ($scope.signup.$valid) {
			dataSharing.userdata.push({ id: dataSharing.id++, name: $scope.username, email: $scope.email, password: $scope.password })
			dataSharing.usrname = $scope.username;
			$location.path('/secondpage')
		}

		$scope.username = '';
		$scope.email = '';
		$scope.password = '';

		$scope.signup.$setPristine();
		$scope.signup.$setUntouched();
	}

	// ======= login form ======= //
	$scope.loginForm = function () {
		$scope.message = ''
		if ($scope.login.$valid) {
			$scope.uii = dataSharing.userdata;
			$scope.uii.forEach((ds, i) => {
				if (ds.name == $scope.usname && ds.password == $scope.uspassword) {

					dataSharing.index = i;
					dataSharing.usrname = $scope.usname;
					$location.path('/secondpage')

					$scope.cache = dataSharing.bevarage;
					for (i = 0; i < $scope.cache.length; i++) {
						$scope.cache[i].price = 0;
					}
				}else {
					$scope.message = 'invalid credentials'
				}
			})
		}
	}
})

// ============= second page controller ======================= //
app.controller("secondpage", function ($scope, dataSharing, $location) {
		$scope.user = dataSharing.usrname;
		$scope.trnd = false;
		$scope.movies = function () {
		$scope.trnd = true;
		$scope.cookie = false;
		$scope.movie = dataSharing.signupData;
	    };

		$scope.cookie = false;
		$scope.snacks = function () {
		$scope.cookie = true;
		$scope.trnd = false;
		$scope.tickets = false;
		$scope.bevarage = dataSharing.bevarage;
	    }

		$scope.tickets = false;
		$scope.texas = function (a) {
		$scope.tickets = true;
		$scope.cost = a.cost;
		$scope.movive = a.movie;
		$scope.avaiableTicket = a.avaiable;
		$scope.userInput = $scope.amt;

		$scope.throwmsg = ''
		$scope.hga = false;
		$scope.hree = function (a) {
			
			console.log(a);
			console.log($scope.avaiableTicket);
			if (a > $scope.avaiableTicket ) {
				$scope.throwmsg = "reached the maximun number of tickets"
				$scope.hga = true;

			}else {
				$scope.throwmsg = ''
				$scope.hga = false;
			}
		}
	}

	$scope.total = function () {
		$scope.snackamt = '';
		$scope.cache = dataSharing.bevarage;
		var cc = 0
		var dd = 0;
		for (i = 0; i < $scope.cache.length; i++) {
			cc = $scope.cache[i].price * $scope.cache[i].rate;
			dd = dd + cc
		}
		$scope.snackamt = dd;
	}
		$scope.select = function () {
		$scope.movie = dataSharing.signupData;
		$scope.trnd = true;
		$scope.tickets = true;
		$scope.cookie = false;
	}
		$scope.pay = function () {
		$location.path('/payment')
	}
})

// ============= payment page controller ======================= //
app.controller("payment", function ($location, $timeout) {
	$timeout(function () {
		$location.path('/')
	},1500)
})