<?php include("backends/reg_server.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>User Registration</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/reg_style.css">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw"> </script>
    <script src = "scripts/captcha.js"></script>
  </head>
  <body>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
            <div class="register-left">
              <img src="images/logo.png">
              <h3>Join Us</h3>
              <p>Largest Platform For Renting Agri-Equipments,Buying-Selling crops Direct From Holder</p>
              <button type="button" class="btn btn-primary">About Us</button>
            </div>
            </div>

            <div class="<col-md-6 register-right">
              <h2>Register Here</h2>
              <form  method="post" action="registration.php">
              <div class="register-form">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Name" required>
                  <span id="usr" class="text-danger font-weight-bold"> </span>
                </div>
                <div class="form-group">
                  <input type="phone number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                  <span id="phn" class="text-danger font-weight-bold"> </span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="location" placeholder="Location" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email(optional)">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_1" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_2" placeholder="Confirm Password" required>
                  <span id="pswd" class="text-danger font-weight-bold"> </span>
                </div>
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>



</body>
</html>

<script type="text/javascript">
  var number_of_err = <?php echo(count($errors)) ?>;
  console.log(number_of_err);
  if(number_of_err>0) {
    var errors = <?php echo(json_encode($errors)) ?>;
    console.log(errors);
    for(var i=0;i<number_of_err;i++) {
      if(errors[i]=="pswd") {
        document.getElementById('pswd').innerHTML =" ** Please check that you've entered and confirmed your password";
      }
      if(errors[i]=="len") {
        document.getElementById('usr').innerHTML =" ** Username lenght must be between  4 and 10";
      }
      if(errors[i]=="plen") {
        document.getElementById('pswd').innerHTML =" ** Password must contain at least six characters";
      }
      if(errors[i]=="num") {
        document.getElementById('phn').innerHTML =" ** Invalid phone number";
      }
      if(errors[i]=="usrex") {
        document.getElementById('usr').innerHTML =" ** Username exists";
      }
      if(errors[i]=="px") {
        document.getElementById('phn').innerHTML =" ** Contact number exists";
      }
    }
  }
</script>
