<?php
session_start();
?>
<?php 
// This is a logout functionality
//checking if the logout button has been clicked 
if (isset($_POST['logout'])){
  session_destroy();
  header("location:patientLogin.php");
  echo "You are Logged out";

}
?>
<!--<div class="toast align-items-center bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
  $
  <?php //echo $msg; ?>
   </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>-->
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-last-diagnosis" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><span class="text-primary">Last Diagnosis<span class="text-primary"></button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="text-primary">Profile<span class="text-primary"></button>
    <button class="nav-link" id="nav-grades-tab" data-bs-toggle="tab" data-bs-target="#nav-appointment" type="button" role="tab" aria-controls="nav-grades" aria-selected="false"><span class="text-primary">Book Appointment<span class="text-primary"></button>
    <button class="nav-link" id="nav-units-tab" data-bs-toggle="tab" data-bs-target="#nav-all-diagnosis" type="button" role="tab" aria-controls="nav-units" aria-selected="false"><span class="text-primary"> All Diagnosis<span class="text-primary"></button>
    <button class="btn" id="nav-logout-tab" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="nav-logout" aria-selected="false"><span class="text-primary"><?php echo "Logged in as ".$_SESSION['name']; ?><span class="text-primary"></button>
    <form method="post">
	  <button type="submit" name ="logout" class="btn" id="nav-logout-tab" role="tab" aria-controls="nav-logout" aria-selected="false"><span class="text-primary"><span class="text-primary">Logout<span class="text-primary"></button>
    </form>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-last-diagnosis" role="tabpanel" aria-labelledby="nav-home-tab">
    <?php 
// Display diagnosis
function fetchDiagnosis(){
  require 'dbconn.php';
  //Query the database
     // we will check email alone since it is set as a unique field in the database
  $idNo = $_SESSION['idNo'];
    $sql = "SELECT * FROM diagnosis WHERE patientIdNo = $idNo";
    // prepare the query
    $result = mysqli_query($conn, $sql);

    if($result){
      $rows = mysqli_num_rows($result);

      if ($rows>0){

      while ($record = mysqli_fetch_assoc($result)) {
      
      $symptoms = $record['symptoms'];
      $test = $record['test'];
      $diagnosis = $record['diagnosis'];
      $prescription = $record['prescription'];
      $charges = $record['fee'];


  echo "<tr><td>$symptoms</td><td>$test</td><td>$diagnosis</td><td>$prescription</td><td>$charges</td><td><button class='btn btn-warning'\>Delete</button></td></tr>";
  } 
        

    }else{
      $msg = "No history found";
    }
  }else{

     $msg = "An error occured, check your request";

  }
  $conn->close();
  
}

?>
  <div class="row">
  <center><img src="images\therm2.png" class="img-fluid" width="100px" height="100px"><center>
  </center>
  <div class="row">
  <div class="col-2"></div>
  <div class="col-8">
  <table class="table table-striped">
    <th class="modalFont">Symptoms</th><th class="modalFont">Test</th><th class="modalFont">Diagnosis</th><th class="modalFont">Prescription</th><th class="modalFont">Consultation Charges</th><th></th>
<?php fetchDiagnosis();?>
<tr><?php //echo $msg; ?></tr>
</table>
</div>
  <div class="col-2"></div>

</div>
</div>
</div>


<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <form action="patientHeader.php" method="post" class="form-control" style="margin-top: 10px;">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

            <center><h4 style="text-align: center;color: dodgerblue;">Change Password</h4>
            <p style="color:red;"> For first time user, use 12345 as your current password</p></center>


            <center><img src="images\prof1.png" class="img-fluid" width="150px" height="150px"><center>

            <div class="row">
            <div class="mb-3">
              <label for="exampleInputPassword3" class="form-label">Current Password</label>
              <input type="email" class="form-control" id="exampleInputPassword3" aria-describedby="emailHelp" name="currentPassword" required>
            </div>
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
            <center><button type="submit" class="btn btn-primary" name="signup">Save New Password</button></center>
            </div>
            <div class="col-2"></div>
          </div>

          </form>
  </div>


  <div class="tab-pane fade" id="nav-appointment" role="tabpanel" aria-labelledby="nav-appointment-tab">Appointment</div>
  <div class="tab-pane fade" id="nav-all-diagnosis" role="tabpanel" aria-labelledby="nav-all-diagnosis-tab">All Diagnosis</div>
</div>


