<?php include("backends/logout.php");
  $user = $_SESSION['username'];
  $db = mysqli_connect('localhost', 'root', '', 'data');
  $query = "SELECT * FROM users WHERE username='$user' LIMIT 1";
  $result = mysqli_query($db, $query);
  $res = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Profile</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src = "scripts/modal_login.js"></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
<body style="background-color:#F8F9FB">


  <?php include("header.php");?>


  <div class="container" style="background-color:#EBEBEB;padding-top: 20px;">
    <div class="row">
      <div class="col-md-3">
        <h4>User Informations</h4>
        <br><br>
        <div>
        <p><i class="fas fa-user"></i> <?php echo($res['username']); ?></p>
        <p><i class="fas fa-phone"></i> <?php echo($res['phone_number']); ?></p>
        <i class="fas fa-at"></i> <?php echo($res['email']); ?></p>
        <p><i class="fas fa-address-book"></i> <?php echo($res['location']); ?></p><br>
        </div>
        <div class="text-center">
        <button class="btn btn-success">Update Info</button>
        <br><br>

        <button class="btn btn-secondary">Update Password</button>
        </div>
        <br>
        <br>
      </div>

      <!-- php code goes here -->
      <div class="col-sm">
        <h4>Previous Advertise History</h4>
        <br><br>
        <div class="rental">
          <h5 style="text-align:center">Equipments Rental Section</h5>
          <P>Your posted advertises in rental section are listed here: </p>
            <?php
            $id = $res['id'];

            $qu="SELECT * FROM equipments WHERE s_id = '$id'";

            $result = mysqli_query($db, $qu);
            while($r = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card w-80" style="background-color:#a9ad6d">
              <div class="card-body">
                <div class="row">
                    <div class="col md-5">
                    <p class="card-text">Title: <?php echo($r['title']) ?>
                    <br>
                    Price: <?php echo($r['price']) ?> Tk.
                    </p>
                    </div>
                    <div class="col text-right" style="padding-top:5px;">
                    <a href="order_confirmation.php?value=<?php echo($r['id']) ?>&id=2" class="btn btn-success">View</a>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="backends/manage.php?value=<?php echo($r['id']) ?>&id=2" class="btn btn-danger">Delete</a>
                    </div>

                  </div>
                </div>
              </div>
            <br>


          <?php
          }
          ?>



        </div>
        <br><br>
        <div class="trade">
          <h5 style="text-align:center">Buy/Sell Section</h5>
          <P>Your posted advertises in Buy/Sell section are listed here: </p>
            <?php
            $id = $res['id'];

            $x= "SELECT * FROM products WHERE s_id = '$id'";
            $rslt = mysqli_query($db, $x);
            while($e = mysqli_fetch_assoc($rslt)) {
              ?>
              <div class="card w-80" style="background-color:#a9ad6d">
                <div class="card-body">
                  <div class="row">
                      <div class="col md-5">
                      <p class="card-text">Title: <?php echo($e['title']) ?>
                      <br>
                      Price: <?php echo($e['price']) ?> Tk.
                      </p>
                      </div>
                      <div class="col text-right" style="padding-top:5px;">
                      <a href="order_confirmation.php?value=<?php echo($e['id']) ?>&id=1" class="btn btn-success">View</a>
                      <a href="#" class="btn btn-primary">Edit</a>
                      <a href="backends/manage.php?value=<?php echo($e['id']) ?>&id=1" class="btn btn-danger">Delete</a>
                      </div>

                    </div>
                  </div>
                </div>
              <br>
            <?php
            }
            ?>
        </div>

    </div>
  </div>
</div>

  <?php include("footer.php"); ?>
</body>
</html>
