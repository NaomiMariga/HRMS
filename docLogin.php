  <?php
          // collecting form data for login
          if(isset($_POST['login'])){
            $email = $_POST['email'];
            $pass = $_POST['password'];

            // connect to database
            require 'dbconn.php';

            //Query the database
             // we will check email alone since it is set as a unique field in the database
            $sql = "SELECT * FROM doctors WHERE email=?";
            // prepare the query
            $stmt = mysqli_prepare($conn, $sql);

            if($stmt){

              // bind the parameters 
            mysqli_stmt_bind_param($stmt, 's', $paramemail);

            $paramemail = $email;
            
            //execute the query
            mysqli_execute($stmt);

            // Getting the results
            $result = mysqli_stmt_get_result($stmt);


            if($result){
              $rows = mysqli_num_rows($result);

              if ($rows>0){
              $record = mysqli_fetch_assoc($result);
              $dbPassword = $record['password'];
              $fName = $record['fName'];
              $fName = $record['fName'];
              $id = $record['doctorId'];

              // Verify the password 
              $verified = password_verify($pass, $dbPassword);
              if ($verified) {
                session_start();
                // store the session
                $_SESSION['name'] = $fName;
                $_SESSION['id'] = $id;

              $msg = "Welcome Doc".$fName;
              header('location:docDashboard.php');
              }else{
                $msg = "Wrong Credentials";

              } 

            }else{
              $msg = " User not found";
            }
          }else{

             $msg = "An error occured, check your request";

          }
        }else{
            $msg = "An error occured";
          }
          $conn->close();
      }

      ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php require 'topSection.php'; ?>

    <title>Doctor sign in page</title>
  </head>
  <body style="background-color: rgb(200, 200, 200)">
      <div class="container-fluid" 
      >
      <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
          <!--- Start of sign in form-->
          <form style="margin-top: 70px;" class="form-control" method="post" action="docLogin.php">
            <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

          <h4 style="text-align: center;color: dodgerblue;">Doctor Sign In</h4>

          <center><img src="images\doc2.png" class="img-fluid" width="150px" height="150px"></center>
        </div>
          <div class="col-2"></div>

        </div>

          	<center><span> No account? <a href="docSignup.php">Doctor Sign up</a></span>
              <h5 style="color: red;"> <?php //echo $msg;?></h5></center>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <center><button type="submit" class="btn btn-primary" style="align-content: center;" name="login">Login</button></center>
          </form>
          <!-- End of sign in form -->     
      </div>
      <div class="col-2"></div>
      </div>
      
    <?php require 'bottomSection.php';?>

    </div>
  </body>
</html>