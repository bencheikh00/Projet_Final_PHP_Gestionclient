<?php
// rechercher.php

/* Inclure le fichier config */
require_once "config.php";

if (isset($_POST['search'])) {
    $searchQuery = $_POST['searchQuery'];

    // select query execution with search filter
    $sql = "SELECT * FROM client WHERE nom LIKE '%$searchQuery%' OR adresse LIKE '%$searchQuery%' OR telephone LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%'";

    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            // Display search results
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
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['adresse'] . "</td>";
                echo "<td>" . $row['telephone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['sexe'] . "</td>";
                echo "<td>" . $row['statut'] . "</td>";
                echo "<td>";
                echo '<a href="read.php?id=' . $row['id'] . '" class="me-3"><span class="bi bi-eye"></span></a>';
                echo '<a href="update.php?id=' . $row['id'] . '" class="me-3"><span class="bi bi-pencil"></span></a>';
                echo '<a href="delete.php?id=' . $row['id'] . '"><span class="bi bi-trash"></span></a>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            /* Free result set */
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>Aucun résultat trouvé.</em></div>';
        }
    } else {
        echo "Oops! Une erreur est survenue";
    }
 /* Fermer connection */
 mysqli_close($link);
}
?>