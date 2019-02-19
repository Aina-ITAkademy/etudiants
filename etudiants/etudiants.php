<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exercice Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

</head>
<body>
    <form method="GET" action="etudiants.php">
        Prenom : 
        <input type="text" name="prenom" >
    
        <input type="submit" value="Submit">
    </form> 

    <h1>Liste Etudiants</h1>
    <?php

        //Fonction pour connection a la base de donnees
        function cnx_db()
        {
            $namehost = 'localhost';
            $dbname = 'Tables_etudiants';
            $user = 'root';
            $password = '0000';
            $charset = 'utf8';
        
            $DNS = 'mysql:host='.$namehost.';dbname='.$dbname.';charset=utf8';
        
            $database = new PDO($DNS, $user, $password);
        
            return $database;
        }
        $database = cnx_db();
        
        // Construction de la requete + execution
        $prenom = '%'.$_GET['prenom'].'%';
        if (isset($prenom)&& (strlen($_GET['prenom'])>0)) {
            
        
            $sql_request = $database->prepare("SELECT * FROM etudiants 
                                            WHERE prenom LIKE :prenom
                                            ;");
            $sql_request->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $sql_request->execute();
            $results = $sql_request->fetchAll();

    ?>
    <table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
    </tr>
    <?php
        //construction ligne tableau
        foreach ($results as $key => $etudiant):
            $r_id = $etudiant['id'];
            $r_prenom = $etudiant['prenom'];
            $r_nom = $etudiant['nom'];
            $toPrint = "<tr><td>".$r_id."</td><td>".$r_nom."</td><td>".$r_prenom."</td></tr>";
            echo $toPrint;
        endforeach;
        } //fin boucle if (isset)
        else {
            echo "Liste vide";
        }
    ?>
    </table>
</body>
</html>