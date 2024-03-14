function imagePick(input,imageId) {
    console.log(imageId)
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
    $('#'+imageId).attr('src', e.target.result).width(150).height(200);
    };

    reader.readAsDataURL(input.files[0]);
}
}

function addMenuType(){
    let type = document.getElementById('input-menu-type').value
    if(type==""){
        alert("กรุณากรอกข้อมูล")
    }else{
        $.post("../PhpProcess/adminProcess/insertType.php",
        {
            type: type,
        },
        function(data, status){
            
            if(data=="successfully"){
                alert("สำเร็จ")
                getType()
                addTypeModal()
            }else{
                alert("error")
            };
        });

    }
    
}
function addTypeModal(){
    let typeModal = document.getElementById("typeAdd").style.display
    if(typeModal=="none"){
        document.getElementById("typeAdd").style.display = "block"
    }else{
        document.getElementById("typeAdd").style.display = "none"
    }

}

function getType(){
    $("#typeSelect").html(`<option value="">เลือก</option>`)
    $.post("../PhpProcess/systemProcess/getType.php",
        {
          
        },
        function(data, status){
            const dataJson = JSON.parse(data)
            
            dataJson.map((item)=>{
                let typeSelect = document.getElementById("typeSelect").innerHTML
                let typeSelectEdit = document.getElementById("typeSelectEdit").innerHTML
                $("#typeSelect").html(typeSelect+`<option value="${item.type_id}">${item.type_name}</option>`)
                $("#typeSelectEdit").html(typeSelectEdit+`<option value="${item.type_id}">${item.type_name}</option>`)
            })
        });

}


function addonInput(input){
    let count = input.value
    count = parseInt(count)
    let addonCon = document.getElementById("addonCon")
    addonCon.innerHTML = ""
    for (let index = 1; index < count+1; index++) {
        addonCon.innerHTML = addonCon.innerHTML+`<div class="row">
        <div class="col">
            <label for="recipient-name" class="col-form-label">ส่วนเสริม ${index}:</label>
            <input required name="addon[]" oninput="" type="text" class="form-control" >
        </div>
        <div class="col">
            <label for="recipient-name" class="col-form-label">ราคา:</label>
            <input required name="addonPrice[]" oninput="" type="number" class="form-control"
                >
        </div>
        <div class="col">
            <label for="recipient-name" class="col-form-label">ประเภท:</label>
            <select onchange="addonTypeSelect(this,${index})" required class="form-select" >
                <option selected>เลือก</option>
                <option value="ทอปปิ้ง">ทอปปิ้ง</option>
                <option value="เพิ่มช็อต">เพิ่มช็อต</option>
            </select>
            <input id="addonType${index}" name="addonType[]" oninput="" type="hidden" class="form-control"
                >
        </div>
    </div>`
        
    }
}

function addonInputEdit(input){
    let count = input.value
    count = parseInt(count)
    let addonCon = document.getElementById("addonConEdit")
    addonCon.innerHTML = ""
    for (let index = 1; index < count+1; index++) {
        addonCon.innerHTML = addonCon.innerHTML+`<div class="row">
        <div class="col">
            <label for="recipient-name" class="col-form-label">ส่วนเสริม ${index}:</label>
            <input required name="addonEdit[]" oninput="" type="text" class="form-control" >
        </div>
        <div class="col">
            <label for="recipient-name" class="col-form-label">ราคา:</label>
            <input required name="addonPriceEdit[]" oninput="" type="number" class="form-control"
                >
        </div>
        <div class="col">
            <label for="recipient-name" class="col-form-label">ประเภท:</label>
            <select onchange="addonTypeSelectEdit(this,${index})" required class="form-select" >
                <option selected>เลือก</option>
                <option value="ทอปปิ้ง">ทอปปิ้ง</option>
                <option value="เพิ่มช็อต">เพิ่มช็อต</option>
            </select>
            <input id="addonTypeEdit${index}" name="addonTypeEdit[]" oninput="" type="hidden" class="form-control"
                >
        </div>
    </div>`
        
    }
}

