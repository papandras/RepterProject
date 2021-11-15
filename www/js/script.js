function start() {
    document.getElementById("dest").style.display = "none";
    document.getElementById("start").style.display = "";
}

function arrive() {
    document.getElementById("dest").style.display = "";
    document.getElementById("start").style.display = "none";
}

var autoLoad = setInterval(
    function() {
        $("#load").load("./parts/footer.php").fadeIn("Slow");
    }, 10000)

function refresh() {
    $.ajax({
        type: "GET",
        url: "php/download.php",
        success: function() {
            document.getElementById("success-alert").style.display = "block";
            setTimeout(function() { document.getElementById("success-alert").style.display = "none"; }, 5000);
        }
    });
}

let counter = 0;

function zoom() {
    ++counter;
    if (counter % 2 == 0) {
        document.getElementById("full").src = "./img/fullscreen.png";
        document.getElementById("zoom").classList.remove("zoomclass");
    } else if (counter % 2 == 1) {

        document.getElementById("full").src = "./img/befele.png";
        document.getElementById("zoom").classList.add("zoomclass");
    }
}