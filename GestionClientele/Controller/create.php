<?php
/* Inclure le fichier config */
require_once "config.php";

/* Definir les variables */
$nom = $adresse = $telephone = $email = $sexe = $statut = "";
$nom_err = $adresse_err = $telephone_err = $email_err = $sexe_err = $statut_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Validate name */
    $input_name = trim($_POST["nom"]);
    if (empty($input_name)) {
        $nom_err = "Veillez entrez un nom.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $input_name)) {
        $nom_err = "Veillez entrez un nom valide.";
    } else {
        $nom = $input_name;
    }

    /* Validate adresse */
    $input_adresse = trim($_POST["adresse"]);
    if (empty($input_adresse)) {
        $adresse_err = "Veillez entrez une adresse.";
    } else {
        $adresse = $input_adresse;
    }

    /* Validate telephone*/
    $input_telephone = trim($_POST["telephone"]);
    if (empty($input_telephone)) {
        $telephone_err = "Veillez entrer le numéro de téléphone.";
    } elseif (!ctype_digit($input_telephone)) {
        $telephone_err = "Veillez entrer une valeur numérique positive.";
    } else {
        $telephone = $input_telephone;
    }
    /* Validate email*/
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Veuillez entrer une adresse email.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Veuillez entrer une adresse email valide.";
    } else {
        $email = $input_email;
    }

    /* pour sexe */
    $input_sexe = trim($_POST["sexe"]);
    if (empty($input_sexe)) {
        $sexe_err = "Veuillez choisir un sexe.";
    } else {
        $sexe = $input_sexe;
    }

    /* pour statut */
    $input_statut = trim($_POST["statut"]);
    if (empty($input_statut)) {
        $statut_err = "Veuillez choisir un statut.";
    } else {
        $statut = $input_statut;
    }

    /* vérifiez les erreurs avant l'enregistrement */
    if (empty($nom_err) && empty($adresse_err) && empty($telephone_err) && empty($email_err) && empty($sexe_err) && empty($statut_err)) {

        /* Prepare an insert statement */
        $sql = "INSERT INTO client (nom, adresse, telephone, email, sexe, statut) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            /* Bind les variables à la requête préparée */
            mysqli_stmt_bind_param($stmt, "ssssss", $param_nom, $param_adresse, $param_telephone, $param_email, $param_sexe, $param_statut);

            /* Set parameters */
            $param_nom = $nom;
            $param_adresse = $adresse;
            $param_telephone = $telephone;
            $param_email = $email;
            $param_sexe = $sexe;
            $param_statut = $statut;

            /* exécuter la requête */
            if (mysqli_stmt_execute($stmt)) {
                /* opération effectuée, retour à la page d'accueil */
                header("location: index.php");
                exit();
            } else {
                echo "Oops! une erreur est survenue.";
            }
        }

        /* Close statement */
        mysqli_stmt_close($stmt);
    }

    /* Close connection */
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Ajouter un client</h2>
                    <p>Veillez remplir le formulaire pour enregistrer un client</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $nom_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <textarea name="adresse" class="form-control <?php echo (!empty($adresse_err)) ? 'is-invalid' : ''; ?>"><?php echo $adresse; ?></textarea>
                            <span class="invalid-feedback"><?php echo $adresse_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="number" name="telephone" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                            <span class="invalid-feedback"><?php echo $telephone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Sexe</label>
                            <input type="text" name="sexe" class="form-control <?php echo (!empty($sexe_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sexe; ?>">
                            <span class="invalid-feedback"><?php echo $sexe_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Statut</label>
                            <input type="text" name="statut" class="form-control <?php echo (!empty($statut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $statut; ?>">
                            <span class="invalid-feedback"><?php echo $statut_err;?></span>
                        </div>
                        <br><br><br>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
