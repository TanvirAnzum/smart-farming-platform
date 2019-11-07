<?php include("backends/logout.php");?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Current Market Rate</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src = "scripts/modal_login.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


  <!-- navigation bar -->

  <?php include("header.php"); ?>


  <div class="row" style="background-color: grey;padding-left:2%; padding-right:2%">

    <iframe src="http://www.dam.gov.bd/damweb/PublicPortal/MarketDisplayFullScreen.php" width = "100%" height = "900"></iframe>



  </div>
  <?php include("footer.php"); ?>



</body>
</html>

<script>

  var user = "<?php echo(isset($_SESSION['username'])); ?>";
  console.log(user);
  if(user) {

      document.getElementById('login_content').style.display = 'block';
      document.getElementById('content').style.display = 'none';
  }

</script>
