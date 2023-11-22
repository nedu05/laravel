var app=angular.module("app",['ngRoute']);

app.config(function($routeProvider) {
    $routeProvider
    
    .when("/!", {
        templateUrl : "index.html",
        controller:"second"
       
    })
    .when("/main", {
        templateUrl : "main.html",
        controller:"main"
       
    })
    .when("/second", {
        templateUrl : "second.html",
        controller:"second"
       
    })
    .when("/third", {
        templateUrl : "third.html",
        controller:"thirdCtrl"
    })
});

//  ownservice.gg().then(function mySuccess(response) {
//       $scope.data = response.data.students;
//       console.log(  $scope.data);
//     },function myError(response) {
    //       $scope.myWelcome = response.statusText;
    
    //   });
    
    
    
    
    
    //=================== third controller  =====================///
    
    app.controller("thirdCtrl", function ($scope ,yarnService ) {      
        
        
        yarnService.fetchData(function(data){
            $scope.data=data;
            console.log($scope.data);
        })
        
        
    })
    
    //=================== second controller  =====================///

app.controller("second", function ($scope ,yarnService ) {      


yarnService.fetchData(function(data){
    $scope.data=data;
    console.log($scope.data);
})

})



app.controller("main",function($scope,yarnService){

    yarnService.fetchData(function(data){
        $scope.data=data;    
        console.log($scope.data);
    })

})
    
     //=================== second controller  =====================///

    // app.controller("second", function($scope,customService){

    //     customService.fetchData().then(function(response){
    //         $scope.data=response.data.students;
    //         console.log($scope.data);
            
    //         $scope.add=function (){
            
    //         // ========= re-assign the  values =========== //
            
    //                $scope.name=$scope.name;
    //                $scope.m1=$scope.m1;
    //                $scope.m2=$scope.m2;
    //                $scope.m3=$scope.m3;
    //                $scope.m4=$scope.m4;
    //                $scope.m5=$scope.m5;
    //             $scope.data.push({name:$scope.name,m1:$scope.m1,m2:$scope.m2,m3:$scope.m3,m4:$scope.m4,m5:$scope.m5})
    //             console.log($scope.data);
    //             // customService.name=$scope.data
    //            }
            
    //             })
    //     })




        // app.controller("thirdCtrl", function ($scope ,customService ) {      

        //     // customService.fetchData().then(function(response){
        //     //     $scope.data=response.data.students;
        //     //     console.log($scope.data);
        //     // })
           
        // $scope.data=customService.name
        // // console.log();
        // console.log($scope.data);
        //     });

//     creating custom services
// app.service("ownservice",function($http){
    
//     this.gg=function(){
//       return  $http({method : "GET", url : "./assets/students.json"})
//     }


// })




//  =====================new custom service==============================//


// app.service("customService",['$http',function($http){
//     this.name;
//     var foo='./assets/students.json';
//     this.fetchData=function(){
//         return $http.get(foo);
//     } 
// }])



//  =====================new custom  yarn service==============================//

app.service("yarnService",function($http){
 
    var collectedData = null;


    this.fetchData = function (callback) {


        if (collectedData === null) {
            $http.get('./assets/students.json')
            .then(function (response){
                collectedData = response.data.students;
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


// app.service("maxservice",function)