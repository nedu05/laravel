let generator = document.querySelector("#generator");
let rec = document.querySelector("#rec");
let add1 = document.querySelector("#add1");
let add2 = document.querySelector("#add2");
let remove1 = document.querySelector("#remove1");
let remove2 = document.querySelector("#remove2");
let changevalue = document.querySelector(".getValue");
let listcon = document.querySelector("#get");
let red = document.querySelector("#red");
let green = document.querySelector("#green");
let blue = document.querySelector("#blue");
let copy = document.querySelector("#copy");
let show1 = document.querySelector("#show1");
let move = document.querySelector("#move");
let start2 = document.querySelector("#start2");
let item = document.querySelector("#item");
let start = document.querySelector("#start");
let end = document.querySelector("#end");

// colors generate
 
function colors() {
    red = Math.floor(Math.random() * 256);
    green = Math.floor(Math.random() * 256);
    blue = Math.floor(Math.random() * 256);

    let colorvalue = {
        red: red,
        green: green,
        blue: blue,
        rgb: "rgb(" + red + ", " + green + ", " + blue + ")",

    }
    return colorvalue;
}

var arr = [];
//  generator button
generator.addEventListener("click", function () {
    arr.push(colors());
    let abc = colors().rgb;
    rec.style.background = abc;


});


// add1
let i = 0;
add1.addEventListener("click", function () {
    let list = document.createElement('li')
    list.innerHTML = ("red:" + arr[i].red + " green:" + arr[i].green + " blue:" + arr[i].blue);
    listcon.prepend(list);
    i++;

});

//  add button 2

add2.addEventListener("click", function () {
    let list = document.createElement('li')
    list.innerHTML = ("red:" + arr[i].red + " green:" + arr[i].green + " blue:" + arr[i].blue);
    listcon.append(list);
    i++;
});


//  remove button 1

remove1.addEventListener("click", function () {
    listcon.removeChild(listcon.firstElementChild);
});


//  remove button 2

remove2.addEventListener("click", function () {
    listcon.removeChild(listcon.lastElementChild);
});

// red sort
red.addEventListener("click", function () {
    arr.sort(function (a, b) {
        return a.red - b.red;
    })
    listcon.innerHTML = '';
    for (let a of arr) {
        let list = document.createElement('li')
        list.innerHTML = ("red:" + a.red + " green:" + a.green + " blue:" + a.blue);
        listcon.append(list);
    }
});

// green sort

green.addEventListener("click", function () {
    arr.sort(function (a, b) {
        return a.green - b.green;
    })
    listcon.innerHTML = '';
    for (let a of arr) {
        let list = document.createElement('li')
        list.innerHTML = ("red:" + a.red + " green:" + a.green + " blue:" + a.blue);
        listcon.append(list);
    }
});

//    blue sort

blue.addEventListener("click", function () {
    arr.sort(function (a, b) {
        return a.blue - b.blue;
    })
    listcon.innerHTML = '';
    for (let a of arr) {
        let list = document.createElement('li')
        list.innerHTML = ("red:" + a.red + " green:" + a.green + " blue:" + a.blue);
        listcon.append(list);
    }
});


// copy list
copy.addEventListener("click", function () {
  let arr3 = arr.slice(start.value, end.value);
    for (let a2 of arr3) {
        let list = document.createElement('li')
        list.innerHTML = ("red:" + a2.red + " green:" + a2.green + " blue:" + a2.blue);
        show1.append(list);
    }

});

// move list

move.addEventListener("click", function () {
    let arr4 = arr.splice(start2.value, item.value)
    listcon.innerHTML = '';
    for (let a3 of arr) {
        let list = document.createElement('li');
        list.innerHTML =  "red:" + a3.red + " green:" + a3.green + " blue:" + a3.blue;
        listcon.append(list);
    }

    for (let a3 of arr4) {
        let list = document.createElement('li');        
        list.innerHTML = "red:" + a3.red + " green:" + a3.green + " blue:" + a3.blue;
        show1.append(list);

    }
});
