var app = angular.module('myApp', []);
app.controller('ProductController', function($scope,$http) {
        let productCtrl = this;







productCtrl.upd=function(ev,$nn){

    productCtrl.qyt=ev.target.value;
  data={
    product_id:$nn,
    quantity:productCtrl.qyt

  }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/amazon/view/update",
        data : data,
        type : 'POST',
        dataType : 'json',
        success : function(result){
            productCtrl.change=result.map(e=>{



                return e.quantity * e.product_price;
            })

            console.log(productCtrl.change);

            var nn=productCtrl.change.reduce(function(total,num){


            return total+num
            })



          $('.nnj').text(nn)

        }
    });

}


        productCtrl.add=function($us_id,$prq,n){

            console.log($us_id,$prq,n);

                    }

        productCtrl.delete=function(ev,$pr_id){

           alert("sure want to delete");
            productCtrl.sucssmsg='';

            if($pr_id){

            $http({
                method: 'DELETE',
                url: '/amazon/view-cart/'+$pr_id+'/remove',
                data: {
                    " product_id":$pr_id,

                },

            })
            .then(function(response) {
                productCtrl.delmsg='';
                ev.target.parentNode.parentNode.parentNode.parentNode.style.display='none';
                productCtrl.sucssmsg=" product deleted sucessfully";
                $('.cart').text(response.data);
            }, function(rejection) {
                console.log(" error ");
            });


        }
        }


});
