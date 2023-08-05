<?php
// search.php

// Include the config.php file to establish the database connection
require_once "config.php";

// Check if the 'name' parameter exists in the URL
if (isset($_GET['name']) && !empty($_GET['name'])) {
    // Sanitize the input to prevent SQL injection
    $searchName = mysqli_real_escape_string($link, $_GET['name']);

    // Construct the SQL query with the search parameter
    $sql = "SELECT * FROM client WHERE nom LIKE '%$searchName%'";

    // Execute the query
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
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
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>Aucun enregistrement trouvé pour ce nom.</em></div>';
        }
    } else {
        echo "Oops! Une erreur est survenue";
    }

    mysqli_close($link);
} else {
    // If 'name' parameter is not provided or empty, redirect to the main page.
    header("Location: index.php");
    exit();
}
