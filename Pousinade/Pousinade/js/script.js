// efface le contenu de la div résultat
function viderDivResultat(){
    document.getElementById("divresultat").innerHTML = "";
}

// envoi du formulaire en AJAX
function envoyerFormulaire(){
    // récupération des champs
    var nom = document.getElementById("nom").value;
    var email = document.getElementById("email").value;
    var objet = document.getElementById("objet").value;
    var message = document.getElementById("message").value;

    // requête AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "API/traitement_contact.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            // réponse JSON
            var response = JSON.parse(this.responseText);

            if(response.status == "OK"){
                document.getElementById("divresultat").innerHTML =
                    "<p style='color:green'>" + response.message + "</p>";
            } else {
                document.getElementById("divresultat").innerHTML =
                    "<p style='color:red'>" + response.message + "</p>";
            }
        }
    };

    // envoi des données
    xhttp.send();
}

// déclenchée à l’envoi du formulaire
function soumettreFormulaire(e){
    e.preventDefault(); // empêche le rechargement
    viderDivResultat();
    envoyerFormulaire();
}

// initialisation (comme dans ton cours)
function init(){
    formContact = document.getElementById("formContact");
    formContact.addEventListener("submit", soumettreFormulaire);
    viderDivResultat();
}

window.addEventListener("load", init);
