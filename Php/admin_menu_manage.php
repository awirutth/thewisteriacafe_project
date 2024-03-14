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
</head>

<body>
    <div class="mt-5">


        <div class="container contentCon">

            <button type="button" class="btn btn-dark btn-lg my-3 adminBackground" data-bs-toggle="modal"
                data-bs-target="#exampleModal" data-bs-whatever="@mdo">เพิ่มเมนู</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มเมนู</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../PhpProcess/adminProcess/insertMenu.php" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ชื่อเมนู:</label>
                                    <input required name="name" type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">สูตร:</label>
                                    <Textarea value="" name="d_recipe" type="text" class="form-control" id=""></Textarea>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ราคา:</label>
                                            <input required name="price" type="number" class="form-control"
                                                id="recipient-name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ชนิด:</label>
                                            <div class="input-group mb-3">
                                                <a style="background-color: #857379;border:none;" onclick="" class="input-group-text btn btn-primary"
                                                    for="inputGroupSelect01"></a>
                                                <select required name="m_type" class="form-select" id="">
                                                    <option selected value="เย็น">เย็น</option>
                                                    <option value="ร้อน">ร้อน</option>
                                                    <option value="ปั่น">ปั่น</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ประเภท:</label>
                                            <div class="input-group mb-3">
                                                <a style="background-color: #857379;border:none;" onclick="addTypeModal()" class="input-group-text btn btn-primary"
                                                    for="inputGroupSelect01">+</a>
                                                <div id="typeAdd" class="typeAdd bg-white border border-1 p-2"
                                                    style="display:none;width:200px;position:absolute;top:40px;">
                                                    <div class="mb-3">
                                                        <p style="cursor:pointer;" onclick="addTypeModal()"
                                                            class="display-7 text-end w-100 m-0">x</p>
                                                        <label class="pt-0 col-form-label">ประเภท</label>
                                                        <input type="text" class="form-control" id="input-menu-type">
                                                        <a style="background-color: #857379;border:none;" onclick="addMenuType()"
                                                            class="btn mt-2 btn-primary w-100">เพิ่ม</a>
                                                    </div>
                                                </div>
                                                <select required name="type" class="form-select" id="typeSelect">
                                                    <option selected>เลือก</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">ส่วนเสริม(ใส่จำนวน):</label>
                                        <input oninput="addonInput(this)" type="number" class="form-control"
                                            id="recipient-name">
                                        <div id="addonCon">


                                        </div>


                                    </div>


                                </div>

                                <div>
                                    <div class="mb-4 d-flex justify-content-center">
                                        <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                            alt="example placeholder" style="width: 300px;" id="ImgMenuInsert" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div style="background-color: #857379;border:none;" class="btn btn-dark btn-rounded">
                                            <label class="form-label text-white m-1"
                                                for="customFile1">อัพโหลดรูปภาพ</label>
                                            <input name="menu-img" onchange="imagePick(this,'ImgMenuInsert')"
                                                type="file" class="form-control d-none" id="customFile1" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button style="background-color: #857379;border:none;" type="submit" class="btn btn-primary">เพิ่ม</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row row row-cols-2 row-cols-md-2
                    row-cols-lg-4 g-4">
                <?php
                    include("../PhpProcess/DatabaseCon.php");
                    $sql = "SELECT menu.*,
                    concat('[', group_concat(JSON_OBJECT('addons_id', menu_addons.addons_id, 'addons_name', menu_addons.addons_name,'addons_price', menu_addons.addons_price,'addons_type', menu_addons.addons_type) order by menu_addons.addons_id separator ','), ']') as menu_addons
                    FROM menu
                    LEFT JOIN menu_addons
                    ON menu.menu_id=menu_addons.menu_id
                    WHERE menu.status=0
                    GROUP BY menu.menu_id";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $addons = json_decode($row["menu_addons"]);
                            $rowJson = json_encode($row);
                     
                ?>
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <div style="display: flex;" class="display-flex justify-center align-items-center">
                        <img style="" class="w-100 mx-auto menu_img"
                            src="../Img/Img-menu/<?php echo($row["menu_image"]);?>" alt="">
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["menu_name"];?></h5>
                            <p class="card-text">ราคา <?php echo $row["menu_price"]; ?> บาท</p>
                            <!-- <p class="p-0 m-0">ทอปปิ้ง</p>
                            <?php
                                // foreach($addons as $addon){
                                //     if($addon->addons_type == "ทอปปิ้ง"){
                                //         echo("$addon->addons_name ราคา $addon->addons_price บาท<br>");
                                //     }
                                    
                                // }   
                            ?>
                            <p class="pt-2 m-0">เพิ่มซ็อต</p> -->
                            <?php
                                // foreach($addons as $addon){
                                //     if($addon->addons_type == "เพิ่มช็อต"){
                                //         echo("$addon->addons_name ราคา $addon->addons_price บาท<br>");
                                //     }
                                    
                                // }   
                            ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group ">
                                    <button onclick='AdminMenuViewModal(`<?php echo($rowJson); ?>`)' type="button"
                                        class="btn btn-sm btn-outline-secondary">แก้ไข</button>
                                        
                                </div>
                                <form method="POST" action="../PhpProcess/adminProcess/deleteMenu.php">
                                    <input type="hidden" name="id" value="<?php echo($row["menu_id"]);?>">
                                <button type="submit"
                                        class="btn btn-sm btn-danger">ลบ</button>
                                </form>
                                
                                <!-- <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php }}?>
                
                

                <!-- Modal -->
                <div class="modal fade" id="MenuViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขเมนู</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../PhpProcess/adminProcess/editMenu.php" method="post"
                                enctype="multipart/form-data">
                                <div class="modal-body">

                                    <input type="hidden" id="MenuIdEdit" name="MenuIdEdit">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">ชื่อเมนู:</label>
                                        <input  name="nameEdit" type="text" class="form-control" id="nameEdit">
                                        <!-- value="<?= $row['menu_name']; ?>" -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">สูตร:</label>
                                        <Textarea  name="d_recipe_edit" type="text" class="form-control" id="d_recipe_edit"></Textarea>
                                        <!-- <?php echo $row["menu_recipe"];?> -->
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">ราคา:</label>
                                                <input  name="priceEdit" type="number" class="form-control"
                                                    id="priceEdit" value="<?= $row['menu_price']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">ชนิด:</label>
                                                <div class="input-group mb-3">
                                                    <a style="background-color: #857379;border:none;" onclick="" class="input-group-text btn btn-primary"
                                                        for="inputGroupSelect01"></a>
                                                    <select  name="m_type_edit" class="form-select" id="m_type_edit">
                                                        <option value="">เลือก</option>
                                                        <option value="เย็น">เย็น</option>
                                                        <option value="ร้อน">ร้อน</option>
                                                        <option value="ปั่น">ปั่น</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">ประเภท:</label>
                                                <div class="input-group mb-3">
                                                    <a style="background-color: #857379;border:none;" onclick="addTypeModal()" class="input-group-text btn btn-primary"
                                                        for="inputGroupSelect01">+</a>
                                                    <div id="typeAdd" class="typeAdd bg-white border border-1 p-2"
                                                        style="display:none;width:200px;position:absolute;top:40px;">
                                                        <div class="mb-3">
                                                            <p style="cursor:pointer;" onclick="addTypeModal()"
                                                                class="display-7 text-end w-100 m-0">x</p>
                                                            <label class="pt-0 col-form-label">ประเภท</label>
                                                            <input type="text" class="form-control" id="input-menu-type">
                                                            <a style="background-color: #857379;border:none;" onclick="addMenuType()"
                                                                class="btn mt-2 btn-primary w-100">เพิ่ม</a>
                                                        </div>
                                                    </div>
                                                    <select  name="typeEdit" class="form-select" id="typeSelectEdit">
                                                        <option selected>เลือก</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">ส่วนเสริม(ใส่จำนวน):</label>
                                            <input oninput="addonInputEdit(this)" type="number" class="form-control"
                                                id="recipient-name">
                                            <div id="addonConEdit">


                                            </div>


                                        </div>


                                    </div>

                                    <div>
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                                alt="example placeholder" style="width: 300px;" id="ImgMenuInsertEdit" />
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div style="background-color: #857379;border:none;" class="btn btn-dark btn-rounded">
                                                <label class="form-label text-white m-1"
                                                    for="customFile2">อัพโหลดรูปภาพ</label>
                                                <input name="menu-img-edit" onchange="imagePick(this,'ImgMenuInsertEdit')"
                                                    type="file" class="form-control d-none" id="customFile2" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button style="background-color: #857379;border:none;" type="submit" class="btn btn-primary">แก้ไข</button>
                                </div>
                            </form>
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
</body>

</html>