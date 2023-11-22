// input values
var ad;
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


const myJSON = JSON.stringify(item);
localStorage.setItem("testJSON", myJSON);

// Retrieving data:
let text = localStorage.getItem("testJSON");
let obj = JSON.parse(text);



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

            $("#create").append(product)
    
});



function addcart(aaa){
console.log(aaa);
    
 ad=item.filter((total)=>{
         console.log(total.id===aaa);
       return total.id==aaa
   })
}
 //  Go cart 
var arr=arr;
var moveCart=[];
function addcart(val){
    item.filter(function(arr){
        if(arr.id == val){
            $( "input" ).keypress(function(){
                var value = $( this ).val();
                console.log((value*arr.price));
            })            
            moveCart.push(arr);
        }})};

// // display cart
function cart(){
    for(i=0; i<moveCart.length ; i++){

        $("#clean").append(products()) 
        function products(){
         return   (`<div class="col-sm-2 " id="de">            
            <div class="card p-2"  style="width: 13rem; ">
            <img src=${moveCart[i].image} class="card-img-top" alt="..." >             
            <h6 class="ms-2">${moveCart[i].tittle} <span class="ms-5" >
            <button class="btn btn-danger btn-sm" onclick="del()">del</button></span> </h6>
            <p class="ms-2 ">${moveCart[i].price} </p>
            <input type="number">
            </div>  
            </div> `)  
           }}};

// // delete 
function del(r){
$("#de").remove()};

// // back button
$("#back").click(function(){
    $('#clean').hide();    
    $("#create").show();
    $("#cart").show();
    $(this).remove();
    $("#pay").remove();
});

// // cart button
$("#cart").click(function(){
  cart();
  $("#create").hide();
  $(this).hide();
  $(".btn2").addClass("btn1")  
});

$("#transaction").hide();
$("#balance").hide();

// // pay button
$("#pay").click(function(){
    $('#clean').hide();    
    $("#create").hide();
    $("#cart").hide();
    $(this).remove();
    $("#back").remove();
    $("#transaction").show();
    $("#balance").show();
    $("#balAmt").text('10000');
});