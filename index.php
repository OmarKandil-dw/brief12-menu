<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}
.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; 
  font-size: 28px; 
  padding: 0px 10px;
}
#table{
 position: absolute;
 left: 180px;
}

td:nth-child(even) {
  background-color: #dddddd;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 85%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

</style>
</head>
<body>
<?php

include 'connect.php';

if(isset($_POST['submit'])) {
  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $Date = $_POST['date_naissance'];
  $departement = $_POST['departement'];
  $salaire = $_POST['salaire'];
  $fonction = $_POST['fonction'];
  $Image = $_POST['photo'];
  $sql = "INSERT INTO `employe`(`matricule`, `nom`, `prenom`, `date_naissance`, `departement`, `salaire`, `fonction`, `photo`) VALUES ('$matricule','$nom','$prenom','$Date','$departement','$salaire','$fonction','$Image')";
  mysqli_query($conn,$sql);
}


  
?>
<div class="sidenav">
  <a href="#">Lister les employés</a>
  <a href="add.php">Ajouter un nouveau employé</a>
  <a href="search.php">Rechercher un employé </a>
</div>
<table id="table">
  <tr>
  <tr>
    <th>Matricule</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date</th>
    <th>Départ</th>
    <th>Salaire</th>
    <th>fonction</th>
    <th>Image</th>
    <th>Edit/Delete</th>
  </tr>
  <tbody>
    <?php
    
  if(isset($_GET['rn']))
  {
    $matricule=$_GET['rn'];
    // $matricule =$_GET['matricule'];
    $query = "DELETE FROM employe WHERE matricule = '$matricule'";
    $res= mysqli_query($conn,$query);
    if($res)
    {
    }
    else
     {echo "Error: ". $sql . "".mysqli_error($conn);}
    
  }

    $sql2  = " SELECT * FROM employe";
    $result = mysqli_query($conn,$sql2);
    if($result){
      while ($emp = mysqli_fetch_assoc($result)){
        echo '<tr>
        <td>'.$emp['matricule'].'</td>
        <td>'.$emp['nom'].'</td>
        <td>'.$emp['prenom'].'</td>
        <td>'.$emp['date_naissance'].'</td>
        <td>'.$emp['departement'].'</td>
        <td>'.$emp['salaire'].'</td>
        <td>'.$emp['fonction'].'</td>
        <td>'.$emp['photo']."</td>
        <td> '<img src=images/" . $value["photo"] . "></td>
        <td> 
         <a href='index.php?rn=".$emp["matricule"]."'>delete</a> 
         <a href='edit.php?matricule=".$emp["matricule"]."'>Edit</a> 
         </td>
        </tr>";
      }
    }
?>
</tbody>
</table>
</body>
</html> 
