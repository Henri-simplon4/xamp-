<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bases de données</title>
</head>
<body>
    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom"><br><br>
        <label>prenom :</label>
        <input type="text" name="prenom"><br><br>
        <label>date_de_naissance :</label>
        <input type="text" name="date_de_naissance"><br><br>
        <label>sexe :</label>
        <input type="text" name="sexe"><br><br>
        <label>mdp :</label>
        <input type="text" name="mdp"><br><br>
        <button type="submit">Enregistrer</button>
    </form>
    <?php
    // formulaire soumis
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_de_naissance = $_POST['date_de_naissance'];
        $sexe = $_POST['sexe'];
        $mdp = $_POST['mdp'];

        $servername = 'localhost';
        $username ='root';
        // $password = 'root';
        // connection
        try{
            $conn = new PDO("mysql:host=$servename;dbname=simplonp4", $username,);
            // mode erreur
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // execution
            $sql = "INSERT INTO fomulaire (nom, prenom, date_de_naissance, sexe, mdp) VALUES (:nom, :prenom, :date_de_naissance, :sexe, :mdp)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':date_de_naissance', $date_de_naissance);
            $stmt->bindParam('sexe', $sexe);
            $stmt->bindParam('mdp', $mdp);
            $stmt->execute();
            echo "informations enregistre avec succès.";
        }        
        catch(PDOException $e){
            echo "erreur : " .$e->getMessage();
        }
    }
    ?>
</body>
</html>
