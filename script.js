function start(){
    document.getElementById("dest").style.display = "none";
    document.getElementById("start").style.display = "";
    document.body.style.backgroundClip = red;
}

function arrive(){
    document.getElementById("dest").style.display = "";
    document.getElementById("start").style.display = "none";
    document.getElementById("startt").style.backgroundColor = "";
}
let counter = 0;
function show(){
    
    ++counter;
    if(counter%2==1){
        document.getElementById("show").style.display = "";
    }
    else {
        document.getElementById("show").style.display = "none";
    }
}