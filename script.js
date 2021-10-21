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

        var mywindow = window.open("", "", "height: 400px; width: 400px; margin: auto; background-color: white; color: black;");
        mywindow.document.write("<p>Maps</p>");
    }
    else {
        document.getElementById("show").style.display = "none";
        mywindow.close();
    }
}