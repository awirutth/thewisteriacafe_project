<?php
    $page = "";
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }
    if(!isset($_GET['page'])){
       
        if($_SESSION['user_role']=="admin" ){
            header("Location:./admin_page.php?page=admin_dashboard");
        }else{
            header("Location:admin_page.php?page=admin_menu_manage");
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../StyleCss/adminCss/adminCss.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../Javascript/sideBarFunc.js"></script>
    <script src="../Javascript/functions.js"></script>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i style="color:rgb(127, 52, 1);" class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <input id="page" type="hidden" name="" value="<?php echo($page);?>">
    <div style="" class="l-navbar sideBar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" style="font-family: var(--body-font);" class="nav_logo">
                    <i class='nv-icon bx bx-layer nav_logo-icon'></i>
                    <span class="nv-name nav_logo-name">The Wisteria</span>
                </a>
                <div class="nav_list">
                    <?php
                        session_start();
                        if(isset($_GET["logout"])){
                            session_destroy();
                            header("location:./login.php");
                          }
                        $user_id = $_SESSION["user"];
                        $user_role = $_SESSION["user_role"];
                        if($user_role == "admin"):
                    ?>
                    
                    <a onclick="onChangeMenu('admin_menu_manage')" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">จัดการเมนู</span>
                    </a>
                    <a onclick="onChangeMenu('admin_promotion_manage')" class="nav_link">
                        <i class='bx bx-star nav_icon'></i>
                        <span class="nav_name">จัดการโปรโมชั่น</span>
                    </a>
                    <a onclick="onChangeMenu('admin_emp_manage')" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">ข้อมูลพนักงาน</span>
                    </a>
                    <a onclick="onChangeMenu('admin_order_manage')" class="nav_link">
                        <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">ออเดอร์</span>
                    </a>
                    <a onclick="onChangeMenu('admin_mtr_manage')" class="nav_link">
                        <i class='bx bx-list-ul nav_icon'></i>
                        <span class="nav_name">จัดการวัตถุดิบ</span>
                    </a>
                    <a onclick="onChangeMenu('admin_mtr_list')" class="nav_link">
                        <i class='bx bx-notepad nav_icon'></i>
                        <span class="nav_name">รายงานวัตถุดิบ</span>
                    </a>
                    <a onclick="onChangeMenu('admin_dashboard')" class="nav_link ">
                        <i class='bx bx-line-chart nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <?php elseif($user_role == "employee"): ?>
                        <a onclick="onChangeMenu('admin_menu_manage')" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">จัดการเมนู</span>
                        </a>
                        <a onclick="onChangeMenu('admin_order_manage')" class="nav_link">
                            <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">ออเดอร์</span>
                        </a>
                        <a onclick="onChangeMenu('emp_user_manage')" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">ข้อมูลลูกค้า</span>
                    </a>

                    <?php  endif ?>
                    <!-- <a href="#" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Files</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span>
                    </a> -->
                </div>
            </div>
            <a href="./admin_page.php?logout=1" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">ออกจากระบบ</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="MainContent" id="MainContent">
      
    </div>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>