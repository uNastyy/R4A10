function getXhr(){
    var xhr = null;
    if(window.XMLHttpRequest) // Firefox et autres
        xhr = new XMLHttpRequest();
    else if(window.ActiveXObject){ // Internet Explorer
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else { // XMLHttpRequest non supporté par le navigateur
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest");
        xhr = false;
    }
    return xhr;
}

function go($pseudo, $phrase){ {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "enregistrer.php?pseudo="+$pseudo+"&phrase="+$phrase, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var response = xhr.responseText;
        }
    };
    xhr.send();
}