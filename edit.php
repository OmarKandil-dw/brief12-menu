<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Document</title>
</head>
<body>

<?php
    include 'connect.php';
    if(isset($_REQUEST["matricule"])){
        $matricule = $_REQUEST["matricule"];
        $data = "SELECT nom,prenom,date_naissance,departement,salaire,fonction
            FROM employe WHERE matricule = $matricule;";
        $get_data = $conn->query("$data");
        $row = $get_data->fetch_array(MYSQLI_ASSOC);
    }
    if(isset($_POST['edit_btn'])){
        // $photo_backup = $_REQUEST["photo"];
        // $photo = "";
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date = $_POST["date_naissance"];
        $departement = $_POST["departement"];
        $salaire = $_POST["salaire"];
        $fonction = $_POST["fonction"];
        // $img = $_FILES["image"];
        // $filename = $img["name"];
        // $tempfile = $img["tmp_name"];
        // if($filename==""){
        //     $photo = $photo_backup;
        // }
        // else{
        //     $photo = $filename;
        // }
        $sql = "UPDATE employe SET nom = '$nom', prenom = '$prenom', date_naissance = '$date',
            departement = '$departement', salaire = $salaire, fonction = '$fonction '
            WHERE matricule = '$matricule';
        ";
        // move_uploaded_file($tempfile, "images/$filename");
        $conn->query($sql);
        header("location: index.php");
    }
?>
    <form action="edit.php?matricule=<?php echo $_REQUEST["matricule"]; ?>" method="POST" >
        <input value="<?php echo $row["nom"]?>" type="text" name="nom" placeholder="nom">
        <input value="<?php echo $row["prenom"]?>" type="text" name="prenom" placeholder="prenom">
        <input value="<?php echo $row["date_naissance"]?>" type="date" name="date_naissance">
        <input value="<?php echo $row["departement"]?>" type="text" name="departement" placeholder="departement">
        <input value="<?php echo $row["salaire"]?>" type="text" name="salaire" placeholder="salaire">
        <input value="<?php echo $row["fonction"]?>" type="text" name="fonction" placeholder="fonction">
        
        <input type="submit" name="edit_btn">
    </form>
</body>
</html>
 