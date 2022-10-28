<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pannel Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <button class="btn btn-dark py-1"><a href="http://localhost/php-formulaire/intro.php" style="color:red">Revenir au formulaire</a></button> <!-- boutton pour revenir au formulaire de base -->
        <br>
        <br>
        <table>
            <?php
                $servname = 'localhost';
                $dbname = 'formulaire';
                $user = 'root';
                $pass = 'root';

                // Créer une conexion
                $conn = new mysqli($servname, $user, $pass, $dbname);
                // verifier la connexion
                if ($conn->connect_error) {
                die("La connexion a échouée: " . $conn->connect_error);
                }

                $sql = 'SELECT * FROM contacts'; // selectionne toutes les données de la table contacts
                foreach ($conn->query($sql) as $row){
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<th><p>Prénom </p></th>';
                    echo '<th><p>Nom </p></th>';
                    echo '<th><p>Mail </p></th>';
                    echo '<th><p>Téléphone </p></th>';
                    echo '<th><p>Objet </p></th>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><i> ' . $row['Name'] .' </i></td>';
                    echo '<td><i> ' . $row['Surname'] .' </i></td>';
                    echo '<td><i> ' . $row['Mail'] .' </i></td>';
                    echo '<td><i> ' . $row['Phone'] .' </i></td>';
                    echo '<td><i> ' . $row['Objet'] .' </i></td>';
                    echo '</tr>';
                    echo '</tbody>';                   
                }   
            ?>
        </table>
    </body>
</html>