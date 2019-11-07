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
    <script src = "scripts/modal_login.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


  <!-- navigation bar -->

  <?php include("header.php"); ?>

  <!-- carousel item -->

  <div id="slides" class="carousel slide" data-ride="carousel">
    <ul class = "carousel-indicators">
      <li data-target="#slides" data-slide-to="0" class="active"></li>
      <li data-target="#slides" data-slide-to="1"></li>
      <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/one.jpg">
        <div class="carousel-caption">
          <h1 class="display-2">Krishoker Haat</h1>
          <h3>A web platform for farmers,buyers and everyone</h3>
          <a href="products.php"><button type="button" class="btn btn-outline-light btn-lg">Trading</button></a>
          <a href="equipments.php"><button type="button" class="btn btn-primary btn-lg">Equipments</button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/two.jpg">
      </div>
      <div class="carousel-item">
        <img src="images/three.jpg">
      </div>
    </div>
  </div>

  <!-- Jumbotron -->

  <div class="container-fluid" id="login_content" style="display: none;">
    <div class="row jumbotron">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <p class="lead">Hello <?php echo($_SESSION['username']); ?>, Welcome to KrishokerHaat.com. Now you are able to create your
        advertise about your equipment or product or both.</p>
        <ul>
          <li><a href="#">Equipments rental section.</a></li>
          <li><a href="products.php">Products buy/sell section.</a></li>
          <li><a href="history.php">Manage Profile</a></li>
        </ul>
      </div>
      <div class="col" style="padding-top:50px;">
        <a href="index.php?logout='1'"><button class='btn btn-default btn-rounded mb-4 btn-danger'>Log Out</button></a>
      </div>

    </div>
  </div>



  <div class="container-fluid" id="content">
    <div class="row jumbotron">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <p class="lead">Welcome to KrishokerHaat. To access full feature you have to register/sign in here. </p>
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

  <!-- content  -->

  <!--welcome section -->
  <div class="container-fluid padding">
    <div class="row welcome text-center">
      <div class="col-12">
        <h1 class="display-4">Welcome To krishoker haat!.</h1>
        </div>
      <hr>
      <div class="col-12">
        <p class="lead">This is a web based platform specially for farmers for
          buying and selling crops and renting Equipments.Here the users can:</p>
          <div style="text-align:left;padding-left:15%;">
            <li>Buy & Sell Products</li>
            <li>Rent Modern Equipments</li>
            <li>Consulting with Egri engineers through admins</li>
            <li>Book preservation center</li>
            <li>Acknowledge about Smart Farming,Technology & Current Market</li>
          </div>
      </div>
    </div>
  </div>
  <div class="container-fluid padding">
    <div class="row text-center padding">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Equipments Renting.</h3>
        <p>Can easily take agricultural equipments on rent using this website</p>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Trading</h3>
        <p>Can sell their crops or buy/sell seeds with eligible price</p>
      </div>
      <div class="col-sm-12 col-md-4">
        <h3>Informations</h3>
        <p>Informations about Preservation Center, Govt. Projects, Current Rate etc</p>
      </div>
    </div>
    <hr class="my-4">
  </div>

  <!--two column section-->
<div class="container-fluid padding">
  <div class="row padding">
    <div class="col-md-12 col-lg-6">
      <h3>Our Philosophy</h3>
      <p> Technology has made inroads into almost all spheres of life, but sadly, Bangladesh’s vast agricultural sector has a severe lack of it.
        Less than 20% of our farmers use the necessary equipment that facilitates productive and profitable work.Bangladesh primarily consists
        of small and medium landholding farmers who look to rent equipment, usually on an hourly basis.Small and marginal land holding farmers,
        who constitute 85 percent of farmers’ population in Bangladesh, were not taking interest in purchasing such tools and, hence, not able
        to draw any mechanical help.</p> </b>

        <p>According to a FICCI report Transforming Agriculture through Mechanisation, released in December 2015, farm mechanisation in
        India is 40 percent, 95 percent in the US and Western Europe, 80 percent in Russia, 75 percent in Brazil and 48 percent in China.</p></b>

        <p>But after surveying, we noticed that where equipments were being used for farming, they were used for a small period of time.
        Farmers who owned such tools utilised them for less than 2-3 weeks in each season; and the rest of the time they lay idle.
        From that we come with a thought that why not bring the idle equipments to the use of other farmers who didn’t have any!!</p></br>
        <p>Our vision is to make agriculture profitable for vulnerable farmers.It aims to raise the level of mechanization in farming through
        the power of technology and a strong franchisee network to make farm mechanization easily accessible, affordable and reachable to
        farmers across BD.  </p>
        <br>
<a href="#" class="btn btn-primary">Learn More</a>
    </div>
    <br>
    <div class="col-lg-6">
      <img src="images/sider.jpg" class="img-fluid">
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

</script>
