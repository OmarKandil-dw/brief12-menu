

<?php include 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
#search{
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 20px;
    padding: 20px;
}

</style>
</head>
<body>

<button><a href="./index.php">P.ACCEUIL</a></button>

<section>
<form  id="search">
<form action="index.php" method="POST">
  <div>
    <input type="search" id="maRecherche" name="q" placeholder="search by Name">
    <button>search</button>
  </div>
  <div>
    <input type="search" id="maRecherche" name="q" placeholder="search by Matricule">
    <button>search</button>
  </div>
  <div>
    <input type="search" id="maRecherche" name="q" placeholder="search by Fonction">
    <button>search</button>
  </div>
</form>
</form>

</section>
<table>
  <tr>
    <th>Matricule</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>Département</th>
    <th>Salaire</th>
    <th>Fonction</th>
    <th>image</th>  
  </tr>
  <?php
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
        <td>'.$emp['photo'].'</td>   
        </tr>';
      }
    }
?>
</table>
</body>
</html>