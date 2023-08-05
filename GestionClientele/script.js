function submitForm() {
    const prenomNom = document.getElementById('prenomNom').value;
    const adresse = document.getElementById('adresse').value;
    const telephone = document.getElementById('telephone').value;
    const adresseEmail = document.getElementById('adresseEmail').value;
    const sexe = document.querySelector('input[name="sexe"]:checked').value;
    const statut = document.querySelector('input[name="statut"]:checked').value;

    // Créer un objet pour stocker les informations saisies
    const client = {
        prenomNom,
        adresse,
        telephone,
        adresseEmail,
        sexe,
        statut
    };

    // Sauvegarder les informations dans le stockage local pour l'instant (au lieu de naviguer vers une autre page)
    localStorage.setItem('clientData', JSON.stringify(client));

    // Rediriger vers une autre page après soumission
    window.location.href = 'liste_clients.html';
}

function submitForm() {
    // Récupérer les valeurs saisies dans le formulaire
    var prenomNom = document.getElementById("prenomNom").value;
    var adresse = document.getElementById("adresse").value;
    var telephone = document.getElementById("telephone").value;
    var adresseEmail = document.getElementById("adresseEmail").value;
    var sexe = document.querySelector('select[name="mygroup"]').value;

    // Créer une instance d'objet XMLHttpRequest (AJAX)
    var xhr = new XMLHttpRequest();

    // Configurer la requête AJAX avec la méthode POST et l'URL du script PHP de traitement du formulaire
    xhr.open("POST", "traitement_formulaire.php", true);

    // Définir le type de contenu pour les données envoyées (ici, des données JSON)
    xhr.setRequestHeader("Content-Type", "application/json");

    // Gérer l'événement de la réponse de la requête AJAX
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Afficher la réponse du serveur (optionnel)
            console.log(xhr.responseText);
            // Vous pouvez également afficher un message de succès à l'utilisateur ici
        }
    };

    // Convertir les données en format JSON
    var data = JSON.stringify({
        prenomNom: prenomNom,
        adresse: adresse,
        telephone: telephone,
        adresseEmail: adresseEmail,
        mygroup: sexe
    });

    // Envoyer la requête AJAX avec les données JSON
    xhr.send(data);
}

