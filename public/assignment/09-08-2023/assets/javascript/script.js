var app = angular.module('app', [])

var arr = []
app.controller('ctrl', function ($scope, service) {

    $scope.arr = arr
    service.yes()

    $scope.create = function () {

        $scope.user = { name: $scope.name, email: $scope.email, password: $scope.password }
        $scope.arr.push($scope.user)
        console.log($scope.arr);

    }

    $scope.mara = true
    $scope.disabled = function () {
        $scope.mara = false
    }


    $scope.login = function () {

        $scope.arr.map((s) => {
            if (s.name === $scope.usname && s.password === $scope.uspassword) {
                console.log(s.name);

                // code of after login



                
            } else {
                $scope.alert = "wrong user name or password";
            }
            console.log(s.name);
        })


    }



})


app.service("service", function () {
    this.yes = function () {

        console.log(arr);

    }
})