function addonTypeSelect(select,index){
    console.log(select.value)
    console.log(index)
    const inputAddon = document.getElementById("addonType"+index)
    inputAddon.value = select.value

}

function addonTypeSelectEdit(select,index){
    console.log(select.value)
    console.log(index)
    const inputAddon = document.getElementById("addonTypeEdit"+index)
    inputAddon.value = select.value

}


function MenuViewModal(item,path="../"){
    item = item.replace(`"[`,`[`)
    item = item.replace(`]"`,`]`)
    item = JSON.parse(item)
    let topping = "";
    let shot = "";
    item.menu_addons.forEach(el => {
        // if(el.addons_type=="ทอปปิ้ง")topping = topping+`${el.addons_name} ${el.addons_price} บาท <br>`
        // else if(el.addons_type=="เพิ่มช็อต")shot =shot+`${el.addons_name} ${el.addons_price} บาท <br>`
        if(el.addons_type=="ทอปปิ้ง")topping = topping+`<input class="addonsCheck" type="checkbox" id="" name="addons[]" value="${el.addons_id}"> ${el.addons_name} ${el.addons_price} บาท <br>`
        else if(el.addons_type=="เพิ่มช็อต")shot =shot+`<input class="addonsCheck" type="checkbox" id="" name="addons[]" value="${el.addons_id}"> ${el.addons_name} ${el.addons_price} บาท <br>`
    });
    let menu_view = document.getElementById("menu_view")
    menu_view.innerHTML = `<div class="text-center mb-2">
    <img style="" class="w-50 mx-auto mt-3" src="${path}Img/Img-menu/${item.menu_image}" alt="">
</div>
<input type="hidden" id="menu_id" name="menu_id" value="${item.menu_id}">
<h5 class="card-title">${item.menu_name}</h5>
<p class="card-text">ราคา: ${item.menu_price} บาท</p>
`
    if(topping){
        menu_view.innerHTML = menu_view.innerHTML+`<p class="p-0 m-0">ทอปปิ้ง</p>
        ${topping}`
    }
    if(shot){
        menu_view.innerHTML = menu_view.innerHTML+`<p class="pt-2 m-0">เพิ่มซ็อต</p>
        ${shot}`
    }
    var myModal = new bootstrap.Modal(document.getElementById('MenuViewModal'), {
        keyboard: false
        })
    myModal.show()
}

function AdminMenuViewModal(item,path="../"){
    item = item.replace(`"[`,`[`)
    item = item.replace(`]"`,`]`)
    item = JSON.parse(item)
    let topping = "";
    let shot = "";
    let MenuID = document.getElementById("MenuIdEdit")
    MenuID.value = item.menu_id
    item.menu_addons.forEach(el => {
        // if(el.addons_type=="ทอปปิ้ง")topping = topping+`${el.addons_name} ${el.addons_price} บาท <br>`
        // else if(el.addons_type=="เพิ่มช็อต")shot =shot+`${el.addons_name} ${el.addons_price} บาท <br>`
        if(el.addons_type=="ทอปปิ้ง")topping = topping+`<input class="addonsCheck" type="checkbox" id="" name="addons[]" value="${el.addons_id}"> ${el.addons_name} ${el.addons_price} บาท <br>`
        else if(el.addons_type=="เพิ่มช็อต")shot =shot+`<input class="addonsCheck" type="checkbox" id="" name="addons[]" value="${el.addons_id}"> ${el.addons_name} ${el.addons_price} บาท <br>`
    });
    let menu_view = document.getElementById("menu_view")
//     menu_view.innerHTML = `<div class="text-center mb-2">
//     <img style="" class="w-50 mx-auto mt-3" src="${path}Img/Img-menu/${item.menu_image}" alt="">
// </div>
// <input type="hidden" id="menu_id" name="menu_id" value="${item.menu_id}">
// <h5 class="card-title">${item.menu_name}</h5>
// <p class="card-text">ราคา: ${item.menu_price} บาท</p>
// `
    // if(topping){
    //     menu_view.innerHTML = menu_view.innerHTML+`<p class="p-0 m-0">ทอปปิ้ง</p>
    //     ${topping}`
    // }
    // if(shot){
    //     menu_view.innerHTML = menu_view.innerHTML+`<p class="pt-2 m-0">เพิ่มซ็อต</p>
    //     ${shot}`
    // }
    var myModal = new bootstrap.Modal(document.getElementById('MenuViewModal'), {
        keyboard: false
        })
    myModal.show()
}


