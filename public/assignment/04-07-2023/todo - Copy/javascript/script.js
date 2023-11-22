// let a=[21,5457,21,21,21,21,21,54,54,4];
// let b=[]




// a.forEach((val)=>{
// b.push(val)
// })
// console.log(b);

// let abc=document.getElementsByTagName("input");
// console.log(abc.length);

// let a=document.querySelector(".a");
// a.style.color="red";
// let h1=document.querySelectorAll("h1");
// // console.log(h1);
// for( let i=0; i<h1.length; i++){
//     // console.log(h1[i]);
//   h1[i].addEventListener("click",function(){
//     alert("alert");
  
  
//   })
// }
// switch (a) {
//   case "h1":
//     alert("h1")
    
//     break;

//   default:
//     alert()
//     break;
// }

let body=document.querySelector("body");
let b=document.querySelector("button");

b.addEventListener("mouseenter",function(){
body.style.color="red";
});
b.addEventListener("mouseleave",function(){
  body.style.color="black";
  });
  

// function val(){
//   alert("hello")
// }