var app = angular.module('myApp', []);
app.controller('CartController', function($scope,$http) {
        let cartCtrl = this;
        cartCtrl.Addcart=function($prod_id,$us_id){

            $http({
                method: 'post',
                url: '/amazon/add-to-cart/'+$us_id,
                data: {
                    "count":1,
                   "product_id": $prod_id,
                   "user_id":$us_id
                },

            }).then(function(response) {



                cartCtrl.success= "product added cart sucessfully";



                $('.cart').text(response.data);
            }, function(rejection) {
                console.log("error");
            });





        }
});