function addTocart(user_id){
    const myModal = document.getElementById('MenuViewModal')
    const element = document.querySelector('.modal-backdrop');
    const cart = document.getElementById("cart_count")
    const bodyElement = document.querySelector('body');
    var checkBox = document.getElementsByClassName("addonsCheck");
    let addons=[]
    Array.from(checkBox).map(item=>{if(item.checked){addons.push(item.value)}})
    if(user_id==null){
        // alert("กรุณา log in");
        setTimeout(function() {
            swal({
                title: "กรุณาล็อกอิน",
                icon: "error"
            }, function() {
                window.location = "./Php/login.php"; //หน้าที่ต้องการให้กระโดดไป
            });
          }, 10);
          console.log("asdf")
        return;
    }
    const menu_id = document.getElementById("menu_id").value
    $.post("./PhpProcess/systemProcess/insertCart.php",
        {
            menu_id: menu_id,
            user_id:user_id,
            addons:addons.length>0?addons.toString():""
        },
        async function(data, status){
            console.log(data)
            
            if(data=="successfully"){
                if(cart){
                    cart.innerHTML = parseInt(cart.innerHTML)+1
                }
                myModal.style.display = "none"
                element.remove()
                bodyElement.removeAttribute('class');
                bodyElement.removeAttribute('style');
                setTimeout(function() {
                    swal({
                        title: "เพิ่มสำเร็จ",
                        icon: "success"
                    });
                  }, 10);
            }else{
                setTimeout(function() {
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        icon: "error"
                    });
                  }, 10);
            };
        });
    

}

function addonsToggle(ch,addonsPrice,discount){
    let sumPrice = document.getElementById('Sum-Price')
    let sumPriceFull = document.getElementById('Sum-Price-Full')
    let sumPriceShow = document.getElementById('sum-price-show')
    let priceFull = document.getElementById('priceFull')
    let discountText = document.getElementById('discountText')
    let price = sumPriceFull.value
    let priceF = 0
    let dis= 0;
    if(ch.checked === false){
        price = parseInt(price)-addonsPrice;
        priceF = price
        price = Math.ceil(price-(price*discount/100))
        dis = parseInt(sumPriceFull.value)-addonsPrice-price
    }else{
        price = parseInt(price)+addonsPrice;  
        priceF = price
        price = Math.ceil(price-(price*discount/100))  
        dis = parseInt(sumPriceFull.value)+addonsPrice-price
    }
    discountText.innerHTML = dis
    priceFull.innerHTML = priceF
    sumPrice.value = price
    sumPriceFull.value = priceF
    sumPriceShow.innerHTML = price

}

