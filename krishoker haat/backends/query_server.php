<?php

include("../vendor/autoload.php");
use Twilio\Rest\Client;

$account_sid = 'AC46787fca93d9acfc0f7dd07512911223';
$auth_token = '3af9e9eead88ddfcd39a391c121d6c87';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+12512154198";


if (isset($_POST['flag'])) {
  $conn = new mysqli("localhost", "root", "", "data");

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $ans = mysqli_real_escape_string($conn, $_POST['ans']);



  $sql = "UPDATE qa SET answer= '$ans' WHERE id=$id";

  $sql2 = "SELECT user_id FROM qa WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    $result = $conn->query($sql2);
    while($row = $result->fetch_assoc()) {
        $user_id = $row['user_id'];
    }

    $query = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($query);

    while($row = $result->fetch_assoc()) {
        //echo($row['phone_number']);
        $phone_number = '+88' . $row['phone_number'];
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
            // Where to send a text message (your cell phone?)
    $phone_number,
    array(
          'from' => $twilio_number,
          'body' => 'Your question has been answered! Check the site immidiately !!'
          )
      );
      }
    }
  }
  else {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
?>
