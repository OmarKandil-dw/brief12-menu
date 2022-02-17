
<?php
$localhost='localhost';
$user='root';
$pa='';
$db="mydata";
$conn = mysqli_connect($localhost,$user,$pa,$db);
if($conn==true){

    echo "bravo";
}else{
    echo "no";
}
?>