function submitCart(user_id){
    var checkBox = document.getElementsByClassName("addonsCheckB");
    let addons=[]
    Array.from(checkBox).map(item=>{if(item.checked==false){addons.push(item.value)}})
    $.post("../PhpProcess/systemProcess/submitCart.php",
        {
            user_id:user_id,
            addons_deny:addons.toString()
        },
        async function(data, status){
            console.log(data)
            if(data.includes("successfully")){
                var myModal = new bootstrap.Modal(document.getElementById('MenuViewModal'), {
                    keyboard: false,
                    backdrop:'static'
                    })
                myModal.show()
                const order_id = data.split(":")[1].trim()
                let intervalId= setInterval(() => {
                    console.log(order_id)
                    $.post("../PhpProcess/systemProcess/getOrderStatus.php",
                    {
                        order_id:order_id
                    },
                    async function(data, status){
                        console.log(data)
                        if(data.includes("cancel")){
                            clearInterval(intervalId);
                            let modalCon = document.getElementById("modal-content")
                            modalCon.innerHTML = `
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ชำระเงิน</h5>
                            </div>
                            <div class="p-4">
                            <div>
                                <div class="mb-4 d-flex justify-content-center">
                                    <i class="fa-solid fa-circle-xmark" style="color: red;font-size:150px;"></i>
                                </div>
                                <p class="text-center">ยกเลืกแล้ว</p>
                                
                            </div>
                            
                            </div>`
                            setTimeout(() => {
                                window.location.assign("./cart.php")
                            }, 1000);
                        }
                        if(data.includes("receive")){
                            console.log("receive");
                            clearInterval(intervalId);
                            let modalCon = document.getElementById("modal-content")
                            modalCon.innerHTML = `
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ชำระเงิน</h5>
                            </div>
                            <div class="p-4">
                            <div>
                            <div class="mb-4 d-flex justify-content-center">
                                <img src="../Img/qr.jpg"
                                    alt="example placeholder" style="width: 300px;" id="ImgMenuInsert" />
                            </div>
                            <form action="../PhpProcess/systemProcess/updateSlip.php" method="post"
                            enctype="multipart/form-data">
                                <div class="d-flex justify-content-center">
                                    <div style="background-color: #857379;border:none;" class="btn btn-dark btn-rounded">
                                        <label class="form-label text-white m-1"
                                            for="customFile1">อัพโหลดรูปภาพ</label>
                                        <input type="hidden" name="order_id_update" value="${order_id}">
                                        <input required name="menu-img" onchange="imagePick(this,'ImgMenuInsert')"
                                            type="file" class="form-control d-none" id="customFile1" />                                 
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="submit" style="background-color: #665e61;border:none;" class="btn btn-primary" style="align-self:center;">ยืนยัน</button>
                                </div>
                            </form>
                            
                        </div>
                            
                            </div>`
                        }
                    });
                }, 100);
            }else{
                alert("เกิดข้อผิดพลาด")
            };
        });

}

