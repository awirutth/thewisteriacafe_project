<body style="color: #857379;">
    
</body>

<?Php

if(isset($_GET['id'])){
    include("../DatabaseCon.php");
//ประกาศตัวแปรรับค่าจาก param method get
$id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id=$id";
if($con->query($sql)){

//  sweet alert 
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "../../Php/admin_page.php?page=admin_emp_manage"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../Php/admin_emp_manage.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
} //isset

?>
