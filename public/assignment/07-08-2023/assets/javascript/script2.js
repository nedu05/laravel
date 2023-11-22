


// app.service("service",function($http){

//  var collectedData=null;

//     this.fetchData = function (callback) {
    //         if (collectedData !== null) {
//             callback(collectedData);
//         }          

        
//         else 
//             {
    //                 $http.get('./assets/students.json').then(function (response) {
        //                 collectedData = response.data.students;
//                 callback(collectedData);

//             });

//         }
//     };
    
// });


// app.controller("controller",function($scope,service){
    
// service.handleData=function(data){
    //     $scope.data=data;
    
    //     console.log($scope.data);
    // }

    // // $scope.abc=service.fetchData(handleData)
    
    // // console.log($scope.abc);
    
    // })
    
    

    var app = angular.module("app", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when( '/students',{
            templateUrl : "students.html",
            controller:'controller'
        })
    .when( '/viewstudent',{
            templateUrl : "viewstudent.html",
            controller:'viewstudent'
        })
    .when( '/login',{
            templateUrl : "login.html",
            // controller:'login'
        })

})


// service
    
app.service("yarnService", function ($http ) {

    var collectedData = null;


    this.changeof;
    this.fetchData = function (callback) {

        if (collectedData === null) {
            $http.get('./assets/students.json')
                .then(function (response) {
                    collectedData = response.data.students;
                    callback(collectedData);

                    
                })
                .catch(function () {
                    console.error('error has occured to fetching the json data ');
                    callback(null)
                });
        } else {
            callback(collectedData);
        }
    }
// this.gg=function(){
//    this.fetchData(function(data){
//         // $scope.data=data;
//         this.changeof=data        
//         console.log(this.changeof);
// })
// } 
// this.gg()
})




app.controller("controller",function($scope,yarnService){
    
        yarnService.fetchData(function(data){
                $scope.data=data;
                yarnService.changeof=$scope.data        
                console.log(yarnService.changeof);
    })
    
//     $scope.data=yarnService.arr
// console.log($scope.data);


$scope.add= function(){
        // if($scope.text == ''){
        //  alert()
        // }
            yarnService.changeof.push({name:$scope.text,m1:$scope.m1,m2:$scope.m2,m3:$scope.m3,m4:$scope.m4,m5:$scope.m5})
            console.log(yarnService.changeof);
    
            $scope.text=''
            $scope.m1=''
            $scope.m2=''
            $scope.m3=''
            $scope.m4=''
            $scope.m5=''
        }

    })
    





    app.controller("viewstudent",function($scope,yarnService){
        yarnService.fetchData(function(data){
            $scope.data=data;
        yarnService.arr=$scope.data
        
        console.log(yarnService.arr);


        
    })
    // $scope.value=value;

    // $scope.data=yarnService.changeof
    // console.log($scope.data);

$scope.alt=function(){
    alert()
}

// $scope.data=yarnService.arr
// console.log($scope.data);
})

// $scope.name=yarnService.name
// console.log($scope.name);


// this.fetchData(function(data){
//     $scope.data=data;
//     yarnService.changeof=$scope.data        
//     console.log(yarnService.changeof);
// })