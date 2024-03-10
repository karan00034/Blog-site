<?php
require_once 'connect.php';
require_once 'header.php';

//echo '<h2 class="w3-container w3-teal">Login</h2>';

if (isset($_POST['log'])) {
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$username'";

    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);


    if ($row_count == 1 && password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("location: admin.php");
    } else {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Incorrect username or password.</div>";
    }
}
    ?>


  <div class="container h-100" style="padding:20px;text-align:center;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;width:70%;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form action="" class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="username" />
                      <label class="form-label" for="form3Example1c">Username</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password"/>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                   <!-- <button type="button" class="btn btn-primary btn-block" name="register" >Register</button>-->
<input type="submit" class="btn btn-primary btn-block mb-4" name="log" value="Login">
                  </div>
<div class="text-center">                                    <p>Not a member? <a href="register.php">Register</a></ p>                                                             </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Submit button 
  <input type="submit" class="btn btn-primary btn-block mb-4" name="log" value="Login">-->

  <!-- Register buttons 
  <div class="text-center">
    <p>Not a member? <a href="register.php">Register</a></p>
    </div>
-->
    <?php

Include("footer.php");
