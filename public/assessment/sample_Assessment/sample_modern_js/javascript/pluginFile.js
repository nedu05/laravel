(function(pWindow) {
	if(typeof pWindow.CustomList == "function") {
		throw new Error("CustomList function already defined");
	}
	
	/*===================== creating default values =============*/
	var mainArray=[];

	let CustomList= function(pId, options) {

		if(!(this instanceof CustomList)) {
			return new CustomList(pId, options);
		}
		this.domEl = document.getElementById(pId);
		if(!this.domEl) {
			throw new Error("dom not found");
		}
		this.options=options||{};
		if(typeof this.options.data == "undefined") {
			this.options.data = [];
		}

		mainArray.push(options.data.students);
		cg=mainArray.flat()

		this.displayList(pId);
	};


	
	/*==================== creating new list ================*/
	// 
	CustomList.prototype.displayList = function(pId){
		var cg=mainArray.flat();
		
		min()


		function min(){
			cg.forEach((ss)=>{
				var dd=(`
				<div class="col">
				<div onclick="ed(${ss.id})" >
				<div class="card  " style="width: 13rem;"id="example3" >
           		<img src="${ss.img}" class="card-img-top rounded-circle " alt="..." >
  				<div class="card-body">
  				<h5 class="card-title">${ss.name}</h5>  
 				</div>
 				</div>
				</div>
				</div>
      
				`)
			  var cc=document.getElementById(pId);
				 $(cc).append(dd);
			
			});
		}

		

	}


	 pWindow.CustomList = CustomList;
	})(window)
	


	function ed(i){
	
	var v2=cg.find((a)=>a.id==i);
	$("#gname").val(v2.name);
    $("#sid").val(v2.id);
	$("#m1").val(v2.m1);
	$("#m2").val(v2.m2);
	$("#m3").val(v2.m3);
	$("#m4").val(v2.m4);
	$("#m5").val(v2.m5);
    $(".acs").prop("disabled",true);

	// check()
	if(v2.m1<35){
	   $("#m1").css({"background":" yellow","color":"red"})
	   }
	   else{
	$("#m1").css({"background":" white","color":"black"})
	   }
	if(v2.m3<35){
	   $("#m3").css({"background":" yellow","color":"red"})
	   }
	   else{
	$("#m3").css({"background":" white","color":"black"})
	   }
};


//  edit button //
 function edit(){
	$("#gname").removeAttr("disabled");
	$("#m1").removeAttr("disabled");
	$("#m2").removeAttr("disabled");
	$("#m3").removeAttr("disabled");
	$("#m4").removeAttr("disabled");
	$("#m5").removeAttr("disabled");
 }

// save button
 function save(){
var sd=$("#gname").attr("disabled");
if(sd){
	alert("No value is change")
}
else{
var cf=$("#gname").val(); 
var id=$("#sid").val()
var m1=$("#m1").val();
var m2=$("#m2").val();
var m3=$("#m3").val();
var m4=$("#m4").val();
var m5=$("#m5").val();

var data=cg.filter((ads)=>ads.id==id);
data.forEach((d)=>{
	d.name=cf;
	d.id=id;
	d.m1=m1;
	d.m2=m2;
	d.m3=m3;
	d.m4=m4;
	d.m5=m5;
	
	$("#gname").val('')
	$("#sid").val('')
	$("#m1").val('')
	$("#m2").val('')
	$("#m3").val('')
	$("#m4").val('')
	$("#m5").val('')
	
});
}
 }


// search 
function search(){
	$("#filteredValue").html("");
	var getval=$("#getval").val();
	console.log(getval);
	$("#left").html("");
	var show=cg.filter((a)=>a.name.toLowerCase()==getval.toLowerCase());

	var filteredValue=document.querySelector("#filteredValue");

	
        
	show.forEach((c)=>	

	filteredValue.innerHTML += (`
	<div onclick="ed(${c.id})">				
	<div class="card  " style="width: 12rem;">
	<img src="${c.img}" class="card-img-top rounded" alt="...">
	<div class="card-body">
	<h5 class="card-title text-center">${c.name}</h5>            
	</div>
	</div>
	
	`)
	);

	console.log(getval="");
	$("#getval").val('')

	
}



