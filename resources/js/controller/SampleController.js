var app = angular.module('myApp', []);
app.controller('HomeController', function($scope,$http) {
        let homeCtrl = this;


        homeCtrl.delete=function(ev,$data){


alert("Sure wants to delete")

            $http({
                method: 'DELETE',
                url: '/amazon/admin/' + $data+'/delete',
                data: {
                   " del": $data
                },

            })
            .then(function(response) {

                ev.target.parentNode.parentNode.style.display='none';
                homeCtrl.del=" product deleted sucessfully";

            }, function(rejection) {
                console.log($data);
            });

        }



        homeCtrl.disapprove=function(ev,$data){
            $http({
                method: 'put',
                url: '/amazon/admin/' + $data+'/disapprove',
                data: {
                   " approve": $data
                },

            })
            .then(function(response) {

                console.log(response.data);
                var nn=response.data;
                if(nn == 1){
                    ev.target.style.background="red";
                    ev.target.innerHTML="Disapprove";
                }else{
                    ev.target.style.background="blue";
                    ev.target.innerHTML="Approve" ;
                }



            }, function(rejection) {
                console.log($data);
            });
        }



    });