function ViewOrderItemUser(items,path="../",order){

    let itemsS = items.replace(/"\[/g, '[');
    itemsS = itemsS.replace(/\]"/g, ']');
    document.getElementById("menu_view").innerHTML = `<div id="slip_detail">

    <div class="box_slip_title">
        <span class="slip_title">หมายเลขคำสั่งซื้อ</span>
    </div>

    <div class="box_slip_title">
        <span class="slip_title_No">${order.order_id}</span>
    </div>

    <div class="box_slip_dataUser">
        <div class="box_slip_dataUser_1">
            <span>วันที่สั่งซื้อ: ${order.order_date.split(" ")[0]}</span>
            <span>เวลา: ${order.order_date.split(" ")[1]} น.</span>
        </div>
        <div class="box_slip_dataUser_2">
            <span>ชื่อลูกค้า: ${order.name}</span>
        </div>
    </div>

    <div class="box_slip_order">
        <div class="box_slip_order_title">
            <span>รายการสินค้า</span>
            <span>ราคา</span>
        </div>
        <div id="modal-order-view">
            <div class="box_slip_oderData">
                <span class="box_slip_orderName">ชาเย็น</span>
                <span class="box_slip_opt1">หวานน้อย</span>
                <span class="box_slip_opt2">เพิ่มช็อต</span>
                <span class="box_slip_count">x1</span>
                <span class="box_slip_price">75</span>
            </div>

            <div class="box_slip_oderData">
                <span class="box_slip_orderName">ชาดำ</span>
                <span class="box_slip_opt1">หวานปกติ</span>
                <span class="box_slip_opt2">เพิ่มช็อต</span>
                <span class="box_slip_count">x1</span>
                <span class="box_slip_price">75</span>
            </div>
        </div>
    </div>

    <div class="box_slip_footer">
        <div class="box_slip_footerData">
            <span class="box_slip_footerData_Text">ราคารวมทั้งหมด</span>
            <span class="box_slip_footerData_Text">${order.order_price} บาท</span>
        </div>
        <div class="box_slip_status">
            <span>สถานะคำสั่งซื้อ: เสร็จสิ้น</span>
        </div>
    </div>

</div>`
    let itemList = ``
    JSON.parse(itemsS).map(item=>{
        let addons = ""
        item.addons_list.map(el=>{
            if(el.addons_name){
                addons+=`<span class="box_slip_opt2">${el.addons_name}</span>`
            }
        })
        itemList+= `<div class="box_slip_oderData">
        <span class="box_slip_orderName">${item.menu_name}</span>
        ${addons}
        <span class="box_slip_count">x1</span>
        <span class="box_slip_price">${item.menu_price}</span>
    </div>`
    })
    let modalView = document.getElementById("modal-order-view");
    modalView.innerHTML = itemList;
    var myModal = new bootstrap.Modal(document.getElementById('MenuViewModal'), {
        keyboard: false
        })
    myModal.show()
}

function ViewOrderItem(items,path="../"){

    
    let itemsS = items.replace(/"\[/g, '[');
    itemsS = itemsS.replace(/\]"/g, ']');
    console.log(itemsS)
    let itemList = ``
    JSON.parse(itemsS).map(item=>{
        let addons = ""
        item.addons_list.map(el=>{
            if(el.addons_name){
                addons+=`${el.addons_name} ราคา ${el.addons_price}`
            }
        })
        itemList+= `<div class="grid-items-menu-order">
            <a >
            <img src="${path}Img/Img-menu/${item.menu_image}" alt="">
                    <div class="desc-con" style='width:100%;' >
                        <h6>${item.menu_name}</h6>
                        <p>${item.menu_type}<br>${addons}</p>
                        <div class="price-con" style='margin-left:auto;width:100%;'>
                            <div class="review-con" style="width:250px;word-wrap: break-word;">
                                ${item.menu_recipe}
                            </div>
                            <span class="price-product">${item.menu_price} ฿</span>
                        </div>

                    </div>
                    
            </a>
    </div>`
    })
    let modalView = document.getElementById("modal-order-view");
    modalView.innerHTML = itemList;
    var myModal = new bootstrap.Modal(document.getElementById('MenuViewModal'), {
        keyboard: false
        })
    myModal.show()
}

function receiveOrder(order_id,cancel){
    console.log(order_id)
    let obj  = {
        order_id:order_id
    }
    if(cancel){
        obj={...obj,cancel}
    }
    $.post("../PhpProcess/adminProcess/receiveOrder.php",
    obj,
    async function(data, status){
        console.log(data)
        if(data.includes("success")){
            let td = document.getElementById(`or${order_id}`)
            td.innerHTML = cancel?"ยกเลิกออเดอร์แล้ว":`รับออเดอร์แล้ว <button style="background-color:red !important;" onclick="" class="btn btn-secondary">ยกเลิก</button>`
        }
    });

}

function slipView(order_slip,path="../"){
    let slipImg = document.getElementById("slip_view");
    slipImg.innerHTML = `<img id="slipImg" style="width:100%;height:auto;" src="${path}Img/Img-slip/${order_slip}" alt="">`
    var myModal = new bootstrap.Modal(document.getElementById('SlipViewModal'), {
        keyboard: false
        })
    myModal.show()

}