<?php
session_start();
?>
<?php 
// This is a logout functionality
//checking if the logout button has been clicked 
if (isset($_POST['logout'])){
  session_destroy();
  header("location:docLogin.php");
  echo "You are Logged out";

}
?>


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-diag-tab" data-bs-toggle="tab" data-bs-target="#nav-diag" type="button" role="tab" aria-controls="nav-diag" aria-selected="true"><span class="text-primary" id="fontStyle">Diagnosis</span></button>
        <button class="nav-link" id="nav-patients-tab" data-bs-toggle="tab" data-bs-target="#nav-patients"  type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="text-primary" id="fontStyle">Patients</span></button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="text-primary" id="fontStyle">Profile</span></button>
    <button class="nav-link" id="nav-new-tab" data-bs-toggle="tab" data-bs-target="#nav-new-patient" type="button" role="tab" aria-controls="nav-diag" aria-selected="true"><span class="text-primary" id="fontStyle">New Patient</span></button>

        <button class="btn" id="nav-logout-tab" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="nav-logout" aria-selected="false"><span class="text-primary"><?php echo "Logged in as Doc: ".$_SESSION['name']; ?></span></button>
    <form method="post">
	  <button type="submit" name ="logout" class="btn" id="nav-logout-tab" role="tab" aria-controls="nav-logout" aria-selected="false"><span class="text-primary">Logout</span></button>
    </form>

  </div>
</nav>
  <!-- Start of tab Content -->
  <div class="tab-content" id="nav-tabContent">
    <!-- Start of diagnosi -->
 <?php include( 'diagnosis.php');?>
      <!-- End of disgnosis -->

      <!-- Start of profile -->

  <?php include( 'profile.php');?>
        <!-- End of Profile -->
<!--Start of patients -->
<?php include( 'patients.php');?>
<!--End of patients -->
<!--Start of patients -->
<?php include( 'patientSignup.php');?>
<!--End of patients -->

</div> <!-- close  content div-->








