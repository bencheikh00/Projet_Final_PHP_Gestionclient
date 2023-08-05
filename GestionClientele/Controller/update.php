<?php
/* Inclure le fichier */
require_once "config.php";
 
/* Definir les variables */
$nom = $adresse = $telephone = $email = $sexe = $statut = "";
$nom_err = $adresse_err = $telephone_err = $email_err = $sexe_err = $statut_err = "";

/* vérifier la valeur id dans le post pour la mise à jour */
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    /* récupération du champ caché */
    $id = $_POST["id"];

    /* Validate name */
    $input_name = trim($_POST["nom"]);
    if (empty($input_name)) {
        $nom_err = "Veuillez entrer un nom.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $input_name)) {
        $nom_err = "Veuillez entrer un nom valide.";
    } else {
        $nom = $input_name;
    }

    /* Validate adresse */
    $input_adresse = trim($_POST["adresse"]);
    if (empty($input_adresse)) {
        $adresse_err = "Veuillez entrer une adresse.";
    } else {
        $adresse = $input_adresse;
    }

    /* Validate telephone */
    $input_telephone = trim($_POST["telephone"]);
    if (empty($input_telephone)) {
        $telephone_err = "Veuillez entrer un numéro.";
    } elseif (!ctype_digit($input_telephone)) {
        $telephone_err = "Veuillez entrer un numéro valide.";
    } else {
        $telephone = $input_telephone;
    }

    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Veuillez entrer une adresse email.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Veuillez entrer une adresse email valide.";
    } else {
        $email = $input_email;
    }
     
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

    /* vérifier les erreurs avant modification */
    if (empty($nom_err) && empty($adresse_err) && empty($telephone_err) && empty($email_err) && empty($sexe_err) && empty($statut_err)) {
        $sql = "UPDATE client SET nom=?, adresse=?, telephone=?, email=?, sexe=?, statut=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_nom, $param_adresse, $param_telephone, $param_email, $param_sexe, $param_statut, $param_id);
            /* Set parameters */
            $param_nom = $nom;
            $param_adresse = $adresse;
            $param_telephone = $telephone;
            $param_email = $email;
            $param_sexe = $sexe;
            $param_statut = $statut;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                /* enregistrement modifié, redirection vers la page d'accueil */
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Une erreur est survenue.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
} else {
    /* si un paramètre id existe */
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM client WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* récupérer l'enregistrement */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    /* récupérer les champs */
                    $nom = $row["nom"];
                    $adresse = $row["adresse"];
                    $telephone = $row["telephone"];
                    $email = $row["email"];
                    $sexe = $row["sexe"];
                    $statut = $row["statut"];
                } else {
                    header("location: error.php");
                    exit();
                }
                
            } else {
                echo "Oops! Une erreur est survenue.";
            }
        }
        
        /* Fermer le statement */
        mysqli_stmt_close($stmt);
        
        /* Fermer la connexion */
        mysqli_close($link);
    } else {
        /* pas de paramètre id valide, redirection vers une page d'erreur */
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'enregistrement</title>
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
                    <h2 class="mt-5">Mise à jour de l'enregistrement</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $nom_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <textarea name="adresse" class="form-control <?php echo (!empty($adresse_err)) ? 'is-invalid' : ''; ?>"><?php echo $adresse; ?></textarea>
                            <span class="invalid-feedback"><?php echo $adresse_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="number" name="telephone" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                            <span class="invalid-feedback"><?php echo $telephone_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Sexe</label>
                            <input type="text" name="sexe" class="form-control <?php echo (!empty($sexe_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sexe; ?>">
                            <span class="invalid-feedback"><?php echo $sexe_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Statut</label>
                            <input type="text" name="statut" class="form-control <?php echo (!empty($statut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $statut; ?>">
                            <span class="invalid-feedback"><?php echo $statut_err; ?></span>
                        </div>
                        <br><br><br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
