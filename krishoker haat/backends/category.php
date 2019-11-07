<?php

$db = mysqli_connect('localhost', 'root', '', 'data');
$query = "SELECT category, COUNT(id) FROM products GROUP BY category";
$result = mysqli_query($db, $query);
$equ = 0;
$crop = 0;
$seed = 0;
$other = 0;
while($cat = mysqli_fetch_assoc($result)) {
  if($cat['category']=='1') {
    $equ = $cat['COUNT(id)'];
  }
  else if($cat['category']=='2') {
    $crop = $cat['COUNT(id)'];
  }
  else if($cat['category']=='3') {
    $seed = $cat['COUNT(id)'];
  }
  else {
    $other = $cat['COUNT(id)'];
  }
}


//location Category
$query = "SELECT division, COUNT(id) FROM products GROUP BY division";
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
