<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>

<h2>Ajouter un employee</h2>

<div class="container">
  <form action="index.php" method="POST">
  <div class="row">
      <div class="col-25">
        <label for="fname">Matricule</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="matricule" placeholder="Matricule..">
      </div>
    </div>

  
  <div class="row">
      <div class="col-25">
        <label for="fname">Nom</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nom" placeholder="Nom..">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="lname">Prénom</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="prenom" placeholder="Prénom..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Date de naissance</label>
      </div>
      <div class="col-75">
        <input type="date" id="lname" name="date_naissance" placeholder="Date de naissance..">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="lname">Département</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="departement" placeholder="Département..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Salaire</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="salaire" placeholder="Salaire..">
      </div>
    </div>
 
    <div class="row">
      <div class="col-25">
        <label for="fonction">Fonction</label>
      </div>
      <div class="col-75">
        <select id="fonction" name="fonction">
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
      <input type="submit" value="Submit" name="submit">
    </div>
  </form>
</div>

<button><a href="./index.php">P.précedent</a> </button>

</body>
</html>
<?php 

if(isset($_GET['search'])){
  $filtervalues = $_GET['search'];
  $sql = "SELECT * FROM employe WHERE CONCAT(matricule,nom,prenom,date_naissance,departement,salaire,fonction) LIKE '%$filtervalues%'";
  $query_run =   mysqli_query($conn,$sql);

  if(mysqli_num_rows($query_run) > 0 ){
    foreach($query_run as $items){
      ?>
      <tr>
        <td><?- $items['matricule'];?></td>
        <td><?- $items['nom'];?></td>
        <td><?- $items['prenom'];?></td>
        <td><?- $items['date_naissance'];?></td>
        <td><?- $items['departement'];?></td>
        <td><?- $items['salaire'];?></td>
        <td><?- $items['fonction'];?></td>
      </tr>
      <?php 

    }

}
else{
echo 'no record found';

} 
}
?>
