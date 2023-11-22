// cross 
$("table").on("click","td",function(){
    $(this).toggleClass("list");
});

// delete
$("table").on("click","span", function(){
    $(this).parents("tr").remove();
});

//  input 
$("input[type='text']").keypress(function(event){
    if(event.which===13){      
      let todoText=  $(this).val();

      if( todoText.trim() == "" ){
        alert("Enter any value!!");
      }
      else{
        $(this).val("");      
        $("table").append("<tr><td><span class='text-danger float-end'></span>"
        +" "+ todoText +"</td></tr>")
      }     
    }     
});

//  Plus 
$(".fa-plus").click(function(){
$("input").toggle()
});


 // hover
$( "td" ).hover(
  function() {
    $(this).children().addClass( "fa fa-trash-can" );
  }, function() {
    $(this).children().removeClass( " fa fa-trash-can" );
  }
);


// let abc=[
//   {id:4 , name:"name" , val:54},
//   {id:2 , name:"hsgfdgd0" , val:54},
//   {id:14 , name:"hsgfdgd0" , val:54},
//   {id:45 , name:"hsgfdgd0" , val:54}
// ]

// console.log(abc.val);

let abc=[5,4,4,4,564,5,54,54];
let b=[];
b.push(abc);
console.log(b);
console.log(b[0][2]);

















  //  $(".fa-trash-can").hover(function(){
  //   $(this).toggleClass("can");
  // });

    
  // $(".fa-trash-can").mouseleave(function(){
  //   $(this).hide();
  // });
// $(".btn").click(function(){
//   setInterval(bgbox,100)
// })
// function bgbox() {
//   var x = Math.floor(Math.random() * 256);
//   var y = Math.floor(Math.random() * 256);
//   var z = Math.floor(Math.random() * 256);
  
//   // return("rgb(" + x + "," + y + "," + z + ")");
//   $("body").css("background", "rgb(" + x + "," + y + "," + z + ")")
//   }
  // let arr=["sdfas","abv","ehfe"];
// let b=[];
// b.push(arr);

// console.log(b.reverse());

// $("table").on("click","i",function(){
//   $(".fa-trash-can ").fadeIn()
//   });

