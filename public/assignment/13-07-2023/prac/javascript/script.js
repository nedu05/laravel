// object function


let arr=[];
let h=document.querySelector('#fname');
let v=document.querySelector('#vname');
let button=document.querySelector('button');

// i=0;
button.addEventListener("click",function(){
    // arr.push(objCreation());
    // for(i=0 ; i<arr.length ; i++){
    //   console.log(arr[i]);
    //  }
    console.log(objCreation());
    arr.push(objCreation());
  //  i++;
})

function objCreation(){
    let obj={};
    obj['fname']=h.value;
    obj['lname']=v.value;
 
  return obj
  
}
// console.log(arr);

$("#print").click(function(){
 
})
 
