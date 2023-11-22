




// // var inp=document.querySelector("input");
// document.querySelector("button").onclick=()=>{
// var inp=document.querySelector("input").value;
// console.log(inp*250);
// }
// console.log(inp);

// url=""
// fetch("https://api-thirukkural.vercel.app/api?num=1")
// .then((dd)=>dd.json())
// .then((msg)=>console.log(msg.line1,msg.line2))
// .catch(()=>console.log("warning"))


// var item=[
  
  //   {
    //     "id": "3fa85f64-5717-4562-b3fc-2c963f66afa6",
    //     "name": "string",
    //     "incantation": "string",
    //     "effect": "string",
//     "canBeVerbal": true,
//     "type": "None",
//     "light": "None",
//     "creator": "string"
//   },
//   {
  //     "id": "3fa85f64-5717-4562-b3fc-2c963f66afa6",
  //     "name": "string",
  //     "incantation": "string",
  //     "effect": "string",
  //     "canBeVerbal": true,
  //     "type": "None",
  //     "light": "None",
  //     "creator": "string"
  //   },
  
  
  // ]

// // item.filter((a)=>console.log(a.id))


// item.forEach(add.push("d"));

// function add(val){
  //   console.log(val);
  // }
  
  
  // const abc=JSON.parse(item);
  // const def=JSON.stringify(abc)
  // console.log(abc);
  // const [{name,id}]=item;
  // console.log(name,id);
  
  // class user{
    //   constructor(name,id){
      //   this.name=name;
//   this.id=id;
//   }
//   login(){
  //     console.log(`hello ${this.name} your id is ${this.id}`);
  //   }
  //   logout(){
    //     console.log(`hello ${this.name} your id is ${this.id}`);
    //   }
    
    // }
    
    // var user1=new user(`nedu `,25)
    // var user2=new user(`jjs `,55)
    
    // // console.log(user1);
    // user1.login()
// user2.login()
// // user1.logout()




function add(){
  document.querySelector("#p1,h1 ,h2").remove();
}

add()

// var all=
// all.onclick=()=>{
//   alert("jj")

// }
// all.addEventListener("click",function(){
// alert("hello")
// })

// var input = [
  
//   { id: 1, tittle: "cd drive", image: `"./images/cd_drive.jpg"`, price: 2000 },
//   { id: 2, tittle: "cpu", image: `"./images/cpu.jpg"`, price: 600 },
//   { id: 3, tittle: "laptop", image: "./images/laptop.jpg", price: 5000 },
//   { id: 4, tittle: "pendrive", image: `"./images/pendrive.jpg"`, price: 1000 },
//   { id: 5, tittle: "ssd", image: "./images/ssd.jpg", price: 2000 },
//   { id: 6, tittle: "watch", image: "./images/watch.jpg", price: 4000 },
//   { id: 7, tittle: "smartphone", image: "./images/mobile.jpg", price: 10000 },
//   { id: 8, tittle: "computer", image: "./images/computer.jpg", price: 30000 },
//   { id: 9, tittle: "cd drive", image: "./images/tab.jpg", price: 10000 },
//   { id: 10, tittle: "mouse", image: "./images/mouse.jpg", price: 300 },
//   { id: 11, tittle: "keyboard", image: "./images/keyboard.jpg", price: 600 },
//   { id: 12, tittle: "headphone", image: `"./images/headphone.jpg"`, price: 800 },
//   { id: 12, tittle: "headphone", image: `"./images/headphone.jpg"`, price: 1200 }

// ];
// // arr.find((c)=>{
// //  var d= c.price;
// //  console.log(d);
// // });

var dd=document.querySelector("p")
var collectedValue = document.querySelector("input");
var btn = document.querySelector("button");
btn.onclick = () => {

  input.filter((display) => {


var show = document.querySelector("ul");
let ss = document.createElement("li");
if (display.tittle === collectedValue.value) {
ss.innerHTML = `You searched product price is ${display.price} `;
// show.innerHTML=""
show.append(ss);
    }
    else {
      dd.innerHTML="The searched product not found"
      console.log("The searched product not found");
      // dd.innerHTML="";
    }
  });
  collectedValue.value = "";
};

ss.remove();
ss.remove();
document.querySelectorAll

document.querySelectorAll(`"#p1","h1","h3"`).remove()
d.onclick=()=>{
  alert()
}