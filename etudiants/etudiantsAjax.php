<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vrai Exercice Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

</head>
<body>
    <form method="GET" >
    Prenom : 
    <input type="text" name="prenom" id="prenom" onkeyup="getEtudiant()" >
   
    <!-- <input type="submit" value="Submit"> -->
    </form> 

    <h1>Liste Etudiants</h1> 
    <br>
    <div id='etudiant'></div>
    <!-- <table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
    </tr> -->

    </table>
</body>
</html>