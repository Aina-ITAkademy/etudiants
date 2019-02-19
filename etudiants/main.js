

function getEtudiant() {
    
    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //code execute quand le serveur renverra une reponse
            var reponse = xhr.responseText  //contenu de la reponse
            var etudiantTxt = document.getElementById("etudiant");
            etudiantTxt.innerHTML  = reponse;
        }
    }
    
    // 3) ouverture requete AJAX
    var prenom = document.getElementById("prenom").value; // recuperer le contenu dans input "prenom"
    xhr.open('GET','http://192.168.33.10/Les_Etudiants/etudiants/scriptPHP/getEtudiant.php?prenom='+prenom) // mettre l'adresse  du script php

    // 4) envoyer la requete
    xhr.send()
}