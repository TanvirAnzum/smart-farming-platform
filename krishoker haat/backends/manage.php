<?php
$id = $_GET['value'];
$t_id = $_GET['id'];
$db = mysqli_connect('localhost', 'root', '', 'data');
if($t_id=='1') {
  $query = "DELETE FROM products WHERE id = '$id' ";
}
else {
  $query = "DELETE FROM equipments WHERE id = '$id' ";
}

if(mysqli_query($db, $query)) {
  header("location: ../history.php");
}
else echo("Error Occured");



 ?>
