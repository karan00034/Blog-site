<?php
require("connect.php");
require("header.php");


?>



  <div class="container h-100" style="padding-left:40px; " >
    <div class=" justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;width:60%;text-align:center;">
          <div class="card-body p-md-5">
            <div  style="display:flex; justify-content:center; align-item:center;">
              <div class="col-md-10 col-lg-6 col-xl-5" >

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form action="registered.php" class="mx-1 mx-md-4" method="POST">

                  <div class=" align-items-center mb-4">
            
                    <div class="form-outline  mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="username" />
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class=" align-items-center mb-4">
                    
                    <div class="form-outline mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" style="width:100%"/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="align-items-center mb-4">
                    
                    <div class="form-outline mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" style="width:100%"/>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class=" align-items-center mb-4">
                    <div class="form-outline  mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="confirmpassword"  style="width:100%"/>
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                  <div class="form-check justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class=" justify-content-center mx-4 mb-3 mb-lg-4">
                   
<input type="submit" class="btn btn-primary btn-block mb-4" name="register" value="Signup">
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

require("footer.php");
