//   custom  services  

var app = angular.module('appServices', []);

app.service('angularServices', function () {

this.squareofnumber = function (x) {

return x * x;

}

});

app.controller("angularController", function ($scope, angularServices) {

$scope.getresult = angularServices.squareofnumber(10);

});




// factory syntax

var app = angular.module('appFactory', []);

app.factory('myFactory', function () {

var displayFact;

var addMSG = function (msg) {

displayFact = ' Hi Guest, Welcome to ' + msg;

}

return {

setMSG: function (msg) {

addMSG(msg);

},

getMSG: function () {

return displayFact;

}

};

});

 

app.controller("factoryCtrl", function ($scope, myFactory) {

//Inject to factory and controller both.

myFactory.setMSG("Tutlane.com");

//Prepare a collection

$scope.myCollections = [

myFactory.getMSG(),

];

});

// check box valadiation syntax

var app = angular.module('checkboxApp', []);
app.controller('checkboxCtrl', function ($scope) {
$scope.validationmsg = false;
$scope.checkvalidation = function () {
var chkselct = $scope.chkselct;
if (chkselct == false || chkselct == undefined)
$scope.validationmsg = true;
else
$scope.validationmsg = false;
}
});

// email vaildation


// <html>
// <head>
// <title>
// AngularJs ng-pattern Email Validation Example
// </title>
// <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
// <script type="text/javascript">
// var app = angular.module('ngpatternApp', []);
// app.controller('ngpatternCtrl', function ($scope) {
// $scope.sendForm = function () {
// $scope.msg = "Form Validated";
// };
// });
// </script>
// </head>
// <body>
// <div ng-app="ngpatternApp" ng-controller="ngpatternCtrl">
// <h3>AngularJs ng-pattern Email Validation Example</h3>
// <form name="personForm" novalidate ng-submit="personForm.$valid &&sendForm()">
// Email:<input type="text" name="email" ng-model="txtmail" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required />
// <span style="color:Red" ng-show="personForm.email.$error.required"> Required! </span>
// <span style="color:Red" ng-show="personForm.email.$dirty&&personForm.email.$error.pattern">Please Enter Valid Email</span>
// <br /><br />
// <button type="submit">Submit Form</button><br /><br />
// <span>{{msg}}</span>
// </form>
// </div>
// </body>
// </html>



// own service

var app = angular.module('myApp', []);
app.service('ap', function() {
    this.myFunc = function (x) {
        return x.toString(16);
    }
});
app.controller('myCtrl', function($scope, ap) {
  $scope.hex = ap.myFunc(255);
});