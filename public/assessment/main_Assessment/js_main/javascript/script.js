var plus=document.querySelector("#plus");
var head=document.querySelector("#head");
var search=document.getElementById("search");
var searchbar=document.getElementById("searchbar");
var erase=document.getElementById("erase");
var show=document.getElementById("show");
var reset=document.getElementById('reset');
var erase2=document.getElementById('erase2');

reset.onclick=()=>{
 location.reload();
}
 
erase2.onclick=()=>{
  // taggle.value.remove();
}

plus.onclick=()=>{
  head.classList.toggle("head");
};

search.onclick=()=>{
searchbar.classList.toggle("searchbar");

};

erase.onclick=()=>{
  setval.value="";
  setdate.value="";
  };
  
// let dem=document.querySelector("#dom")
// dem.addEventListener("click",function(){
//   alert()
// })


// collecting values
  let array = [];

  var input3=`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" onclick="deleteRow()" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>`;

var input4=`<span onclick="alert()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill"  viewBox="0 0 16 16">
<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></span>`

var create=document.querySelector("#create");
create.addEventListener("click",add)

function add() {
  const input1 = document.getElementById('setval').value;
  const input2 = document.getElementById('setdate').value;
 
  if(input1.trim() ==" "  || input2.trim() ==""){
    alert("print value")
      }



  // Add values to the array
else{
  array.push([input1, input2,input3,input4]);

  // Clear input fields
  document.getElementById('setval').value = '';
  document.getElementById('setdate').value = '';

   const x = new Date();
   const y = new Date(input2);
if (x > y){
    var table2=document.getElementById("table2");
    let row = table2.insertRow();
     let cell1 = row.insertCell(0);
     let cell2 = row.insertCell(1);
   
       cell1.innerHTML= input1;
       cell2.innerHTML = input2;
}
//  table view
displayTable();
}
}

taggle.addEventListener("keypress",function(){
    displayTable()
});



// total table view

function displayTable(filterValue) {
  var filterValue = document.getElementById('taggle').value.toLowerCase();
  const tableBody = document.getElementById('table');
  tableBody.innerHTML = '';

  for (let i = 0; i < array.length; i++) {
    const value1 = array[i][0].toLowerCase();
    const value2 = array[i][1].toLowerCase();

    if (value1.includes(filterValue) || value2.includes(filterValue) || !filterValue) {
      const row = document.createElement('tr');
      const cell1 = document.createElement('td');
      const cell2 = document.createElement('td');
      const cell3 = document.createElement('td');
      const cell4 = document.createElement('td');

      cell1.textContent = array[i][0];
      cell2.textContent = array[i][1];
      cell3.innerHTML = array[i][2];
      cell4.innerHTML = array[i][3];

      row.appendChild(cell1);
      row.appendChild(cell2);
      row.appendChild(cell3);
      row.appendChild(cell4);
      tableBody.appendChild(row);

      // Add click event listener to the row
      let v3=document.getElementById('v3');
      row.addEventListener('click', function() {
        moveRowToAnotherTable(row);
        v3.innerHTML="hello";
      });
    }
  }
}

function moveRowToAnotherTable(row) {
  const movedTableBody = document.getElementById('completed');

  // Clone the row to move
  const clonedRow = row.cloneNode(true);

  // Remove the row from the original table
//   var ten= function deen(){
//     row.parentNode.removeChild(row);
//    }
// 

  // Append the cloned row to the moved table
  movedTableBody.appendChild(clonedRow);

}
 









