<!-- Start of profile -->

<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <form action="patientHeader.php" method="post" class="form-control" style="margin-top: 10px;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <center>
                <h4 style="text-align: center;color: dodgerblue;">Change Password</h4>
                <img src="images\prof1.png" class="img-fluid" width="150px" height="150px">
                </center>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="exampleInputPassword3" class="form-label">Current Password</label>
                                    <input type="email" class="form-control" id="exampleInputPassword3"
                                        aria-describedby="emailHelp" name="currentPassword" required>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password" required>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="exampleInputPassword2" class="form-label">Repeat Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2"
                                            name="repeatPassword" required>
                                    </div>
                                </div>
                                <center><button type="submit" class="btn btn-primary" name="signup">Save New Password</button></center>
                            </div>
                            <div class="col-2"></div>
            </div>

    </form>

</div>
<!-- End of Profile -->