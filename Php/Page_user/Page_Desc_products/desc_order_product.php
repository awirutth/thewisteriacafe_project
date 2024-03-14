

<!DOCTYPE html>
<html lang="en">
<head> 
    <title>The Wisteria | Order</title>
    <link rel="stylesheet" href="../../../StyleCss/descProductCss/descProCss.css">
    <!-- เข้าเว็บ cdnjs font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <!-- Head color black -->
    <section class="nav-header">
        <a href="../../../index.php">
        <div class="con-btn-back">
            <i class="fa-solid fa-arrow-left" style="color: #857379;"></i><span>Back</span>
        </div>
        </a>
    </section>

    <!-- section order detail -->
    <section class="con-order-detail">
        <div class="review-con">
            <a href="">
            <div class="review">
                <i class="fa-solid fa-star" style="color: #fff70a;"></i>
                <span>5.0</span>
                <span>(Review)</span>
            </div>
            </a>
            <div class="favorite">
                <i class="fa-regular fa-heart" style="color: #000000;"></i>
            </div>
        </div>
        <div class="order-img">
            <img src="../../../Img/Img-products/Hot/product-coffe.png" alt="">
        </div>
        <div class="order-desc">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam repudiandae consequuntur ducimus nostrum quisquam assumenda?</p>
        </div>
    </section>

    <!-- section order radiobox -->
    <section class="con-order-radio">
        <form action="#" method="post">
            <div class="con-radio">
                <div class="con-sweet">
                    <p>ระดับความหวาน (เลือก 1)</p>
                    <div class="radio-group">
                    
                        <label for="checksweet1" class="text-sweet">
                            <input id="checksweet1" type="radio" name="checksweet" value="0">
                            <span>ไม่หวาน 0%</span>
                        </label><br/>
    
                        <label for="checksweet2" class="text-sweet">
                            <input id="checksweet2" type="radio" name="checksweet" value="25">
                            <span>หวานน้อยมาก 25%</span>
                        </label> <br/>
                        <label for="checksweet3" class="text-sweet">
                            <input id="checksweet3" type="radio" name="checksweet" value="50">
                            <span>หวานน้อย 50%</span>
                        </label> <br/>
                    </div>
                </div>
                <div class="con-shot">
                    <p>เพิ่มชอต (ไม่บังคับ, เลือกสูงสุด 1)</p>
                    <div class="radio-group">
                        <label for="checkshot1" class="text-shot">
                            <input id="checkshot1" type="radio" name="checkshot" value="Espress1">
                            <span>เพิ่มเอสเพรสโซ่ 1 ชอต</span> <span class="text-radio-shot">+ $10</span></label> <br/>
                        <label for="checkshot2" class="text-shot">
                            <input id="checkshot2" type="radio" name="checkshot" value="Americano1">
                            <span>เพิ่มอเมริกาโน 1 ชอต</span> <span class="text-radio-shot">+ $10</span></label> <br/>
                    </div>
                </div>
                <div class="con-topping">
                    <p>เพิ่มทอปปิ้ง (ไม่บังคับ, เลือกสูงสุด 1)</p>
                    <div class="radio-group">
                        <label for="checktopp1" class="text-topp">
                            <input id="checktopp1" type="radio" name="check_topp" value="chockcolate">
                            <span>เพิ่มชอกโกแลต</span> <span class="text-radio-topp">+ $10</span> </label><br/>
                        <label for="checktopp2" class="text-topp">
                            <input id="checktopp2" type="radio" name="check_topp" value="wipcream"> <span>เพิ่มวิปครีม</span> <span class="text-radio-topp">+ $20</span> </label><br/>
                    </div>
                </div>
                <div class="con-note">
                    <i class="fa-regular fa-note-sticky" style="color: #333;"></i>
                    <input type="text" name="note_order" placeholder="  เพิ่มโน๊ตให้ทางร้าน">
                </div>
            </div>

            <!-- footer order detail -->
            <div class="con-footer-order">
                <div class="footer-order">
                    <div class="con-price">
                        <span>Price</span>
                        <span>$20</span>
                    </div>
                    <div class="con-amount">
                        - 1 +
                    </div>
                    <div class="con-add">
                        <button type="submit"><span>+ Add</span></button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    
    
   
        
</body>
</html>
