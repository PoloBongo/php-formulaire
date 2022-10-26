<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <button class="btn btn-dark py-1"><a href="http://localhost/php-bongo/intro.php" style="color:red">Revenir au formulaire</a></button> <!-- boutton pour revenir au formulaire de base -->
        <br>
        <br>
        <table>
            <?php
                $servname = 'localhost';
                $dbname = 'contacts';
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
                    echo '<td><p><strong>Prénom : </button></strong><i> ' . $row['Name'] .' </i></p></td>';
                    echo '<td><p><strong>Nom : </button></strong><i> '. $row['Surname'] . '</i></p></td>';
                    echo '<td><p><strong>Mail :</button></strong><i>  ' . $row['Mail'] . '</i></p></td>';
                    echo '<td><p><strong>Téléphone :</button></strong><i> '. $row['Phone'] . '</i></p></td>';
                    echo '<td><p><strong>Objet :</button></strong><i> ' . $row['Objet'] . '</i></p></td>';
                    echo '</tr>';
                    echo '</tbody>';                   
                }



                
            ?>
        </table>
    </body>
</html>