<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=date],input[type=number] ,input[type=url] ,  select, textarea {
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

/* Clear floats after the columns */
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
        <input type="text" id="fname" name="Id" placeholder="Matricule..">
      </div>
    </div>

  
  <div class="row">
      <div class="col-25">
        <label for="fname">Nom</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="Nom" placeholder="Nom..">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="lname">Prénom</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="Prénom" placeholder="Prénom..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Date de naissance</label>
      </div>
      <div class="col-75">
        <input type="date" id="lname" name="Date" placeholder="Date de naissance..">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="lname">Département</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="Départ" placeholder="Département..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Salaire</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="Salaire" placeholder="Salaire..">
      </div>
    </div>
 
    <div class="row">
      <div class="col-25">
        <label for="fonction">Fonction</label>
      </div>
      <div class="col-75">
        <select id="fonction" name="fonction">
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="img">image URL</label>
      </div>
      <div class="col-75">
      <input type="url" id="lname" name="Image" placeholder="image URL..">  
        </div>
    </div>
    
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>
