<?php include("backends/logout.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question Answer Section</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw"> </script>
    <script src = "scripts/captcha.js"></script>
    <script src="scripts/query.js"></script>
    <script src = "scripts/modal_ans.js"></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body style="background-color:#E8ECEF">

<!-- navigation -->
  <?php include("header.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 register">
          <h2>Have Any query?</h2>
          <form action="backends/action.php" method="post">
            <div class="form-group">
              <textarea rows="3" cols="55" name="question" placeholder="Question"></textarea>
            </div>
            <?php
              $u_id = 0;
              if(isset($_SESSION['user_id'])) {
                $u_id = $_SESSION['user_id'];
                ?>
                <input type="hidden" name=u_id value="<?php echo($u_id); ?>">
                <?php
              }
              else {
                ?>
                <input type="hidden" name=u_id value="<?php echo($u_id); ?>">
                <?php
              }

            ?>
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
            <input type="hidden" name="action" value="validate_captcha">
            <button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
          </form>
        </div>
      <div class="col-md-6">
        <div class="terms">
            <h3>Have a Glance!</h3>
            <li>Please have a look on previous asking questions.Those may help you!</li>
            <li>Try not to ask the same questions.</li>
            <li>You can also ask any question regarding our website and services.</li>
            <button type="button" id="first_btn" class="btn btn-danger">Show Pending Queries</button>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
  <div class="container">
    <!-- Modal from -->

    <div class="modal fade" id="modal_ans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Answer Submission</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="qid" id="defaultForm-qid" class="form-control validate" placeholder="Question ID">
            </div>

            <div class="md-form mb-4">
              <input type="ans" id="defaultForm-ans" class="form-control validate" placeholder="Answer">
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-primary" id="submit">Submit</button>
          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-12 question">
        <div id="pending" style="display:none;">
          <h3>Pending Questions:</h3>
            <?php
              $conn = new mysqli("localhost", "root", "", "data");
              $sql = "SELECT * FROM qa";
              $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                while($row = $result->fetch_assoc()) {
                  if(empty($row['answer'])) {
                  echo(
                    "<li>Question id = " . $row["id"]. "<br>  Question: " .$row["question"] . "</li><br>"
                  );
                }
                }
              }
             echo("<br>");
             if(isset($_SESSION['admin'])) {
               ?>
              <button type="button" id="ans_btn" class="btn btn-success" data-toggle="modal" data-target="#modal_ans">Submit Answer</button>
              <?php
             }
             ?>
             <button type="button" id="second_btn" class="btn btn-secondary">Hide</button>
        </div>
        <br>
        <h3>Top Questions:</h3>
              <?php
                $conn = new mysqli("localhost", "root", "", "data");
                $sql = "SELECT * FROM qa";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc()) {
                    if(!empty($row['answer'])) {
                    echo(
                      "<li><b>" . $row["question"] . "</b></li><br>"
                      . "<p><b>Answer:</b>" . $row["answer"] . "</p><br>"
                    );
                  }
                  }
                }
               ?>







  </div>
    </div>
      </div>

      <!--connect-->
      <?php include("footer.php"); ?>
 </body>
</html>
