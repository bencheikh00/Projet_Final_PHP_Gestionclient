<<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .button {
  background-color: #000;
  color: #fff;
  border: 1px solid #fff;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background-color: #fff;
  color: #000;
}

    </style>
</head>
<body>
    <h2> Entrez vos coordonées pour accéder dans la base Clientèle </h2>
    <form>
        <label for="prenom&nom">Prénoms & Noms</label>
        <input type="text" id="prenom&nom" name="prenom&nom" required>

        <label for="adresse">Adresse Email</label>
        <input type="text" id="adresse" name="adresse" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <label for="password">Confirmer le mot de passe </label>
        <input type="password" id="password" name="password" required>

        

        <a href="Gererclient.php" class="button">S'inscrire</a>
        
    </form>
          


    <script src="script.js"></script>
</body>
</html>
