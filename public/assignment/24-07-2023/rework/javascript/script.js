// input values

let item=[

{ id: 1,tittle:"cd drive", image:`"./images/cd_drive.jpg"`,price:2000},
{ id: 2,tittle:"cpu", image:`"./images/cpu.jpg"`,price:600},
{ id: 3,tittle:"laptop", image:"./images/laptop.jpg",price:5000},
{ id: 4,tittle:"pendrive", image:`"./images/pendrive.jpg"`,price:1000},
{ id: 5,tittle:"ssd", image:"./images/ssd.jpg",price:2000},
{ id: 6,tittle:"watch", image:"./images/watch.jpg",price:4000},
{ id: 7,tittle:"smartphone", image:"./images/mobile.jpg",price:10000},
{ id: 8,tittle:"computer", image:"./images/computer.jpg",price:30000},
{ id: 9,tittle:"cd drive", image:"./images/tab.jpg",price:10000},
{ id: 10,tittle:"mouse", image:"./images/mouse.jpg",price:300},
{ id: 11,tittle:"keyboard", image:"./images/keyboard.jpg",price:600},
{ id: 12,tittle:"headphone", image:`"./images/headphone.jpg"`,price:800}

];



var at=item.forEach(function(val){
    

    var product=(`<div class="col-sm-2 "id="deb">
            <div class="card p-2" style="width: 13rem;">
            <img src=${val.image} class="card-img-top" alt="...">
            <h6 class="ms-2">${val.tittle}</h6>
            <p class="ms-2" >${val.price}</p>
            <div  id="quantity"> <input type="number" ></div>
            <button class="btn btn-info mt-2 " onclick=addcart(${val.id})>Add to cart</button>
            </div>      
            </div>`);

            $("#create").append(product);    
        
});
console.log(item);

var mt=[]
function addcart(a){
  
    $("#cart").click(()=>{
        var ad=item.find((total)=> total.id==a);
        mt.push(ad)
        var product=(`<div class="col-sm-2 "id="deb">
        <div class="card p-2" style="width: 13rem;">
        <img src=${ad.image} class="card-img-top" alt="...">
        <h6 class="ms-2">${ad.tittle}</h6>
        <p class="ms-2" >${ad.price}</p>
        <div  id="quantity"> <input type="number" ></div>
        <button class="btn btn-danger m-2 " onclick="del()" > delete</button>
        
        </div>      
        </div>`);
        $("#clean").append(product);
        
        console.log(mt);
        $("#create").html("");
        $("#cart").hide();
        $("pay ").show();
    })

    };
   
function del(){
   $(this).parent(".div").hide()
   alert()
}
    

$("#adp").click(()=>{
    var bb= (`<div class="row g-3 m-3 rounded border border-3 w-50 text-center">
    <div class="mb-3">
  <label for="formFile" class="">image</label>
  <input class="" type="file" id="formFile">
</div>
    <div >
      <label>product name</label>
      <input type="search" class="w-25 ms-5"  id="ngen" >   
    </div>
    <div >
    <label>Price</label>
      <input type="number" class="w-25 ms-5" max="100"  min="0"  id="nphy">
    </div>
    <button class="btn btn-success "  onclick="auser()">New stuent</button>
    </div>
    `) 

    $("#create").append(bb);    
})



















 
// console.log(b);
// item.forEach(function(a,i){
//     $("input").click(function(){
//         $(this).val();
//         console.log($(this).val());
        
//     })
//     $("p").text("helo")
//     console.log($(this).val());
//     // console.log(a.price);
// })

//             console.log(val.id);


//  console.log(item.price);
//  var f= item.filter(function(val){
//     // console.log(val);

//     return val.id!==1;
    
// });

// console.log(f);




// // Display the values
// for(let i=0; i<item.length;i++){
//     $("#clean").append(addproduct());
//     function addproduct(){
//         return (`<div class="col-sm-2 "id="deb">
//         <div class="card p-2" style="width: 13rem;">
//         <img src=${item[i].image} class="card-img-top" alt="...">
//         <h6 class="ms-2">${item[i].tittle}</h6>
//         <p class="ms-2" >${item[i].price}</p>
//         <div  id="quantity"> <input type="number"   value="0"></div>
//         <button class="btn btn-info mt-2 " onclick=addcart(${item[i].id})>Add to cart</button>
//         </div>      
//         </div> `)
//     }};

 
//             //  Go cart 
// var arr=arr;
// var moveCart=[];
// function addcart(val){
//     item.filter(function(arr){
//         if(arr.id == val){
//             $( "input" ).keypress(function(){
//                 var value = $( this ).val();
//                 console.log((value*arr.price));
//             })            
//             moveCart.push(arr);
//         }})};

