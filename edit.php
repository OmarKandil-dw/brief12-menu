<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Document</title>
</head>
<body>
<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=date],input[type=number] ,input[type=file] ,  select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

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
        $photo_backup = $_REQUEST["photo"];
        $photo = "";
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date = $_POST["date_naissance"];
        $departement = $_POST["departement"];
        $salaire = $_POST["salaire"];
        $fonction = $_POST["fonction"];
        $img = $_FILES["image"];
        $filename = $img["name"];
        $tempfile = $img["tmp_name"];
        if($filename==""){
            $photo = $photo_backup;
        }
        else{
            $photo = $filename;
        }
        $sql = "UPDATE employe SET nom = '$nom', prenom = '$prenom', date_naissance = '$date',
            departement = '$departement', salaire = $salaire, fonction = '$fonction '
            WHERE matricule = '$matricule';
        ";
        move_uploaded_file($tempfile, "images/$filename");
        $conn->query($sql);
        header("location: index.php");
    }
?>


    <div class="container">
    <form action="edit.php?matricule=<?php echo $_REQUEST["matricule"]; ?>" method="POST" >
  <div class="row">
      <div class="col-25">
        <label for="fname">Nom</label>
      </div>
      <div class="col-75">
      <input value="<?php echo $row["nom"]?>" type="text" name="nom" placeholder="nom">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Prénom</label>
      </div>
      <div class="col-75">
      <input value="<?php echo $row["prenom"]?>" type="text" name="prenom" placeholder="prenom">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Date de naissance</label>
      </div>
      <div class="col-75">
      <input value="<?php echo $row["date_naissance"]?>" type="date" name="date_naissance">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="lname">Département</label>
      </div>
      <div class="col-75">
       <input value="<?php echo $row["departement"]?>" type="text" name="departement" placeholder="departement">

      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Salaire</label>
      </div>
      <div class="col-75">
      <input value="<?php echo $row["salaire"]?>" type="text" name="salaire" placeholder="salaire">
      </div>
    </div>
 
    <div class="row">
      <div class="col-25">
        <label for="fonction">Fonction</label>
      </div>
      <div class="col-75">
      <select value="<?php echo $row["fonction"]?> id="fonction" name="fonction" placeholder="fonction">
          <option value="AP"> AP</option>
          <option value="RH">RH</option>
          <option value="MV">MV </option>
          <option value="RPR">RPR</option>
        </select>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="img">image URL</label>
      </div>
      <div class="col-75">
      <input type="file" id="lname" name="Image" placeholder="image URL..">  
        </div>
    </div>
    
    <div class="row">
      <input type="submit" name="edit_btn">
    </div>
  </form>
</div>
</body>
</html>
 