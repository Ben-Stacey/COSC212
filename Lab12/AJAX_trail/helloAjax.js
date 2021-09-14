function doAjax() {
    $("#helloResult").load("ajaxResponse.html");
}
function setup() {
    $("#helloButton").click(doAjax);
}
$(document).ready(setup);

/**
var xmlHttp;
function createXmlHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest(); } else {
        alert("Could not create the XML-HTTP Request object");
    }
}

function handleStateChange() {
    if (xmlHttp.readyState === 4) {
        if (xmlHttp.status === 200) {
            document.getElementById("helloResult").innerHTML = xmlHttp.responseText;
        }
    }
}

function doAjax() {
    createXmlHttpRequest();
    xmlHttp.onreadystatechange = handleStateChange;
    xmlHttp.open("GET", "ajaxResponse.html", true);
    xmlHttp.send(null);
}

 function setup() {
    document.getElementById("helloButton").onclick = doAjax;
}

 if (window.addEventListener) {
     window.addEventListener('load', setup);
} else if (window.addEventListener) {
     window.attachEvent('onload', setup);
} else {
    alert("Could not attach 'setup' to the 'window.onload' event");
}

 */