// // display cart
// function cart(){
//     for(i=0; i<moveCart.length ; i++){
//         $("#create").append(products()) 
//         function products(){
//          return   (`<div class="col-sm-2 " id="de">            
//             <div class="card p-2"  style="width: 13rem; ">
//             <img src=${moveCart[i].image} class="card-img-top" alt="..." >             
//             <h6 class="ms-2">${moveCart[i].tittle} <span class="ms-5" >
//             <button class="btn btn-danger btn-sm" onclick="del()">del</button></span> </h6>
//             <p class="ms-2 ">${moveCart[i].price} </p>
//             <input type="number">
//             </div>  
//             </div>  `)  
//            }}};

// // delete 
// function del(r){
// $("#de").remove()};

// // back button
// $("#back").click(function(){
//     $('#clean').show();    
//     $("#create").hide();
//     $("#cart").show();
//     $(this).remove();
//     $("#pay").remove();
// });

// // cart button
// $("#cart").click(function(){
//   cart();
//   $("#clean").hide();
//   $(this).hide();
//   $(".btn2").addClass("btn1")  
// });

// $("#transaction").hide();
// $("#balance").hide();

// // pay button
// $("#pay").click(function(){
//     $('#clean').hide();    
//     $("#create").hide();
//     $("#cart").hide();
//     $(this).remove();
//     $("#back").remove();
//     $("#transaction").show();
//     $("#balance").show();
//     $("#balAmt").text('10000');
// });




//  var totalbal= 10000;


// for(i=0;i<arr.length;i++){
//                 var item=arr[i];
//                 arr +=item.price*item.quantity;
               
//             }

//          $("#quantity").click(function(){
//             //    $(this).val()
//                console.log($(this).val());
//             })
            
//             function ad(){
                
//               var x = $("#quantity").val();

     
//              .trigger( "keypress" );
                
             
             
//               console.log(x);
//              x.this
//              console.log(x);
             
//             }  
          
            
//             on( "keyup", function() {
//                 var value = $( this ).val();
//                 if(event.which===13){
//             console.log((value*arr.price));
            
//                 }
//               $('p',this).text(value*arr.price); 
//              } )
//              $("button").click(function(){
//                 trigger( "keyup" );
//              })
             


           
//            console.log(arr.getval);
//         console.log(myFunction());
       



// $(document).ready(function() {
//   // Set dynamic product values
//   var products = [
//     {
//       name: "Product 1",
//       price: 9.99
//     },
//     {
//       name: "Product 2",
//       price: 14.99
//     },
//     {
//       name: "Product 3",
//       price: 19.99
//     }
//   ];

//   // Display product details on the HTML page
//   $(".product").each(function(index) {
//     var product = products[index];
//     $(this).find(".product-name").text(product.name);
//     $(this).find(".product-price").text("Price: $" + product.price.toFixed(2));
//   });

//   // Initialize or retrieve cart items from local storage
//   var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

//   // Handle add to cart button click
//   $("#add-to-cart").click(function() {
//     $(".product").each(function(index) {
//       var quantity = parseInt($(this).find(".quantity").val());

//       addToCart(products[index], quantity);
//     });
//   });

//   // Handle clear button click
//   $("#clear-cart").click(function() {
//     clearCart();
//   });

//   // Function to add items to the cart
//   function addToCart(item, quantity) {
//     var cartItem = {
//       name: item.name,
//       price: item.price,
//       quantity: quantity
//     };

//     cartItems.push(cartItem);
//     localStorage.setItem('cart', JSON.stringify(cartItems));
//     updateCartDetails();
//   }

//   // Function to clear the cart
//   function clearCart() {
//     cartItems = [];
//     localStorage.removeItem('cart');
//     updateCartDetails();
//   }

//   // Function to update cart details on the HTML page
//   function updateCartDetails() {
//     var cartItemsList = $("#cart-items");
//     cartItemsList.empty();

//     var cartItemsHTML = "";

//     for (var i = 0; i < cartItems.length; i++) {
//       var item = cartItems[i];
//       cartItemsHTML += "<li>" + item.name + " - $" + item.price.toFixed(2) + " x " + item.quantity + "</li>";
//     }

//     cartItemsList.html(cartItemsHTML);

//     var collectedValue = calculateCollectedValue();
//     $("#collected-value").text("Collected Value: $" + collectedValue.toFixed(2));
//   }

//   // Function to calculate the collected value
//   function calculateCollectedValue() {
//     var collectedValue = 0;
//     for (var i = 0; i < cartItems.length; i++) {
//       var item = cartItems[i];
//       collectedValue += item.price * item.quantity;
//     }
//     return collectedValue;
//   }

//   // Update cart details on page load
//   updateCartDetails();
// });

// let arr=[1,25,5,5]
// let s=[...arr]
// s[2]="abc";
// console.log(arr);
// console.log(s);
 
// let arr=[1,25,5,5];
// arr.forEach(function(val){
//     console.log(val);
// })
