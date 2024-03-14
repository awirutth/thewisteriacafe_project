<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../StyleCss/authCss/login.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../Javascript/functions.js"></script>

    <style>
        :root {
            --color-primary: #0056b3;
            /* Your primary color */
        }

        .section-header {
            text-align: center;
            padding: 30px 0;
            position: relative;
        }

        .card-body h5 {
            color: #001973;
        }

        .section-header h2 {
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            color: #001973;
            position: relative;
            z-index: 2;
            display: inline-block;
            /* To wrap the :after element tightly */
            margin-bottom: 0;
            /* Remove the default margin */
        }

        .section-header h2:after {
            content: "";
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: var(--color-primary);
            left: 50%;
            /* Center the line */
            transform: translateX(-50%);
            /* Precisely center the line */
            bottom: -10px;
            /* Adjust the position as needed */
        }

        /* .search-form {
            border-radius: 10px;
            background-color: #857379;
            padding: 20px;
            display: flex;
        } */

        .search-form input[type="text"] {
            flex-grow: 1;
            /* Allows input to expand and fill space */
            margin-right: 10px;
            /* Adds spacing between input and button */
        }

        .search-form button {
            background-color: #ff545a;
            color: white;
        }

        /* Hover state for button */
        .search-form button:hover {
            background-color: #ff545a;
            color: white;
        }

        /* .box {
            width: 100%;
            margin: auto;
            margin-top: 10px;
            กำหนดระยะห่างด้านบนและล่าง 20px และ กึ่งกลางตามแนวนอน
            border: 1px solid rgba(0, 0, 0, 0.175);
            border-radius: 5px;

            background-color: #fff;

            padding: 1rem;
        } */

        #myTable thead th {
            background-color: #857379;
            color: #fff;
            /* White text */
        }


        /* Adjust the tbody rows if needed */
        #myTable tbody tr td {
            padding-left: 13px;
            /* Add any other styles like padding or font-size as needed */
        }

        .dataTables_filter {
            display: none;
        }
    </style>
</head>

<body>
    <div class="mt-5">


        <div class="container contentCon">
            <!-- <div class="section-header">
                <h2>ข้อมูลพนักงาน</h2>

            </div> -->

            <button type="button" class="btn btn-dark btn-lg my-3 adminBackground" data-bs-toggle="modal"
                data-bs-target="#exampleModal" data-bs-whatever="@mdo">เพิ่มวัตถุดิบ</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มวัตถุดิบ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../PhpProcess/adminProcess/insertmtr.php" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ชื่อวัตถุดิบ:</label>
                                    <input required name="name" type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ราคา:</label>
                                    <input required name="price" type="number" class="form-control"
                                        id="recipient-price">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">จำนวน:</label>
                                    <input required name="amount" type="text" class="form-control"
                                        id="recipient-amount">
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button style="background-color: #857379;border:none;" type="submit"
                                    class="btn btn-primary">เพิ่ม</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="container">
                <form action="" class="form-group my-3" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <input id="search" type="text" placeholder="ค้นหา.." class="form-control" name="searchInput" required>
                        </div>
                        <div class="col-6">
                            <input onclick="onSearch('admin_mtr_manage')" type="button" style="background-color: #857379;border:none;" value="ค้นหา"
                                class="btn btn-info">

                           
                        </div>
                    </div>

                </form>
                                
            </div>

            <div class="container mt-4">
                <div class="box">


                    <div class="content-table pt-1">

                        <div class="table">
                            <!-- <div class="table-content">
                                <div class="table-responsive">
                                    <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="myTable_length"><label>Show <select
                                                            name="myTable_length" aria-controls="myTable"
                                                            class="form-select form-select-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="myTable_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="myTable"></label></div>
                                            </div>
                                        </div> -->
                            <div class="row dt-row">
                                <div class="col-sm-12">
                                    <table id="myTable" class="table table-striped table-bordered dataTable no-footer"
                                        style="width: 100%;" aria-describedby="myTable_info">

                                        <thead>
                                            <tr>
                                                <th class=" sorting sorting_asc" style="width: 41.4px;" tabindex="0"
                                                    aria-controls="myTable" rowspan="1" colspan="1"
                                                    aria-label="ชื่อวัตถุดิบ: activate to sort column descending"
                                                    aria-sort="ascending">ลำดับ</th>
                                                <th class=" sorting sorting_asc" style="width: 41.4px;" tabindex="0"
                                                    aria-controls="myTable" rowspan="1" colspan="1"
                                                    aria-label="ชื่อวัตถุดิบ: activate to sort column descending"
                                                    aria-sort="ascending">ชื่อวัตถุดิบ</th>
                                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1"
                                                    colspan="1" aria-label="ราคา: activate to sort column ascending"
                                                    style="width: 22.2px;">ราคา</th>
                                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1"
                                                    colspan="1" aria-label="จำนวน: activate to sort column ascending"
                                                    style="width: 62.2px;">จำนวน</th>

                                                <th class="text-center sorting" tabindex="0" aria-controls="myTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="จัดการ: activate to sort column ascending"
                                                    style="width: 53.2px;">จัดการ</th>
                                                <th class="text-center sorting" tabindex="0" aria-controls="myTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="จัดการ: activate to sort column ascending"
                                                    style="width: 53.2px;">จัดการ</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            //คิวรี่ข้อมูลมาแสดงในตาราง
                                            include("../PhpProcess/DatabaseCon.php");
                                            $search = "";
                                            if($_POST["search"]){
                                                $search = $_POST["search"];
                                            }
                                            $sql = "SELECT * FROM raw_material WHERE raw_material_name LIKE '%$search%'";
                                            $result = $con->query($sql);
                                            $j = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr class="odd">
                                                    <td>
                                                        <?= $j ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["raw_material_name"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["raw_material_price"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["raw_material_amount"]; ?>
                                                    </td>

                                                    <td>
                                                        <a href="../PhpProcess/adminProcess/editmtr.php?id=<?= $row['raw_material_id']; ?>"
                                                            class="btn btn-secondary"><span
                                                                class="glyphicon glyphicon-edit"></span> แก้ไข</a>
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="../PhpProcess/adminProcess/material.php">
                                                        <input type="hidden" name="price" value="<?php echo $row["raw_material_price"]; ?>">
                                                            <input type="hidden" name="id" value="<?php echo $row["raw_material_id"]; ?>">
                                                            <input required type="number" name="amount" value="0" min="0">
                                                            <button type="submit" name="add" value="add" class="btn btn-secondary">นำเข้า</button>
                                                            <button type="submit" name="remove" value="remove"  class="btn btn-danger">นำออก</button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                <?php
                                                $j++;
                                            } ?>
                                        </tbody>

                                    </table>
                                    <div style="width: 5%;"></div>
                                    <div style="width: 5%;"></div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="myTable_info" role="status"
                                                    aria-live="polite">Showing 1 to 1 of 1 entries (filtered from 279
                                                    total entries)</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="myTable_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="myTable_previous"><a aria-controls="myTable"
                                                                aria-disabled="true" role="link" data-dt-idx="previous"
                                                                tabindex="-1" class="page-link">ก่อนหน้า</a></li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                aria-controls="myTable" role="link" aria-current="page"
                                                                data-dt-idx="0" tabindex="0" class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="myTable_next"><a aria-controls="myTable"
                                                                aria-disabled="true" role="link" data-dt-idx="next"
                                                                tabindex="-1" class="page-link">ถัดไป</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
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
    <script>

</body >

</html >