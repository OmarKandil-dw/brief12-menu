<?php
    include 'connect.php';
    $matricule =$_GET['matricule'];
    $sql = "DELETE FROM employe WHERE matricule = '$matricule'";
    $conn->mysqli::query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
</head>
<body>
    <div>
        <h1>L'enregistrement avec le <span>Prénom</span>: <?php echo $matricule?>A été supprimé .</h1>
       <a href="./index.php">Revenir a la page d'acceuil</a>
    </div>    
</body>
</html>