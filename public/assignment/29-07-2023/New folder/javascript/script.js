// var app=angular.module('app',[]);
// app.controller('ctrl',function($scope){
//    $scope.e=[]
//    $scope.add=function (){
//     console.log($scope.d);
//     $scope.e.push($scope.d)
//     console.log($scope.e);
//    }

// // console.log($scope);
// console.log($scope.name);



    
// });
// angular.module("app",[]).controller("controller",($scope,$log, $location)=>{

//   $scope.name=''
//   $scope.character=5;
  // $scope.send=function(name,age,number){
  //   alert(name,age,number)
  // }
// })


// 

//   $scope.url = $location.absUrl();
//   $scope.name=name;
// $log.log(name[0].name);
//   $scope.dd=0;



  // $log.$log(name)
//   $scope.inclike=function(tech){
// tech.like++
  // }

  // $scope.a=function (){

  //   console.log( $scope.text);
  // }

// var app=angular.module("app",[]).controller("controller",function($scope){
//   var name=
// [
//   {name:'Jani',country:'Norway'},
//   {name:'Hege',country:'Sweden'},
//   {name:'Kai',country:'Denmark'}];


//   $scope.name=name


//   var collectdata= new XMLHttpRequest();
// collectdata.onreadystatechange =function(){
//   $scope.$apply (function(){
//     if(collectdata.readyState == 4 && collectdata.status == 200){
//       $scope.name=JSON.parse(collectdata.responseText);
//     }
//   });
// }
// collectdata.open('GET',"./javascript/students.json",true);
// collectdata.send();

// $http("./javascript/students.json")
// .then((msg)=>msg.json())
// .then((ass)=>{
//   $scope.var=ass.students
//   console.log($scope.var);
// })
// // .then((ass)=>add(ass.students))
// .catch((err)=>console.log(err)) 



// $scope.$apply(()=>)

// function add(ass){
  
//   // console.log($scope.ass);
  
//   // var ss=ass.forEach((a)=>console.log(a.name))
//   $scope.var=ass

  
  
  
//   // console.log($scope.ass);

// }


// });


var app = angular.module('app', []);
app.controller('controller', function($scope, $http) {


  $http({method : "GET", url : "./javascript/students.json"})
  .then(function mySuccess(response) {
      $scope.data = response.data.students;

    },function myError(response) {
      $scope.myWelcome = response.statusText;

  });

//   $scope.name=null;
//   $scope.age=null;

//   $scope.post = function(name,age){
//   // creating obj
// var data=
// {
//   name:name,
//   age:age
// }

// $http.post("./javascript/students.json",JSON.stringify(data))
// .then(function(res){
// console.log(res);
// })

// $http({
//   withCredentials: false,
//   method: 'post',
//   url: './javascript/students.json',
//   // headers: {'Content-Type': 'application/x-www-form-urlencoded'},
//   data: data
// });
// $http({
//   method: 'POST',
//   // url: './javascript/students.json',
//   data: {'message': 'Hello world'}
//   });

//   }


 
});