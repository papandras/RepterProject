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
    // function below will run clear.php?h=michael
    $.ajax({
        type: "GET",
        url: "php/download.php" ,
        success : function() { 

            // here is the code that will run on client side after running clear.php on server

            // function below reloads current page
            location.reload();
            alert("Adatok frissítve!");
        }
    });
}