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


  $sql = "INSERT INTO patients(email, password, fName, lName, idNo) VALUES (?,?,?,?,?)";
  // The question marks are place holders for our values to prevent sql injection.

  $stmt = mysqli_prepare($conn,$sql); // checks correctness of the sql query

  if ($stmt){
    // bind parameters to the statement
    // the ? ? ? will be replaced by the parameter to be binded
    // inside the " " will be datatype if int - i, if sring -s and if double - d
    mysqli_stmt_bind_param($stmt, "ssssi", $paramemail, $parampassword,$paramfName,$paramsurname, $paramidNo);

    $paramemail = $email;
    $parampassword = $encryptedPassword;
    $paramfName = $fName;
    $paramsurname = $surname;
    $paramidNo = $idNo;

    // Execute the query

    if(mysqli_stmt_execute($stmt)){
      echo "Patient account was created! ";
      header("location:patients.php");
    } else {
      echo "An error occured";
    }
  } else{
    echo "There is an error with the query";
  }
  $conn->close(); // object oriented
//mysqli_close($conn); // procedural

} else {
// Lets notify that password did not match
echo "Password did not match";
  }
}

?>


<div class="tab-pane fade" id="nav-new-patient" role="tabpanel" aria-labelledby="nav-new-patient-tab">
  <div class="row">
      <div class="col-2"></div>
      <div class="col-8">

        <!--- Start of signup form-->
        <form action="patientSignup.php" method="post" class="form-control" style="margin-top: 10px;">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">

                    <h4 style="text-align: center;color: dodgerblue;">Patient Sign Up</h4>

                    <center><img src="images\steth1.png" class="img-fluid" width="150px" height="150px"></center>
                </div>
                <div class="col-2"></div>

            </div>
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
                    <label for="idNumber" class="form-label">ID. No</label>
                    <input type="text" class="form-control" id="idNo" aria-describedby="idNumber"
                        name="idNo" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                        required>
                </div>
                <div class="mb-3 col">
                    <label for="exampleInputPassword2" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2"
                        name="repeatPassword" required>
                </div>
            </div>

            <center><button type="submit" class="btn btn-primary" name="signup">Add Patient</button>
            </center>
        </form>
        <!-- End of signup form -->
      </div>
      <div class="col-2"></div>
  </div>

</div>