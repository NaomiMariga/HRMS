
<?php 
// Display courses
function fetchPatients(){
  require 'dbconn.php';
  //Query the database
     // we will check email alone since it is set as a unique field in the database
    $sql = "SELECT * FROM patients";
    // prepare the query
    $result = mysqli_query($conn, $sql);

    if($result){
      $rows = mysqli_num_rows($result);

      if ($rows>0){

      while ($record = mysqli_fetch_assoc($result)) {
      
      $fName = $record['fName'];
      $lName = $record['lName'];
      $idNo = $record['idNo'];
      $email = $record['email'];


  echo "<tr><td>$fName</td><td>$lName</td><td>$idNo</td><td>$email</td><td><button class='btn btn-primary'>Edit</button></td><td><button class='btn btn-warning'\>Delete</button></td></tr>";
  } 
        

    }else{
      $msg = "No Patient found";
    }
  }else{

     $msg = "An error occured, check your request";

  }
  $conn->close();
  
}

?>

<div class="tab-pane fade" id="nav-patients" role="tabpanel" aria-labelledby="nav-diag-tab">
  <div class="row">
    <center><img src="images\therm2.png" class="img-fluid" width="100px" height="100px"><center>
    </center>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <table class="table table-striped">
          <th class="modalFont">Name</th><th class="modalFont">Surname</th><th class="modalFont">ID Number</th><th class="modalFont">Email</th><th></th><th></th>
        <?php fetchPatients()?>
        </table>
      </div>
      <div class="col-2"></div>
    </div>  
  </div>
</div>
