/* ** cartouche ********************************************************************* */
/* Script complet de gestion d'une requête de type XMLHttpRequest                     */
/* Par Sébastien de la Marck (aka Thunderseb)                                         */
/* ********************************************************************************** */

function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}

//
var xhr = getXMLHttpRequest();

var serverUndone = encodeURIComponent("");
var serverVar2 = encodeURIComponent("");




function request(callback) {
    var xhr = getXMLHttpRequest();

// 0 : L'objet XHR a été créé, mais pas encore initialisé (la méthode open n'a pas encore été appelée)
// 1 : L'objet XHR a été créé, mais pas encore envoyé (avec la méthode send )
// 2 : La méthode send vient d'être appelée
// 3 : Le serveur traite les informations et a commencé à renvoyer des données
// 4 : Le serveur a fini son travail, et toutes les données sont réceptionnées

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };


// on définie les modalités d'envoie avec la methode open
    xhr.open("POST" , "functions.php" , true);
// on est en POST donc nous somme containts de définir le tyê MIME de la requête
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// on défini les variables à envoyer au serveur dans la methode send car nous sommes en POST
    xhr.send("var1=truc&var2=truc");
}

function readData(sData) {
    // On peut maintenant traiter les données sans encombrer l'objet XHR.
    if (sData == "OK") {
        alert("C'est bon");
    } else {
        alert("Y'a eu un problème");
    }
}

request(readData);
