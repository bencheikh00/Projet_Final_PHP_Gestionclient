<script type="text/javascript">
            function imprimer_page(){
            window.print();
             }
        </script>
<?php header('Expires: 0');
          header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
          header('Pragma: public');
?>

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
                    

                    </div>
                </div>

   <!-- ... Existing HTML code ... -->

<div class="mt-3 mb-3 d-flex justify-content-between align-items-center">
    <div class="form-group">
        <label for="search">Recherche:</label>
        <input type="text" class="form-control" id="search" placeholder="Entrez le nom du client">
    </div>
    <div class="imprimer">
        <input id="impression" name="impression" type="submit" onclick="imprimer_page()" value="Exporter en pdf" class="btn btn-primary" />
    </div>
    <div class="form-group">
        <label for="sort">Trier par:</label>
        <select class="form-control" id="sort">
            <option value="nom">Nom</option>
            <option value="adresse">Adresse</option>
            <option value="telephone">Téléphone</option>
            <option value="email">Email</option>
            <option value="sexe">Sexe</option>
            <option value="statut">Statut</option>
        </select>
    </div>
</div>

<!-- ... Existing CSS code ... -->
<style>
    .wrapper {
        width: 700px;
        margin: 0 auto;
    }

    table tr td:last-child {
        width: 100px;
    }

    .imprimer {
        margin: 0 auto;
    }

    #impression {
        background-color: #007bff;
        color: #fff;
    }
</style>

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



    <!-- ... Existing code ... -->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');
        const sortSelect = document.getElementById('sort');
        const table = document.querySelector('.table');
        let originalRows; // To store the original order of rows

        // Search function
        searchInput.addEventListener('keyup', function () {
            const searchValue = searchInput.value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                row.style.display = name.includes(searchValue) ? '' : 'none';
            });
        });

        // Sort function
        sortSelect.addEventListener('change', function () {
            const sortKey = sortSelect.value;
            const rows = Array.from(table.querySelectorAll('tbody tr'));

            rows.sort((a, b) => {
                const aText = a.querySelector(`td:nth-child(${getColumnIndex(sortKey)})`).innerText;
                const bText = b.querySelector(`td:nth-child(${getColumnIndex(sortKey)})`).innerText;
                return aText.localeCompare(bText, 'fr', { sensitivity: 'base' });
            });

            const tbody = table.querySelector('tbody');
            rows.forEach(row => tbody.appendChild(row));
        });

        // Store original order of rows
        originalRows = Array.from(table.querySelectorAll('tbody tr'));

        function getColumnIndex(columnName) {
            const headers = table.querySelectorAll('thead th');
            for (let i = 0; i < headers.length; i++) {
                if (headers[i].innerText === columnName) {
                    return i + 1;
                }
            }
            return 0;
        }
    });
</script>


</body>
</html>
