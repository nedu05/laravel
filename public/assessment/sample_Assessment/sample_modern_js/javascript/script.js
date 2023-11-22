// var xhrHttp=new XMLHttpRequest();
//    xhrHttp.onreadystatechange = function(){
//    if(this.readyState==4){
//       if(this.status==200){
//          var data=JSON.parse(this.responseText);
//          		OnLoaded(data);
//          		/* search(data); */
//          		 }
//      		   }	
//          }
//     xhrHttp.open('GET','assets/students.json',true);
// 		xhrHttp.send();

// /*---------------onload func--------------*/
// var OnLoaded = function(data) {
//     sample = CustomList('grid', {data : data});
// };
// /*=========== search func============*/

// /* var search =function(event){
//   sample._filter(event);
// }; */

				fetch("./javascript/students.json")
        .then((s)=>s.json())
        .then((msg)=>OnLoaded(msg))
        .catch((error)=>console.log(error))

        var OnLoaded = function(data) {
              sample = CustomList('left', {data : data});
          };

     