<?php 
// function for diagnosis 
function saveDiagnosis(){
  if(isset($_POST['submit'])){
    $idNo = $_POST['idNo'];
    $symptoms = $_POST['symptoms'];
    $test = $_POST['test'];
    $diagnosis = $_POST['diagnosis'];
    $prescription = $_POST['prescription'];
    $fee = $_POST['fee'];



    require 'dbconn.php';
    $sql = "INSERT INTO diagnosis(patientIdNo, symptoms, test, diagnosis, prescription, fee, doctorId) VALUES (?,?,?,?,?,?,?)";
     $stmt = mysqli_prepare($conn,$sql); // checks correctness of the sql query

            if ($stmt){
              // bind parameters to the statement
              // the ? ? ? will be replaced by the parameter to be binded
              // inside the " " will be datatype if int - i, if sring -s and if double - d
              mysqli_stmt_bind_param($stmt, "issssii", $paramidNo, $paramsym, $paramtest,$paramdiag, $parampres, $paramfee, $paramdocid);

              $paramidNo = $idNo;
              $paramsym = $symptoms;
              $paramtest = $test;
              $paramdiag = $diagnosis;
              $parampres = $prescription;
              $paramfee  = $fee;
              $paramdocid = $_SESSION['id'];

              // Execute the query

              if(mysqli_stmt_execute($stmt)){
                echo $msg = "Diagnosis saved";

              } else {
                echo $msg = "An error occured";
              }
            } else{
              echo $msg = "There is an error with the query";
            }
            $conn->close(); // object oriented
          //mysqli_close($conn); // procedural

          } else {
    $msg = "unknown request";
  }
}

?>
<?php 
// Call the course registration function
saveDiagnosis();
?>

<!-- Start of diagnosis -->
<div class="tab-pane fade show active" id="nav-diag" role="tabpanel" aria-labelledby="nav-diag-tab">
  <div class="row">
      <!--Start of Course Registration Modal -->
      <form action="docDashboard.php" method="post" class="form-control" style="margin-top: 10px;">
          <div class="row">
              <div class="col-2"></div>
              <div class="col-8">

                  <h4 style="text-align: center; color: dodgerblue;">Patient Diagnosis</h4>

                  <center>
                  <img src="images\steth1.png" class="img-fluid" width="150px" height="150px">
                  </center>

                    <div class="row">
                        <div class="mb-3 col">
                            <label for="idNumber" class="form-label">ID. No</label>
                            <input type="text" class="form-control" id="idNo" aria-describedby="idNumber"
                                name="idNo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="descrption" class="form-label">Symptoms Description</label>
                            <textarea class="form-control" aria-label="With textarea" name="symptoms"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="descrption" class="form-label"> Tests Required</label>
                            <textarea class="form-control" aria-label="With textarea" name="test"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="descrption" class="form-label"> Diagnosis</label>
                            <textarea class="form-control" aria-label="With textarea"
                                name="diagnosis"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="descrption" class="form-label"> Prescription</label>
                            <textarea class="form-control" aria-label="With textarea"
                                name="prescription"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="fee" class="form-label">Consultation Charges</label>
                            <input type="text" class="form-control" id="fee" aria-describedby="fee" name="fee"
                                required>
                        </div>
                    </div>
                    <center>
                    <button type="submit" class="btn btn-primary" name="submit">Save Diagnosis</button>
                    </center>
              </div>
              <div class="col-2"></div>
          </div>
      </form>
  </div>
</div>