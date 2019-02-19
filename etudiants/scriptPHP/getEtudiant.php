<?php

    //Fonction pour connection a la base de donnees
    function cnx_db( ){
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
    
    $prenom = '%'.$_GET['prenom'].'%';
    if (isset($prenom)&& (strlen($_GET['prenom'])>0)) {
        
    
        $sql_request = $database->prepare("SELECT * FROM etudiants 
                                        WHERE prenom LIKE :prenom
                                        ;");
        $sql_request->bindParam(':prenom',$prenom,PDO::PARAM_STR);
        $sql_request->execute();
        $results = $sql_request->fetchAll();
    
        //echo "requete ok";
        foreach ($results as $key => $etudiant):
            $r_id = $etudiant['id'];
            $r_prenom = $etudiant['prenom'];
            $r_nom = $etudiant['nom'];
            // $toPrint = "<tr><td>".$r_id."</td><td>".$r_nom."</td><td>".$r_prenom."</td></tr>";
            //echo $toPrint;

            $toPrint2 = $r_nom." ".$r_prenom."</br>";
            echo $toPrint2;
        endforeach;
    }
?>