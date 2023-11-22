let d=0;
let c=0;
let gameover=false

p1.addEventListener("click", function(){
    d++;
    p1score.textContent=d;
})


p2.addEventListener("click", function(){
    c++;
    p2score.textContent=c;
})


p3.addEventListener("click",function(){
    p1score.textContent=0;
    p2score.textContent=0;
     d=0;
     c=0;
})

debugger;

