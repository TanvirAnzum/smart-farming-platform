<?php

$db = mysqli_connect('localhost', 'root', '', 'data');
//location Category
$query = "SELECT division, COUNT(id) FROM equipments GROUP BY division";
$res = mysqli_query($db, $query);
$dh = 0;
$rj = 0;
$ch = 0;
$ra = 0;
$sy = 0;
$ba = 0;
$kh = 0;
while($loc = mysqli_fetch_assoc($res)) {
  if($loc['division']=='Dhaka') {
    $dh = $loc['COUNT(id)'];
  }
  else if($loc['division']=='Rajshahi') {
    $rj = $loc['COUNT(id)'];
  }
  else if($loc['division']=='Chottogram') {
    $ch = $loc['COUNT(id)'];
  }
  else if($loc['division']=='Rangpur') {
    $ra = $loc['COUNT(id)'];
  }
  else if($loc['division']=='Khulna') {
    $kh = $loc['COUNT(id)'];
  }
  else if($loc['division']=='Barishal') {
    $ba = $loc['COUNT(id)'];
  }
  else {
    $sy = $loc['COUNT(id)'];
  }
}



 ?>
