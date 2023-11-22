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

		mainArray.push(options.data.ProductCollection);
		
		collectedValue=mainArray.flat()

		this.displayList();
	};


	
	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function(){
	};
	 pWindow.CustomList = CustomList;
	})(window);




	function show(i){
		var create=document.querySelector("#create");
//  var bb;

		// var b=document.createElement("div")
		// b.classList.add("container5")
		// $(b).attr("id","bat")
		var c=(`<div class="col">
		<div class="w-25" >
		<div>
		<input type="text" class="mt-2 w-75" placeholder="search products"oninput="search()" id="searchProduct">  
		</div> 
		<div> <br>  
		<label class="ms-2 mt-2 h4 ">Welcome <span>${i} </span></label>    
		<div>
		</div><div class="col container5 " id="bat"> `)

	
		collectedValue.forEach((a)=>{		
			c+=(`
			    
			<table >    
			<tbody >
			  <tr>
				<td> <input type="checkbox" onclick="as(${a.ProductId})"></td>
				<td><img src="${a.ProductPicUrl}" alt="images" class="ms-4 "></td>
				<td>${a.Name}</td>			  
				</tr>
			</tbody>		
		  </table>		 
		 
     
	`)


    // b.innerHTML +=data;
	// create.append(b);
	});
	
	c +=(`
	</div><div class="d-flex justify-content-center">
	<button class="btn btn-danger me-3 " onclick="cart()">ok</button>
	<button class="btn btn-success" onclick="cancel()">cancel</button>
	</div></div>`)
	$(create).append(c);
	}


//  =========search user list==============  //
function showUser(){
	
	var getval=$("#getval").val();

if(getval.trim()==""){
	alert("enter the user name")
}
else{
	$("span").html(getval)
	show(getval)
   $("#getval").val('');
}
   
	};


	// ==================================ok button===========//

function cart(){
	
	var cart=document.querySelector("#cart");
	arr.forEach((o)=>{
	var k=(`
	            <tr>				
				<td><img src="${o.ProductPicUrl}" alt="images" class="ms-4 "></td>
				<td>${o.Name}</td>			  
				</tr>`)	
	cart.innerHTML +=k
})
$(".new").css("display","block");
};


// ==================================check box===========//
	var arr=[];

	function as(i){
	var t=collectedValue.find((d)=>d.ProductId==i)
	arr.push(t)	
	
	}
	
// ===================cancel button=====================//
	function cancel(){
		$(".new").hide()
	}


//=================Search=============================//


	
function search(){

	

	$("#bat").html("")
	var searchProduct=$("#searchProduct").val().toLowerCase()
	console.log(searchProduct);

	let cc=collectedValue.filter((f)=>{
	return	f.Name.toLowerCase().includes(searchProduct)
		
	})



		
		
		cc.forEach((a)=>{		
			var data=(`
			    
			<table >    
			<tbody >
			  <tr>
				<td> <input type="checkbox" onclick="as(${a.ProductId})"></td>
				<td><img src="${a.ProductPicUrl}" alt="images" class="ms-4 "></td>
				<td>${a.Name}</td>			  
				</tr>
			</tbody>		
		  </table>		 
		
     
	`)


   $("#bat").append(data);
	});
	searchProduct.val("")
	
}