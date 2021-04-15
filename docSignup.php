<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php require 'topSection.php'; ?>

    <title>Doctor sign Up page</title>
  </head>
  <body style="background-color: rgb(200, 200, 200)">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

          <!--- Start of signup form-->
          <form action="docSignup.php" method="post" class="form-control" style="margin-top: 70px;">
            <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

            <h4 style="text-align: center;color: dodgerblue;">Doctor Sign Up</h4>

            <center><img src="images\doc1.png" class="img-fluid" width="150px" height="150px"></center>
            </div>
            <div class="col-2"></div>

            </div>
            <center><span style="text-align: center;"> Already have an account? <a href="docLogin.php">Doctor sign in</a></span></center>
            <div class="row">
            <div class="mb-3 col">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" name="fName" required>
            </div>
            <div class="mb-3 col">
              <label for="surname" class="form-label">Surname</label>
              <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
          </div>
          <div class="row">

              <div class="mb-3 col">
              <label for="idNo" class="form-label">ID Number</label>
              <input type="text" class="form-control" id="idNo" aria-describedby="idNo" name="idNo" required>
            </div>
              <div class="mb-3 col">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            </div>


            <div class="row">
            <div class="mb-3 col">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <div class="mb-3 col">
              <label for="exampleInputPassword2" class="form-label">Repeat Password</label>
              <input type="password" class="form-control" id="exampleInputPassword2" name="repeatPassword" required>
            </div>
          </div>

            <center><button type="submit" class="btn btn-primary" name="signup">Sign Up</button></center>
          </form>

          <?php 
          //signup
          if(isset($_POST['signup'])){
          $fName = $_POST['fName'];
          $surname = $_POST['surname'];
          $idNo = $_POST['idNo'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $repeatPassword = $_POST['repeatPassword'];
          if($password === $repeatPassword){

            // encrypt the password for security purposes
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);


          // lets store the data in our database
            require 'dbconn.php'; // file with DB connection


            $sql = "INSERT INTO doctors(email, password, fName, lName, idNo) VALUES (?,?,?,?,?)";
            // The question marks are place holders for our values to prevent sql injection.

            $stmt = mysqli_prepare($conn,$sql); // checks correctness of the sql query

            if ($stmt){
              // bind parameters to the statement
              // the ? ? ? will be replaced by the parameter to be binded
              // inside the " " will be datatype if int - i, if sring -s and if double - d
              mysqli_stmt_bind_param($stmt, "sssss", $paramemail, $parampassword,$paramfName,$paramsurname,$paramidNo);

              $paramemail = $email;
              $parampassword = $encryptedPassword;
              $paramfName = $fName;
              $paramsurname = $surname;
              $paramidNo = $idNo;

              // Execute the query

              if(mysqli_stmt_execute($stmt)){
                echo "Your account was created! Proceed to login";
                header("location:docLogin.php");

              } else {
                echo "An error occured";
              }
            } else{
              echo "There is an error with the query";
            }
            // close stmt
            $stmt->close(); // object oriented


            $conn->close(); // object oriented
            //mysqli_close($conn); // procedural

          } else {
          // Lets notify that password did not match
          echo "Password did not match";
           }
         }

        ?>

          
          <!-- End of signup form -->
        </div>
        <div class="2"></div>
      </div>
      
    </div>

    
    <?php require 'bottomSection.php';?>
  </body>
</html>