<?php
  session_start();
  if(isset($_GET["logout"])){
    session_destroy();
    header("location:./login.php");
  }
?>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- เข้าเว็บ cdnjs font awesome -->
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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
        <!-- From Sign In -->
        <div id="form-signin">
        
          <form method="POST" action="../PhpProcess/auth/login.php">
            <!-- <h3 class="title-text-Profile">ข้อมูลส่วนตัว</h3> -->
            <div class="box-Profile-Icon">
              <img src="../Img/Profileuser/ProfileUser.png" alt="" height="70">
            </div>
            <div class="box-Profile">
              <div class="Profile-title">
                  <span>ข้อมูลส่วนตัว</span>
              </div>

              <?php
                include("../PhpProcess/DatabaseCon.php");
                $user = $_SESSION["user"];
                $sql = "SELECT * FROM user WHERE user_id=$user";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
              ?>
              <div class="Profile-data">
                  <span class="Profile-data-span">ชื่อ - นามสกุล: <?php echo($row["name"]);?></span>
                  <span class="Profile-data-span">ชื่อผู้ใช้: <?php echo($_SESSION["user_name"]); ?> </span>
                  <span class="Profile-data-span">อีเมล: <?php echo($_SESSION["user_email"]); ?> </span>
                  <span class="Profile-data-span">เบอร์: <?php echo($row["user_tel"]);?></span>
              </div>
            </div>

            <div class="box-Profile-EditProfile">
            <button type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="w-100 box-Profile-EditProfile">
              <span><i class="fa-regular fa-pen-to-square"></i> แก้ไขข้อมูลส่วนตัว</span>
            </div>
            </button>



              <div class="box-Profile-ChangePassword">
              <button type="button" data-bs-toggle="modal"
                data-bs-target="#ModalPassword" data-bs-whatever="@mdo" class="w-100 box-Profile-ChangePassword">
                <span><i class="fa-solid fa-unlock"></i> เปลี่ยนรหัสผ่าน</span>
              </div>
              </button>

            <div class="input-field btn-logout">
                <a href="./ProfilePage.php?logout=1" class="btn-submit" type="button">ออกจากระบบ</a>
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
      </div>
      <!--  -->
    </div>
    <div class="modal fade" id="ModalPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../PhpProcess/systemProcess/updatePassword.php" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">รหัสผ่านเดิม:</label>
                                    <input required name="password" type="password" class="form-control" id="recipient-name">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">รหัสผ่านใหม่:</label>
                                    <input required name="NewPassword" type="password" class="form-control" id="recipient-tel">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ยืนยันรหัสผ่านใหม่:</label>
                                    <input required name="ConNewPassword" type="password" class="form-control" id="recipient-tel">
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button style="background-color: #857379;border:none;" type="submit"
                                    class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขข้อมูล</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../PhpProcess/systemProcess/updateProfile.php" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ชื่อ:</label>
                                    <input value="<?php echo($row["name"]);?>" required name="name" type="text" class="form-control" id="recipient-name">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">เบอร์โทร:</label>
                                    <input value="<?php echo($row["user_tel"]);?>" required name="tel" type="Tel" class="form-control" id="recipient-tel">
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button style="background-color: #857379;border:none;" type="submit"
                                    class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="../Javascript/script.js"></script>
  </body>
</html>