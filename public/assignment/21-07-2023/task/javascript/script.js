var studentData=[  
   {id:1,name:'arun',gender:'Male', physics:88,maths:87,english:78},
   {id:2,name:'rajesh',gender:'Male', physics:96,maths:100,english:95},
   {id:3,name:'moorthy',gender:'Male', physics:89,maths:90,english:70},
   {id:4,name:'raja',gender:'Male',physics:30,maths:25,english:40 },
   {id:5,name:'usha',gender:'Female',physics:67, maths:45, english:78 },
   {id:6,name:'priya',gender:'Female',physics:56,maths:46,english:78 },
   {id:7,name:'Sundar',gender:'Male',physics:12,maths:67,english:67},
   {id:8,name:'Kavitha',gender:'Female',physics:78,maths:71,english:67 },
   {id:9,name:'Arun',gender:'Male',physics:56,maths:45,english:67 },
   {id:10,name:'Hema',gender:'Female',physics:71,maths:90,english:23},
   {id:11,name:'Gowri',gender:'Female',physics:100,maths:100,english:100},
   {id:12,name:'Jenifer',gender:'Female',physics:67,maths:88,english:90}
 ];
 
min()

 function min(){ 
 var old=document.querySelector("#old");
  studentData.forEach((data)=>{ 

 var detail=(`<div class="card text-center mb-3" style="width: 15rem;" id="example2" >
     <div class="card-body" >
     <h6 class="card-title">Student Name: ${data.name.toUpperCase()}</h6>
     <p class="card-text">Gender:${data.gender}</p>
     <p class="card-text">Physics:${data.physics}</p>
     <p class="card-text">Maths:${data.maths}</p>
     <p class="card-text">English:${data.english}</p>
     <button class="btn btn-info " onclick="add(${data.id})">edit</button>
     </div>
     </div>`) 
    old.innerHTML += detail;    
 });  
}
var form=document.querySelector("#form"); 

 function add(i){ 
 var v2=studentData.filter((val1)=>val1.id==i);
 
 form.innerHTML=(`<div class="row g-3 m-3 rounded border border-3 w-50 text-center">
 <div >
   <label>Student Name</label>
   <input type="search" class="w-25" value=${v2[0].name} id="gname"  >
 </div>
 <div >
   <label>Gender</label>
   <input type="search" class="w-25 ms-5" value=${v2[0].gender} id="gen" >   
 </div>
 <div >
 <label>Physics </label>
   <input type="number" class="w-25 ms-5" value=${v2[0].physics} max="100"  min="0"  id="phy">
 </div>
 <div >
 <label class="me-2">Maths </label>
   <input type="number" class="w-25 ms-5" value=${v2[0].maths} max="100"   min="0"   id="mat" >
 </div>
 <div >
 <label >English</label>
   <input type="number" class="w-25 ms-5" value=${v2[0].english} max="100" min="0"  id="eng">
 </div>
 
 <div class="text-center">
   <button class="btn btn-success my-2 " onclick="ch(${v2[0].id})">update</button>
 </div>
 </div>
 `); 
 };
 
 // search box 
 var show=document.querySelector("#show"); 
   var srch=document.querySelector("#srch");
   srch.onclick=()=>{

     var getval=document.querySelector("#getval").value.toUpperCase().trim() ;
    console.log(getval);
     if(getval === ""){

$("h5").css({"display":"block", "color": "red"})
     }
   else{
    $("h5").css("display","none")
    form.innerHTML=""
    show.innerHTML="";
    old.innerHTML="";
    dstore.innerHTML="";
   var searchedval= studentData.filter((dat)=>dat.name.toUpperCase().includes(getval));

    searchedval.forEach((sf)=>{
    show.innerHTML += (`<div class="card text-center mb-3" style="width: 15rem;">
    <div class="card-body">
      <h6 class="card-title">Student Name: ${sf.name.toUpperCase()}</h6>
      <p class="card-text">Gender:${sf.gender}</p>
      <p class="card-text">Physics:${sf.physics}</p>
      <p class="card-text">Maths:${sf.maths}</p>
      <p class="card-text">English:${sf.english}</p>
      <button class="btn btn-info " onclick="add(${sf.id})" >edit</button>
    </div>
  </div>`)  
});

}
}; 

// Add user
var dstore=document.querySelector("#dstore");
$("#addUser").click(()=>{
 var bb= (`<div class="row g-3 m-3 rounded border border-3 w-50 text-center">
 <div >
   <label>Student Name</label>
   <input type="search" class="w-25"  id="nname"  >
 </div>
 <div >
   <label>Gender</label>
   <input type="search" class="w-25 ms-5"  id="ngen" >   
 </div>
 <div >
 <label>Physics </label>
   <input type="number" class="w-25 ms-5" max="100"  min="0"  id="nphy">
 </div>
 <div >
 <label class="me-2">Maths </label>
   <input type="number" class="w-25 ms-5"  max="100"   min="0"   id="nmat" >
 </div>
 <div >
 <label >English</label>
   <input type="number" class="w-25 ms-5"  max="100" min="0"  id="neng">
 </div>
 
 <div class="text-center m-2">
 <button class="btn btn-success "  onclick="auser()">New stuent</button>

 </div>
 </div>
 `) 
 
 dstore.innerHTML=bb;  
});

function auser(){
  var hname=$("#nname").val();
  var gen=$("#ngen").val();
  var phy=$("#nphy").val();
  var mat=$("#nmat").val();
  var eng=$("#neng").val();

  if (hname===""){
    alert("enter the values to update")
  }
  else{
    var ssd =studentData.length;
   ssd++  
  studentData.push({id:ssd,name:hname,gender:gen,physics:phy,maths:mat,english:eng});

var detail=(`<div class="card text-center mb-3" style="width: 15rem; " id="example2">
     <div class="card-body">
     <h6 class="card-title">Student Name: ${hname.toUpperCase()}</h6>
     <p class="card-text">Gender:${gen}</p>
     <p class="card-text">Physics:${phy}</p>
     <p class="card-text">Maths:${mat}</p>
     <p class="card-text">English:${eng}</p>
     <button class="btn btn-info " onclick="add(${ssd})">edit</button>
     </div>
     </div>`) 
    old.innerHTML += detail; 
    dstore.innerHTML=" ";
  }
};
function ch(i){
  var gname=$("#gname").val();
  var gen=$("#gen").val();
  var phy=$("#phy").val();
  var mat=$("#mat").val();
  var eng=$("#eng").val();
  var aas=studentData.filter((jj)=>jj.id==i);
aas.forEach((ev)=>{
show.innerHTML="";
ev.name=gname;
ev.gender=gen;
ev.physics=Number(phy);
ev.maths=Number(mat);
ev.english=Number(eng);
old.innerHTML="";
min()
});
form.innerHTML="";
};