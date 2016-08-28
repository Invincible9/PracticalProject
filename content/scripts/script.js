
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("user").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("user").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "UserController.php?username=" + str, true);
        xmlhttp.send();
    }
}