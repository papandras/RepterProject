function start(){
    document.getElementById("dest").style.display = "none";
    document.getElementById("start").style.display = "";
}

function arrive(){
    document.getElementById("dest").style.display = "";
    document.getElementById("start").style.display = "none";
}

var x = "<?php require('parts/footer.php') ?>";
var autoLoad = setInterval(
function()
{
    console.log(1);
    $("#load").load("./parts/footer.php").fadeIn("Slow");
},10000)