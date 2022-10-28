<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>


<div class="col-lg-4 col-md-4 col-12"> <!-- mise en place de la carte autour du formulaire de connexion -->
	<div class="card-body">
		<form method="post">
			<div class="card-center">
            <input class='btn btn-dark py-1' type="text" name="Name" placeholder="Prenom" maxlength="30" required>
            <br><br>
            <input class='btn btn-dark py-1' type="text" name="Surname" placeholder="Nom" maxlength="30" required>
            <br><br>
            <input class='btn btn-dark py-1' type="email" name="mail" placeholder="Mail" maxlength="50" required >
            <br><br>
            <input class='btn btn-dark py-1' type="text" name="phone_number" placeholder="Numero de téléphone" maxlength="15" required>
            <br><br>
            <input class='btn btn-dark py-1' type="textarea" name="subject" placeholder="Objet" maxlength="200" required>
            <br><br>
            <input class='btn btn-dark py-1' type="submit" name="envoyer" value="envoyer">
            <div class="py-3">
				<input class='btn btn-dark py-1' type="reset" name="reset" placeholder="Reset"> <!-- rénitialise les données marqué dans le formulaire -->
				</div>
			</form>
		</div>
	</div>
</div>
<br>
<div id="position-admin-button">
    <button class="btn btn-dark py-1"><a href="connexion.php">Se connecter - Espace Admin</a></button> <!-- boutton pour se connecter à l'espace admin -->
</div>
        <?php
            if($_POST){

                $servname = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbname = 'formulaire';
                
                // creer la bdd dans phpmyadmin
                try{
                    $dbco = new PDO("mysql:host=$servname", $user, $pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "CREATE DATABASE IF NOT EXISTS formulaire";
                    $dbco->exec($sql);
                    
                    echo '';
                }
                
                catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            
                $servname = 'localhost';
                $dbname = 'formulaire';
                $user = 'root';
                $pass = 'root';
                try{
                    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // créer la table contacts avec des données dedans ( que si elle n'existe pas )
                    $sql = "CREATE TABLE IF NOT EXISTS contacts(
                            Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            Name VARCHAR(30) NOT NULL,
                            Surname VARCHAR(30) NOT NULL,
                            Mail VARCHAR(50) NOT NULL,
                            Phone VARCHAR(15) NOT NULL,
                            Objet VARCHAR(200) NOT NULL,
                            DateInscription TIMESTAMP,
                            UNIQUE(Mail))";
                
                    $dbco->exec($sql);
                    echo 'Table bien créée !';
                    echo "<br>";
                }
            
                catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                } 
            
        
                // PERMET D INSERER LES DONNEES DANS LA TABLE CONTACTS
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
                // insérer dans la table contacts les données que l'utilisateur à remplis dans le formulaire
                $sql = "INSERT INTO contacts(Name, Surname, Mail, Phone, Objet)
                VALUES('$_POST[Name]', '$_POST[Surname]', '$_POST[mail]', '$_POST[phone_number]', '$_POST[subject]')";
                
                if ($conn->query($sql) === TRUE) {
                echo "les nouveaux enregistrements ajoutés avec succés";
                } else {
                echo "Erreur: " . $sql . "
                " . $conn->error;
                }
            };
        ?>
        </table>
    </body>
</html>