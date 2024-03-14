<?php
  include("../PhpProcess/DatabaseCon.php");
  $sqlUser = "SELECT * FROM user";
  $result = $con->query($sqlUser);
  if ($result->num_rows > 0) {
    $userAll = $result->num_rows;
  }

  $sqlOrderAll = "SELECT * FROM orders";
  $resultOrderAll = $con->query($sqlOrderAll);
  if ($resultOrderAll->num_rows > 0) {
    $orderAll = $resultOrderAll->num_rows;
  }
  //==================================


  $sqlOrderBuyYear = "SELECT *,SUM(rml_price) FROM raw_material_log 
  WHERE YEAR(rml_date) = YEAR(CURRENT_DATE) AND  rml_type='นำเข้า';";
  $resultOrderBuyYear = $con->query($sqlOrderBuyYear);
  if ($resultOrderBuyYear->num_rows > 0) {
    //$OrderBuyYear = $resultOrderBuyYear->num_rows;
    $OrderBuyYear = ($resultOrderBuyYear->fetch_assoc())["SUM(rml_price)"];
  }

  $sqlOrderBuyMon = "SELECT *,SUM(rml_price) FROM raw_material_log 
  WHERE MONTH(rml_date) = MONTH(CURRENT_DATE) AND YEAR(rml_date) = YEAR(CURRENT_DATE)
  AND  rml_type='นำเข้า';";
  $resultOrderBuyMon = $con->query($sqlOrderBuyMon);
  if ($resultOrderBuyMon->num_rows > 0) {
    $OrderBuyMon = ($resultOrderBuyMon->fetch_assoc())["SUM(rml_price)"];
  }

  $sqlOrderBuyDay = "SELECT *,SUM(rml_price) FROM raw_material_log 
  WHERE DATE_FORMAT(rml_date, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d')
  AND  rml_type='นำเข้า';";
  $resultOrderBuyDay = $con->query($sqlOrderBuyDay);
  if ($resultOrderBuyDay->num_rows > 0) {
    $OrderBuyDay = ($resultOrderBuyDay->fetch_assoc())["SUM(rml_price)"];
  }

  $sqlOrderAllBuy = "SELECT SUM(rml_price) FROM raw_material_log WHERE rml_type='นำเข้า';";
  $resultOrderAllBuy = $con->query($sqlOrderAllBuy);
  if ($resultOrderAllBuy->num_rows > 0) {
    $OrderBuyAll = ($resultOrderAllBuy->fetch_assoc())["SUM(rml_price)"];
  }


  //=================================

  $sqlOrderYear = "SELECT *,SUM(order_price) FROM orders WHERE YEAR(order_date) = YEAR(CURRENT_DATE);";
  $resultOrderYear = $con->query($sqlOrderYear);
  if ($resultOrderYear->num_rows > 0) {
    $orderYear = $resultOrderYear->num_rows;
    $OrderSellYear = ($resultOrderYear->fetch_assoc())["SUM(order_price)"];
  }

  $sqlOrderSellMon = "SELECT *,SUM(order_price) FROM orders 
  WHERE MONTH(order_date) = MONTH(CURRENT_DATE) AND YEAR(order_date) = YEAR(CURRENT_DATE);";
  $resultOrderSellMon = $con->query($sqlOrderSellMon);
  if ($resultOrderSellMon->num_rows > 0) {
    $OrderSellMon = ($resultOrderSellMon->fetch_assoc())["SUM(order_price)"];
  }

  $sqlOrderSellDay = "SELECT *,SUM(order_price) FROM orders 
  WHERE DATE_FORMAT(order_date, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d');";
  $resultOrderSellDay = $con->query($sqlOrderSellDay);
  if ($resultOrderSellDay->num_rows > 0) {
    $OrderSellDay = ($resultOrderSellDay->fetch_assoc())["SUM(order_price)"];
  }

  $sqlOrderAllsell = "SELECT SUM(order_price) FROM orders;";
  $resultOrderAllsell = $con->query($sqlOrderAllsell);
  if ($resultOrderAllsell->num_rows > 0) {
    $OrderSellAll = ($resultOrderAllsell->fetch_assoc())["SUM(order_price)"];
    // $orderYear = $resultOrderYear->num_rows;
  }

  $sqlOrderMonth = "SELECT MONTH(order_date) AS month, SUM(order_price) AS total_price
  FROM orders
  WHERE YEAR(order_date) = YEAR(CURRENT_DATE)
  GROUP BY MONTH(order_date);";
  $resultOrderMonth = $con->query($sqlOrderMonth);

  $sqlOrderMonthOld = "SELECT MONTH(order_date) AS month, SUM(order_price) AS total_price
  FROM orders
  WHERE YEAR(order_date) = YEAR(CURRENT_DATE)-1
  GROUP BY MONTH(order_date);";
  $resultOrderMonthOld = $con->query($sqlOrderMonthOld);

  $sqlOrderType = "SELECT menu.menu_type, GROUP_CONCAT(order_detail.order_detail_id) AS ids 
  FROM order_detail
  INNER JOIN orders ON orders.order_id = order_detail.order_id
  INNER JOIN cart ON order_detail.cart_id=cart.cart_id
  INNER JOIN menu ON cart.menu_id=menu.menu_id
  GROUP BY menu.menu_type;";
  $resultOrderType = $con->query($sqlOrderType);
  //$OrderType = $resultOrderType->fetch_array();
  //$row = $resultOrderType->fetch_array();
  //print_r($row[3]);
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    .well{
      background-color:rgb(127, 52, 1);
      color:white;
      border-radius:5px;
      padding:10px;
      box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
      margin-bottom:15px;
    }      
    .wellGr{
      padding:10px;
      box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
      margin-bottom:15px;
    }  
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
  <?php
    if ($resultOrderMonth->num_rows > 0) {

      while ($row = $resultOrderMonth->fetch_assoc()) {
        $total = $row["total_price"];
        $month = $row["month"];
        echo("<input type='hidden' name='monthSell' value='$total'/>");
      }


    }

    if ($resultOrderMonthOld->num_rows > 0) {

      while ($row = $resultOrderMonthOld->fetch_assoc()) {
        $total = $row["total_price"];
        $month = $row["month"];
        echo("<input type='hidden' name='monthSellOld' value='$total'/>");
      }


    }
    $cool =0;
    $hot = 0;
    $smoothie = 0;
    while($row = $resultOrderType->fetch_assoc()){
      if($row["menu_type"]==="ร้อน"){
        $num = explode(',', $row["ids"]);
        $hot = count($num);
      }
      if($row["menu_type"]==="เย็น"){
        $num = explode(',', $row["ids"]);
        $cool = count($num);
      }
      if($row["menu_type"]==="ปั่น"){
        $num = explode(',', $row["ids"]);
        $smoothie = count($num);
      }
      
    }
    echo("<input type='hidden' id='cool' value='$cool'/>");
    echo("<input type='hidden' id='hot' value='$hot'/>");
    echo("<input type='hidden' id='smoothie' value='$smoothie'/>");
  
  ?>

<div class="container-fluid" style="padding-right:20px;">
  <div class="row content">
    
    <div class="col-sm-12">
      <div class="">
        <h4>Dashboard</h4>
        <p>รายงานข้อมูล</p>
      </div>
      <!-- <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>จำนวนสมาชิกทั้งหมด</h4>
            <p><?php echo($userAll);?></p> 
          </div>
        </div>
        </div> -->
      <div class="row">
        

        <div class="col-sm-3">
          <div class="well">
            <h4>ยอดขายทั้งหมด</h4>
            <p><?php echo($OrderSellAll);?> บาท</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>ยอดขายปีนี้</h4>
            <p><?php echo($OrderSellYear);?> บาท</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>ยอดขายเดือนนี้</h4>
            <p><?php echo($OrderSellMon);?> บาท</p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>ยอดขายวันนี้</h4>
            <p><?php echo($OrderSellDay);?> บาท</p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>รายจ่ายทั้งหมด</h4>
            <p><?php echo($OrderBuyAll);?> บาท</p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>รายจ่ายปีนี้</h4>
            <p><?php echo($OrderBuyYear);?> บาท</p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>รายจ่ายเดือนนี้</h4>
            <p><?php echo($OrderBuyMon);?> บาท</p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>รายจ่ายวันนี้</h4>
            <p><?php echo($OrderBuyDay);?> บาท</p>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="wellGr">
            <h4>ยอดขาย (บาท)</h4>
            <canvas id="yearSell" style="width:100%;"></canvas>
            <div class="row justify-content-center align-items-center">
              <div style="margin-right:10px;padding:0;background-color:red;width:10px;height:10px;"></div>
              ปีนี้
            </div>
            <div class="row justify-content-center align-items-center">
              <div style="margin-right:10px;padding:0;background-color:green;width:10px;height:10px;"></div>
              ปีที่แล้ว
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="wellGr" style="height:96%;">
            <h4>ประเภทเมนู</h4>
            <canvas id="ratio" style="width:100%;"></canvas>
          </div>
        </div>
        <!-- <div class="col-sm-4">
          <div class="wellGr">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div> -->
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
   
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
