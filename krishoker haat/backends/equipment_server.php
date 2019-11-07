<?php
include("logout.php");

$db = mysqli_connect('localhost','root','','data');
$user = $_SESSION['username'];
$query = "SELECT id FROM users WHERE username='$user' LIMIT 1";
$result = mysqli_query($db, $query);
$res = mysqli_fetch_assoc($result);
$sid = $res['id'];


if (isset($_POST['submit_btn'])) {


  $title = mysqli_real_escape_string($db,$_POST['title']);
  $des = mysqli_real_escape_string($db,$_POST['description']);
  $price = mysqli_real_escape_string($db,$_POST['price']);
  $s_id = mysqli_real_escape_string($db,$sid);

  if($_POST['division']==0) $div = 'Dhaka';
  else if($_POST['division']==1) $div = 'Rajshahi';
  else if($_POST['division']==2) $div = 'Chottogram';
  else if($_POST['division']==3) $div = 'Khulna';
  else if($_POST['division']==4) $div = 'Rangpur';
  else if($_POST['division']==5) $div = 'Barishal';
  else $div = 'Sylhet';

  $divsn = mysqli_real_escape_string($db,$div);

  $phone_number = mysqli_real_escape_string($db,$_POST['phone_number']);

  $temp = $_POST['para'] . ',' . $_POST['thana'] . ',' . $_POST['district'] . ',' .$divsn;
  ///echo("$temp");
  $location = mysqli_real_escape_string($db,$temp);

  /// storing in Database

  $sql = "INSERT INTO equipments (title,description,price,phone_number,location,division,availability,s_id)
        VALUES('$title', '$des', '$price', '$phone_number', '$location', '$divsn', '1',$s_id)";
  if(mysqli_query($db, $sql)) $flag = 1;
  else echo("error". mysqli_error($db));

  $last_inserted_id = mysqli_insert_id($db);

  $tempname = $_FILES["image"]["tmp_name"];
  $extension = (string)$last_inserted_id;
  $folder = "../images/equipments/".$extension;
  move_uploaded_file($tempname,$folder);
  $folder = "./images/equipments/".$extension;
  $query=" UPDATE equipments SET image_address='$folder' WHERE id = '$last_inserted_id' ";
  if($flag && mysqli_query($db,$query)) {
    $_SESSION['msg'] = "Successfully added the advertise.";
    header("location: ../equipments.php");
  }
  else {
    $_SESSION['msg'] = "Error occured during operation.please try again.";
    header("location: ../equipment_reg.php");
  }

}


?>
