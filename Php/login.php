<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- CSS - Navbar -->
    <link rel="stylesheet" href="../StyleCss/navbarCss/navbar.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="../StyleCss/loginCss/login.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="../StyleCss/authCss/login.css"/> -->
  </head>
  <body>
    <!--=== Navbar ===-->
    <?php  $page='user-profile'; include_once("../navbar.php"); ?>


        <!-- <div class="MainCon">
            <div class="container p-5">
            <div class="row ">
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <div class="w-75 ">
                        <p class="display-2">The Wisteria</p>
                        <p>Description description description description description description
        description description.</p>
                        <button class="btn btn-outline-light">about us</button>

                    </div>
                    
                </div>


                <div class="loginCard col-md-5 bg-white border border-2 border-dark p-3 py-5" >
                    <p class="login-head text-center display-6"><strong>Login</strong></p>
                    <form method="POST" action="../PhpProcess/auth/login.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="mobile" 
                            name="mobileNum"
                            class="form-control" id="mobileNum" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">รหัสผ่าน</label>
                            <input type="password" 
                            name="password"
                            class="form-control" id="password">
                        </div>
        
                        <button type="submit" class="btn btn-secondary w-100 ">Submit</button>
                        <p class="text-center">หรือ</p>
                        <button type="submit" class="btn btn-danger w-100 mb-1 ">Submit</button>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                </div>
            </div>
            </div>
        </div> -->
        <div class="container-signin">
      <div class="form-box">
        <h1 id="title">เข้าสู่ระบบ</h1>
        <!-- From Sign In -->
        <div id="form-signin">
          <form method="POST" action="../PhpProcess/auth/login.php">
            <div class="input-group">
              <!-- Input Email -->
              <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                <input name="email" type="text" placeholder="อีเมล หรือเบอร์โทร" />
              </div>
              <!-- Input Password -->
              <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input name="password" type="password" placeholder="รหัสผ่าน" />
              </div>
              <!--  -->
              <p><a href="forgot_pass.php">ลืมรหัสผ่าน</a></p>
              <div class="input-field">
                <button class="btn-submit" type="submit">เข้าสู่ระบบ</button>
              </div>
            </div>
          </form>
        </div>
        <!-- ================================================================================== -->
        <!-- Form Sign Up -->
        <div id="form-signup" style="overflow-y: auto;" >
          <form  method="POST" action="../PhpProcess/auth/register.php">
            <!-- Input Name -->
            <div class="input-group">
              <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input name="name" type="text" placeholder="ชื่อผู้ใช้" required />
              </div>
              <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input name="nameFull" type="text" placeholder="ชื่อ-นามสกุล" required />
              </div>
              <div class="input-field">
                <i class="fa-solid fa-phone"></i>
                <input name="Tel" type="text" placeholder="เบอร์โทรศัพท์" required />
              </div>
              <!-- Input Email -->
              <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                <input name="email" type="text" placeholder="อีเมล" required />
              </div>
              <!-- Input Password -->
              <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input name="password" type="password" placeholder="รหัสผ่าน" required />
              </div>
              <!-- Input cofirm Password -->
              <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input name="passwordCon" type="password" placeholder="ยืนยันรหัสผ่าน" required />
              </div>
              <!--  -->
              <div class="input-field">
                <button class="btn-submit" type="submit">ลงทะเบียน</button>
              </div>
            </div>
          </form>
        </div>
        <!-- ================================================================================== -->
        <!-- button to show div form -->
        <div class="btn-field">
          <button type="button" id="signinBtn">เข้าสู่ระบบ</button>
          <button type="button" id="signupBtn" class="disable">ลงทะเบียน</button>
        </div>
      </div>
      <!--  -->
    </div>



    
    <script src="../Javascript/script.js"></script>
  </body>
</html>