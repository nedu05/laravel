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
		.when('/dashboard', {
			templateUrl: "dashboard.html",
			controller: 'dashboard'

		})
		.when('/final', {
			templateUrl: "final.html",
			controller: 'final'


		})
		
})

//=============== service ==================== //
app.service("dataSharing", function () {
	this.index;
	this.signupData = [{ id: 1, name: 'red',balance:500000, acc: 96851236 ,upi:1,friendsArray:[]},
	{ id: 2, name: 'name', acc: 78453621,balance:500000,upi:9856,friendsArray:[]},
	{ id: 3, name: 'newuser', acc: 96543621,balance:500000,upi:9656,friendsArray:[]}];
	this.id = 1;
	this.usrname;
	

})

// signup controller
app.controller("signup", function ($scope, dataSharing, $location,$route) {


	$scope.upi = $scope.nn;
	
	$scope.submitForm = function () {
		$scope.message = "user register successfully"

		if ($scope.signup.$valid) {
			dataSharing.signupData.push({ id: dataSharing.id++, name: $scope.username, email: $scope.email,balance:500000, acc: $scope.acc,upi:Number($scope.nn),friendsArray:[]});
			$route.reload()
			$location.path('/login')

		}
		$scope.username = '';
		$scope.email = '';
		$scope.acc = '';
		$scope.nn=''

		$scope.signup.$setPristine();
		$scope.signup.$setUntouched();


	}
	
	function generatePassword() {
		var length = 6,
			charset = "0123456789",
			retVal = "";
		for (var i = 0, n = charset.length; i < length; ++i) {
			retVal += charset.charAt(Math.floor(Math.random() * n));
		}
		return retVal;
	}

	$scope.nn=generatePassword()
})


// login controller

app.controller("login", function ($scope, dataSharing,$location) {
	$scope.message = ''
	$scope.loginForm = function () {
		if ($scope.login.$valid) {

			$scope.uii = dataSharing.signupData;
			$scope.uii.forEach((ds,i) => {
				
				if(ds.name==$scope.usname  && ds.upi==$scope.upi){
					dataSharing.index = i;
					
					
				dataSharing.usrname = $scope.usname;

					$location.path('/dashboard')
					
				}				
				 else {
					$scope.message = 'invalid credentials'
				}
			})
		}
	}
})



// dashboard controller

app.controller("dashboard",function($scope, dataSharing ,$location,$timeout){
		$scope.vv = dataSharing.usrname;


	
$scope.show=false;
	$scope.hd=function(){
		$scope.show =!$scope.show;
		$scope.gather=dataSharing.signupData;
		$scope.data=$scope.gather.filter((s)=>{
			if((s.name != $scope.vv)){				
				return s;
			}
		
		})
		
	
	}


	$scope.guys=function(a){
	
    dataSharing.signupData[dataSharing.index].friendsArray.push(a);
	$scope.frnds=dataSharing.signupData[dataSharing.index].friendsArray;
	

	}

	$scope.trans=function(y){
		$scope.usid=y.id;
		$scope.transname=y.name;
		$scope.transacc=y.acc;
				
	}


	$scope.aa=false;
	$scope.click=function(){
		$scope.frnds=dataSharing.signupData[dataSharing.index].friendsArray
		$scope.aa = !$scope.aa
	}

	$scope.money=function(a){
		$scope.amount;

	
		$scope.lkg=dataSharing.signupData

		$scope.amt=$scope.lkg.find((fd)=>{
			if(fd.id== a){
				
				return fd;	
			}


		})

		$scope.ll=$scope.amt.balance+$scope.amount

		$scope.hh=dataSharing.signupData
		$scope.hh.forEach((fs)=>{
			if(fs.id== a){	
				fs.balance=$scope.ll;		
			}

		})


		$location.path('/final')
	
	

	}

// $scope.transname=null;
// $scope.transacc=null;
// $scope.amount=0;
// $scope.money=function(a){
// 	if($scope.transname && $scope.transacc && $scope.amount >0){
// 		if($scope.transname.balance >= $scope.amount){
// 			console.log(a);
// 			console.log($scope.transname.balance);
// 			$scope.transacc.balance -= $scope.amount
// 			$scope.transname.balance += $scope.amount
// 			$scope.amount=0;
// 			$scope.transname=null;
// 			$scope.transacc=null;
// 		}else{
// 			console.log("Insuffient amt");
// 		}
// 	}else{
// 		console.log("please select the amount");
// 	}
// }


	$scope.load=function(){
		$location.path('/login')
	}



})

app.controller("final",function($location,$timeout){
	$timeout(function(){
		$location.path('/dashboard')
	},2000)
})




// amout transaction

// $scope.selectsender=null;
// $scope.selectreciver=null;
// $scope.amountToSend=0;
// $scope.performtransaction=function(){
// 	if($scope.selectsender && $scope.selectreciver && $scope.amountToSend >0){
// 		if($scope.selectsender.balance >= $scope.amountToSend){
// 			$scope.selectsender.balance -= $scope.amountToSend
// 			$scope.selectsender.balance += $scope.amountToSend
// 			$scope.amountToSend=0;
// 			$scope.selectsender=null;
// 			$scope.selectreciver=null;
// 		}else{
// 			console.log("Insuffient amt");
// 		}
// 	}else{
// 		console.log("please select the amount");
// 	}
// }