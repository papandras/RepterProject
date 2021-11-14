function start(){
    document.getElementById("dest").style.display = "none";
    document.getElementById("start").style.display = "";
}

function arrive(){
    document.getElementById("dest").style.display = "";
    document.getElementById("start").style.display = "none";
}

var autoLoad = setInterval(
function()
{
    $("#load").load("./parts/footer.php").fadeIn("Slow");
},10000)

function refresh(){
    // function below will run download.php?h=michael
    $.ajax({
        type: "GET",
        url: "php/download.php" ,
        success : function() { 

            // here is the code that will run on client side after running download.php on server

            // function below reloads current page
            alert("Adatok frissítve!");
            location.reload();
            
        }
    });
}

let counter = 0;
function zoom(){
    let zoom = document.getElementById("zoom").style;
    ++counter;
    if(counter % 2 == 0)
    {
        zoom.width = "";
        zoom.position = "relative";
        zoom.margin = "";
        zoom.left = "";
        zoom.right = "";
        zoom.top = "";
        zoom.border = "";
        zoom.backgroundColor = "";
        document.getElementById("load").style.position = "";
        document.getElementById("load").style.bottom = "";
        document.getElementById("full").src ="./img/fullscreen.png";
    }
    else if (counter % 2 == 1)
    {
        zoom.zIndex = 999;
        zoom.width = "110%";
        zoom.position = "absolute";
        zoom.display = "block";
        zoom.margin = "auto";
        zoom.left = "-200px";
        zoom.right = "-200px";
        zoom.top = "300px";
        zoom.border = "2px solid darkblue";
        zoom.backgroundColor = "lightblue";
        document.getElementById("load").style.position = "fixed";
        document.getElementById("load").style.bottom = "0px";
        document.getElementById("full").src ="./img/befele.png";
    }

}