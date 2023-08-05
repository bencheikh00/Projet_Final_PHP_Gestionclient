<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Pharmacie Caty</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
   
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des Clients</h2>
                        <a href="create.php" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</a>
                        <a href="rechercher.php" class="btn btn-primary" id="searchBtn"><i class="bi bi-search"></i> Rechercher</a>
                        <a href="#" class="btn btn-info" id="sortExportBtn"><i class="bi bi-file-earmark-pdf"></i> Trier et Exporter PDF</a>
                    </div>
                    </div>
                    <?php 
/* Inclure le fichier config */
require_once "config.php";
                    
                    /* select query execution */
                    $sql = "SELECT * FROM client";
                    
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nom</th>";
                                        echo "<th>Adresse</th>";
                                        echo "<th>Telephone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Sexe</th>";
                                        echo "<th>Statut</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>" . $row['adresse'] . "</td>";
                                        echo "<td>" . $row['telephone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['sexe'] . "</td>";
                                        echo "<td>" . $row['statut'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" ><span class="bi bi-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            /* Free result set */
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Zéro Enregistrement, cliquer sur ajouter pour commencer</em></div>';
                        }
                    } else{
                        echo "Oops! Une erreur est survenue";
                    }
 
                    /* Fermer connection */
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
   
</body>
</html>
