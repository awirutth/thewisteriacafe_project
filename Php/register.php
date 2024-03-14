<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../StyleCss/authCss/login.css"/>
  </head>
  <body>
    <?php  include_once("navbar.php"); ?>
        <div class="MainCon">
            <div class="container p-5">
            <div class="row">
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <div class="w-75 ">
                        <p class="display-2">The Wisteria</p>
                        <p>Description description description description description description
        description description.</p>

                    </div>
                    
                </div>


                <div class="loginCard col-md-5 bg-white border border-2 border-dark p-3 py-5" >
                    <p class="login-head text-center display-6"><strong>Register</strong></p>
                    <form method="POST" action="../PhpProcess/auth/register.php">
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

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">ยืนยันรหัสผ่าน</label>
                            <input type="password" 
                            name="passwordCon"
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
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>