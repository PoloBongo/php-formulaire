

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <body>

<div class="col-lg-4 col-md-4 col-12"> <!-- mise en place de la carte autour du formulaire de connexion -->
    <div class="card-body" style="height:240px"> <!-- adaptation de la taille -->
		<form method="post">
            <input class='btn btn-dark py-1' type="text" name="Name" placeholder="Prenom" maxlength="30" required>
            <br><br>
            <input class='btn btn-dark py-1' type="text" name="Surname" placeholder="Nom" maxlength="30" required>
            <br><br>
            <input class='btn btn-dark py-1' type="submit" name="envoyer" value="envoyer">
            <div class="py-3">
				<input class='btn btn-dark py-1' type="reset" name="reset" placeholder="Reset">
			</div>
		</form>
    </div>
</div>




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
                $sql = 'SELECT * FROM contacts'; // sectionne toutes les données de la table "contacts"
                if ($_POST){

                    if ($_POST["Name"] == 'Campus' and $_POST["Surname"] == 'Gtech') { // si l'identifiant admin n'est pas "Campus Gtech" alors vous n'avez pas accès au pannel admin
                        
                        echo "<br>";
                        echo 'Bienvenue, Mr '. $_POST["Name"] . ' ' . $_POST["Surname"] . ' rendez-vous sur le ';
                        echo '<button class="btn btn-dark py-1"><a href="admin.php">ALLER SUR LE PANNEL ADMIN</a></button> pour voir la base de donnée !';
                    }
                    
                }


                
                ?>

    </body>
</html>