// let a=[21,54];
// var b=a.reduce(add,0)
// console.log(b);

// function add(aa,bb){
// return aa+bb;
// }


$("input").on(" keyup ",(event)=>{
  // debugger
  // var inp=$(event.target).val()
  var inp=$(event.target).val()
  if(inp.trim()!=="" && Number(inp) > 0 ){

    $("p").text(inp);
  }

  console.log(inp);
});

//  if(inp.trim()!=="" && Number(inp) > 0 ){

// $("p").text(inp)
// }

// $("li").click(()=>$(this).hide())

// var c=new Set();
// // c.add([14,8,5,8,25])
// c.add(5)
// c.add(8)
// c.add(9)
// c.add(5)
// console.log(c);

// $("ul").click(function(){
//   $("li").hide()
// })

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

// let body=document.querySelector("body");
// let b=document.querySelector("button");

// b.addEventListener("mouseenter",function(){
// body.style.color="red";
// });
// b.addEventListener("mouseleave",function(){
//   body.style.color="black";
//   });


// function val(){
//   alert("hello")
// }


// $("input").on({keyup:function(){
// var inp=$("input").val();
// if(inp!==""||inp!==0){
//   console.log(inp*155);

// }
// },
// click:function(){

//   var inp=$("input").val();
//   if(inp!==""||inp!==0){
//     console.log(inp*155);

//   }
//   // console.log(inp*155);
// }
// })




// function add(id){
//   this.id=id;
// }
// function gen(){
//   return Math.random()*55;

// }
// function admin(gen){
// gen.admin=true;
// return gen;
// }
// const total=new add(gen())
// console.log(admin(total));
// var person = [{name:"John", age:31, city:"New York"}];

// // console.log(person);
// var abc=JSON.parse(person);
// var cde=JSON.stringify(abc);
// console.log(abc);


// function abc(num){
// return num.reduce((sum,item)=>{
//   return sum+item;
// },0);
// };
// console.log(abc([1]));

// function avc(a){
//   return a.reduce(function(sum ,item){
//  return sum+item;
//   },0)
// }





// function av(...abc) {
//   var abc=(44,455,547);

//   abc.reduce(function(bv,ac){
//  bv+ac
// //  return abc;
//   },0)
//   // return abc;
// }
// console.log(av());
// var f=[1,11,12];
// const [...fl]=f;
// console.log(fl[0]);

let item = [

  { id: 1, tittle: "cd drive", image: `"./images/cd_drive.jpg"`, price: 2000 },
  { id: 2, tittle: "cpu", image: `"./images/cpu.jpg"`, price: 600 },
  { id: 3, tittle: "laptop", image: "./images/laptop.jpg", price: 5000 },
  { id: 4, tittle: "pendrive", image: `"./images/pendrive.jpg"`, price: 1000 },
  { id: 5, tittle: "ssd", image: "./images/ssd.jpg", price: 2000 },
  { id: 6, tittle: "watch", image: "./images/watch.jpg", price: 4000 },
  { id: 7, tittle: "smartphone", image: "./images/mobile.jpg", price: 10000 },
  { id: 8, tittle: "computer", image: "./images/computer.jpg", price: 30000 },
  { id: 9, tittle: "cd drive", image: "./images/tab.jpg", price: 10000 },
  { id: 10, tittle: "mouse", image: "./images/mouse.jpg", price: 300 },
  { id: 11, tittle: "keyboard", image: "./images/keyboard.jpg", price: 600 },
  { id: 12, tittle: "headphone", image: `"./images/headphone.jpg"`, price: 800 }

];

// function add(){
//   var d=document.querySelector("input");
//   d.addEventListener("keypress",add)

//   console.log(d);
// }


var d = document.querySelector("input");
var g = document.getElementById('dd')
// var cs=document.getElementById("dd")
d.addEventListener("change", mult);


function mult() {
  g.innerText="";
  var empty = []
  
  var v = d.value.toLowerCase();
  // var c= item.filter(function(a){  
  var txt = new RegExp(`^${v}`, 'm');
  let patern = txt;

  item.forEach((s) => {

    if (s.tittle.match(patern)) {

      empty.push(s)
      console.log(empty);
      
      console.log(s);
      
    }
    
  })
  ;
  
  empty.forEach((text) => {

  g.append(`${text.id} the title ${text.tittle}`)
  
  
})

  //  });
  
  //  console.log(c);
  // document.querySelector("p").innerHTML=c;
};


// console.log(add());


// console.log(d);
//  console.log(d);
// console.log(item.price);
// var it=item.includes(item.price);
// console.log(it);



// var file={
//   a:"string",
//   b:255
// }
// function alpha(files){
//   return `the file name is ${files.a}`
// }

// var cd=alpha(file);
// console.log(cd);

var dec=[
  {
  name:"str",
  val:12,
  value:12
},
  {
  name:"str",
  val:12,
  value:12
},
  {
  name:"str",
  val:12,
  value:12
},
];
const [nedu,...rest]=dec;
console.log(nedu);