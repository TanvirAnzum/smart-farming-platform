<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "data");

if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit_btn"]))
{
  $captcha = $_POST['g-recaptcha-response'];
  $secret   = '6Lerz7kUAAAAACimxn4nHg1XKj4xIFu4yagF9W27';
  $response = file_get_contents(
      "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
  );
  // use json_decode to extract json response
  $response = json_decode($response);

  $status = 1;

  if ($response->success === false) {
      echo("Invalid captcha/Error occured. Try again later.<br><br>");
      ///echo('<a href="../index.php"> <button class="btn btn-primary">Home</button></a>');
  }
  else {
    if($response->score >= 0.7) {
      echo($_POST["question"]);
      $ques = mysqli_real_escape_string($conn,$_POST["question"]);
      $u_id = mysqli_real_escape_string($conn,$_POST["u_id"]);
      if(!empty($ques)) {
        $sql = "INSERT INTO qa (question,user_id) VALUES ('$ques','$u_id')";

        if ($conn->query($sql)) {
          header("location: ../queries.php");
        }
        else echo "Error: ". $sql . "<br> . $conn->error";
      }
      else header("location: ../queries.php");
    }
    else {
      echo("You are a spammer.@#$%");
    }
  }




}



/**
//$sql = "INSERT INTO qa (question) VALUES ('$a')";
//$sql = "UPDATE qa SET answer='$b' WHERE id = '1' ";
$sql = "SELECT * FROM qa";
/**  if ($conn->query($sql) === TRUE) {
///    echo "New record created successfully";
  }
  else {
    echo "Error: ". $sql . "<br> . $conn->error";
  }


  $result = $conn->query($sql);

  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()) {
    print_r($row);

  }
  }


  $conn->close();
 ?>
**/
