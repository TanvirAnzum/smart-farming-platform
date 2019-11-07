<?php
include("backends/logout.php");
include("backends/category.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preservation Centers</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src = "scripts/modal_login.js"></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
<body style="background-color:#F8F9FB">


  <?php include("header.php");?>

  <!-- login content -->

  <div class="container-fluid" id="login_content" style="display:none;">
    <div class="row jumbotron">
      <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xl-9">
        <p class="lead">Welcome back <?php echo($_SESSION['username']); ?>, Here is the list of available preservation centers as cold storages, silos etc.
        </p>
      </div>

      <div class="col-sm-1" style="padding-left:200px;">
        <a href="preservation_center.php?logout='1'"><button class='btn btn-default btn-rounded mb-4 btn-danger'>Log Out</button></a>
      </div>
    </div>
  </div>

  <!-- guest content -->

  <div class="container-fluid" id="content">
    <div class="row jumbotron">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <p class="lead">To book space in preservation center, you must log in first.  </p>
      </div>

        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <i class="fas fa-user prefix grey-text"></i>
                  <input type="username" id="defaultForm-user" class="form-control validate" placeholder="Username">
                  <label data-error="wrong" data-success="right" for="defaultForm-user">Your Username</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" id="defaultForm-pass" class="form-control validate" placeholder="Password">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-primary" id="login">Login</button>
              </div>
            </div>
          </div>
        </div>

      <div class="text-center" style="padding-top: 13px;">
        <a href="" class="btn btn-default btn-rounded mb-4 btn-secondary" data-toggle="modal" data-target="#modalLoginForm">Sign In</a>
        <a href="registration.php" class="btn btn-default btn-rounded mb-4 btn-primary">Register</a>
      </div>
    </div>
  </div>

  <div class="container" style="background-color:#EBEBEB;padding-top: 20px;">
    <div class="row">
      <div class="col-md-3">
        <ul class="list-group">
          <li class="list-group-item active">Locations</li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Dhaka
            <span class="badge badge-secondary badge-pill">0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Rajshahi
            <span class="badge badge-secondary badge-pill">0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Chottogram
            <span class="badge badge-secondary badge-pill">0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Rangpur
            <span class="badge badge-secondary badge-pill">4</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Sylhet
            <span class="badge badge-secondary badge-pill">0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Barishal
            <span class="badge badge-secondary badge-pill">0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Khulna
            <span class="badge badge-secondary badge-pill">0</span>
          </li>
        </ul>
      </div>

      <!-- modal -->

      <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Order Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-3">
                <input type="name" id="defaultForm-name" class="form-control validate" placeholder="Name" required>
                <label data-error="wrong" data-success="right" for="defaultForm-user"></label>
              </div>

              <div class="md-form mb-3">
                <input type="contact_number" id="defaultForm-number" class="form-control validate" placeholder="Contact Number" required>
                <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
              </div>

              <div class="md-form mb-3">
                <textarea rows="3" cols="55" placeholder="Requirement Summary" id="defaultForm-summary" class="form-control validate" required></textarea>
                <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
              </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-success" id="place_order">Place Order</button>
            </div>
          </div>
        </div>
      </div>

      <!-- php code goes here -->
      <div class="col-sm">
      <?php
      $db = mysqli_connect('localhost','root','','data');
      $id_list = [];
      $query = "SELECT * FROM preservation_centers";
      $operation = mysqli_query($db,$query);
      while($res = mysqli_fetch_assoc($operation)) {
        $name = $res['name'];
        $location= $res['location'];
        $ob = $res['ob'];
        $id = $res['id'];
        array_push($id_list,$id);
        if($ob) {
          $status = "available";
        }
        else {
          $status = "currently not available";
        }
         ?>


          <div class="card w-80">
            <div class="card-body">
              <div class="row">
                <div class="col">

                  <h5 class="card-title">Title: <?php echo($name) ?></h5>
                  <p class="card-text"><b>Location: </b><?php echo($location) ?>
                  <br>
                  <b>Online booking status: </b><?php echo("$status"); ?>
                  <br>
                  <b>Description: </b><br> <?php echo($res['description']); ?>
                  <br>
                  <b>Contact No: </b> <?php echo($res['contact']); ?>
                  <br>
                  <b>Website: </b> <?php echo($res['website']); ?>
                  <br>
                  </p>
                  <?php if($ob && isset($_SESSION['username'])) { ?>
                  <button class="btn btn-secondary" id="book" data-toggle="modal" data-target="#confirm">Booking a space</button>
                  <?php };  ?>
                </div>
              </div>
            </div>
          </div>
          <br>
      <?php } ?>
        </div>

    </div>
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

  document.getElementById('place_order').addEventListener("click",function() {
      if(document.getElementById("defaultForm-name").value=="" || document.getElementById("defaultForm-number").value=="" || document.getElementById("defaultForm-summary").value=="") {
        swal("please fill up the form");
      }
      else {
        swal("Your Booking has been confirmed.Authority will contact with you within 24 hours.\n Thank you.");
      }

    });




</script>
