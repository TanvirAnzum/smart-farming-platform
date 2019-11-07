<?php

$db = mysqli_connect('localhost','root','','data');
$query = "SELECT * FROM equipments WHERE availability = '1'";
$operation = mysqli_query($db,$query);

 ?>
