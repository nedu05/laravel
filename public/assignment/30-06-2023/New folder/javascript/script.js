let create=document.getElementById("create");
create.addEventListener("click",add);
function add(){  
  let name=document.querySelector("#name").value;
  let ask=document.querySelector("#ve").value;
  let pl=document.querySelector("#kh").value;  

  if(ask.trim() ==" "  || name.trim() =="" || pl.trim() =="" ){
    alert("values are  empty")
  }
  else{  
  let table =document.querySelector("#detail");
  let row = table.insertRow();
  let cell1 = row.insertCell(0);
  let cell2 = row.insertCell(1);
  let cell3 = row.insertCell(2);
  let cell4 = row.insertCell(3);
    cell1.innerHTML= name;
    cell2.innerHTML = ask;
    cell3.innerHTML =pl; 
    cell4.innerHTML =btn; 
  }
    document.getElementById("name").value ="";
    document.getElementById("ve").value= "";
    document.getElementById("kh").value = "";
}

// $(document).ready(function(){
//   $("#reset").click(function(){
//     $("p,td").css("color","red")
//     $("#delete").css({"background":"green","color":"white"})
//   });
// $("#create").click(function(){
//   $("td").css("color","blue")
// });

// });

// $(document).ready(function(){
//   $("p").click(function(){
//     $(this).hide();
//   });
// });


// count = 0;
// $(document).ready(function () {

//   $("#na").click(function () {
//     if (count == 0) {
//       $(this).css("background","green")
//       alert("now ok next time don't distrub me")
//       count = 1;
//     }
//     else if (count == 1) {
//       $(this).css("background","orange")
//       alert("you don' have a sence to understand ")
//       count = 2;
//     }
//     else {
//       $(this).css("background","red")
//       alert("you don't understand ,here after you have no choice to distrub me")
//       // count = 0;
//         }
//   });
// });


//   $("#na").click(function()  { 
//     alert("hi")});
//   $("#na").click(function()  { alert("bye")});
// });

