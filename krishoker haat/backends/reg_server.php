<?php
session_start();


// initializing variables
$username = "";
$email    = "";
$phone_number = "";
$location = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'data');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['name']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2) {
	array_push($errors, "pswd");
  }
  if(strlen($username)<4 || strlen($username)>10) array_push($errors,"len");
  if(strlen($password_1)<6) array_push($errors,"plen");
  if(!is_numeric($phone_number)) array_push($errors,"num");

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR phone_number='$phone_number' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "usrex");
    }

    if ($user['phone_number'] === $phone_number) {
      array_push($errors, "px");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username,phone_number,location,email, password)
  			  VALUES('$username', '$phone_number', '$location', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['user_id'] = mysqli_insert_id($db);
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  /*
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  */

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $rslt = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $rslt['id'];
      $_SESSION['admin'] = $rslt['adminship'];
      $_SESSION['status'] = 1;
  	  $_SESSION['success'] = "You are now logged in";
  	  //header('location: index.php')
      exit('successfully logged in.');
  	}else {
  		//array_push($errors, "Wrong username/password combination");
      exit('Wrong username/password combination.');
    }
  }
}

?>
