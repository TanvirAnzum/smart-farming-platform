<?php include("backends/logout.php");?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Krishoker Haat</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw"> </script>
    <script src = "scripts/captcha.js"></script>
    <script src = "scripts/modal_login.js"></script>


    <link href="css/style.css" rel="stylesheet">
</head>

<body>


  <!-- navigation bar -->

  <?php include("header.php"); ?>

    <!-- captcha item -->
    <h3>Give us feedback on our webpage!</h3>

    <form class="test" method="POST" action="captcha_test.php" >
      <div class="col-12 form-group">
          <div class="g-recaptcha" data-sitekey="6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw">enter captcha</div>
      </div>
      <div class="col-12">
          <input name="submit" type="submit" class="btn btn-success" value="Send Message">
      </div>
      <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
    <input type="hidden" name="action" value="validate_captcha">
    </form>

  <?php
    if (isset($_POST['g-recaptcha-response'])) {
      $captcha = $_POST['g-recaptcha-response'];
      $secret   = '6Lerz7kUAAAAACimxn4nHg1XKj4xIFu4yagF9W27';
      $response = file_get_contents(
          "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
      );
      // use json_decode to extract json response
      $response = json_decode($response);
      //echo($response->success);
      //echo($response->score);

      if ($response->success === false) {
          echo("error occure");
      }
      if ($response->score <= 0.7) {
          echo('you are a bot');
      }
    };
  //... The Captcha is valid you can continue with the rest of your code
  //... Add code to filter access using $response . score

?>
  <?php include("footer.php"); ?>



</body>
</html>
