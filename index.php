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
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
#table{
 position: absolute;
 left: 180px;
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

$id = $_POST["Id"];
$Nom = $_POST["Nom"];
$Prénom = $_POST["Prénom"];
$Date = $_POST["Date"];
$Départ = $_POST["Départ"];
$Salaire = $_POST["Salaire"];
$fonction = $_POST["fonction"];
$Image = $_POST["Image"];

$conn = new mysqli('localhost', 'root', '' ,'mydata');
$sql = "INSERT INTO employe VALUES($id,'$Nom','$Prénom',$Date,'$Départ',$Salaire,'$fonction','$Image')";
$conn->query($sql);

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
  </tr>
  <tbody>
    <?php
    $sql2  = " SELECT * FROM employe";
    $result = mysqli_query($conn,$sql2);
    if($result){
      while ($emp = mysqli_fetch_assoc($result)){

        echo '<tr>
        <td>'.$emp['matricule'].'</td>
        <td>'.$emp['nom'].'</td>
        <td>'.$emp['prénom'].'</td>
        <td>'.$emp['date de naissance'].'</td>
        <td>'.$emp['département'].'</td>
        <td>'.$emp['salaire'].'</td>
        <td>'.$emp['fonction'].'</td>
        <td>'.$emp['photo'].'</td>
        </tr>';
      }
    }
?>
  </tbody>
</table>


</body>
</html> 
