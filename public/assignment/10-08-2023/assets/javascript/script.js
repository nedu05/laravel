var app=angular.module("app",['ngRoute','ngResource'])
app.config(function($routeProvider){
    $routeProvider
    .when("/", {
        templateUrl : "signup.html",
        controller : "ctrl"
  
       
    })
    .when("/login", {
        templateUrl : "login.html",
        controller : "ctrl2"
  
       
    })
    .when("/product", {
        templateUrl : "product.html",
        controller : "ctrl3"
  
       
    })
   


})

var arr = []
app.controller("ctrl",function($scope,service){
service.name=$scope.usname
    
    $scope.arr = arr
    // service.yes()

    $scope.create = function () {

        alert("acc created successfully")

        $scope.user = { name: $scope.name, email: $scope.email, password: $scope.password }
        $scope.arr.push($scope.user)
        console.log($scope.arr);

    }

    $scope.mara = true
    $scope.disabled = function () {
        $scope.mara = false
    }


    // $scope.login = function () {

    //     $scope.arr.map((s) => {
    //         if (s.name === $scope.usname && s.password === $scope.uspassword) {
    //             console.log(s.name);

    //             // code of after login



                
    //         } else {
    //             $scope.alert = "wrong user name or password";
    //         }
    //         console.log(s.name);
    //     })


    // }




})

app.controller("ctrl2",function($scope){
    $scope.arr = arr

    console.log($scope.arr);

    $scope.login = function () {

        $scope.arr.map((s) => {
            if (s.name === $scope.usname && s.password === $scope.uspassword) {
                console.log(s.name);
                console.log($scope.usname);

                // code of after login
                if (s.name !== $scope.usname && s.password !== $scope.uspassword) {
                    // console.log(s.name);
    
                    // code of after login
    
                    $scope.alert = "wrong user name or password";
    
                    
                }


                
            }
            //  else {
            //     $scope.alert = "wrong user name or password";
            // }
            // console.log(s.name);
        })


    }


})





app.service("service",function($http){

     this.name;
    this.selectedData=[];


    var collectedData = null;

this.cool;

    this.fetchData = function (callback) {


        if (collectedData === null) {
            $http.get('./assets/products.json')
            .then(function (response){
                collectedData = response.data.ProductCollection;
                callback(collectedData);

            })
            .catch(function () {
                console.error('error has occured to fetching the json data ');
                callback(null)
            });

        }
        
        else {
            callback(collectedData);
        }
    }




     
})



app.controller("ctrl3",function($scope,service){

    service.fetchData(function(data){
        $scope.data=data;  
        service.cool=$scope.data        
        
        
    })

    

 
        $scope.alk=function(id){
  
          $scope.data.forEach(element => {
            if( id == element.ProductId){
                service.selectedData.push(element)

            }
        });     
        
  
        
        
        
    }
    
    $scope.has=service.selectedData;
    
    })