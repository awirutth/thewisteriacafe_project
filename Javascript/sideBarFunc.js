document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready

     let page = document.getElementById("page")
     if(page.value != ""){
        onChangeMenu(page.value)
     }else{
        onChangeMenu("admin_dashboard");
     }
    });


function initDashboard(){
    const xValues = ["ม.ค.","ก.พ","มี.ค.","เม.ษ.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
    const monthSell = Array.prototype.slice.call(document.getElementsByName("monthSell"))
    const monthSellO = Array.prototype.slice.call(document.getElementsByName("monthSellOld"))
    const monthSellCur = [0,0,0,0,0,0,0,0,0,0,0,0]
    const monthSellOld = [0,0,0,0,0,0,0,0,0,0,0,0]
    monthSell.map((item,i)=>{
        monthSellCur[i] = item.value
    })
    monthSellO.map((item,i)=>{
        monthSellOld[i] = item.value
    })
    new Chart("yearSell", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
        data: monthSellCur,
        borderColor: "red",
        fill: false
        },{
        data: monthSellOld,
        borderColor: "green",
        fill: false
        }]
    },
    options: {
        legend: {display: false}
    }
    });

    const cool = document.getElementById("cool").value;
    const hot = document.getElementById("hot").value;
    const smoothie = document.getElementById("smoothie").value;
    const xRValues = ["ร้อน", "เย็น", "ปั่น"];
    const yRValues = [hot,cool , smoothie];
    const barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    ];

    new Chart("ratio", {
    type: "pie",
    data: {
        labels: xRValues,
        datasets: [{
        backgroundColor: barColors,
        data: yRValues
        }]
    },
    options: {
        title: {
        display: true,
        text: "ข้อมูลล่าสุด"
        }
    }
    });
}

function onSearch(page){
    const search = document.getElementById("search").value
    onChangeMenu(page,search)
}

function onChangeMenu(page,search=""){
    console.log(page)
    $.post(`./${page}.php`,
        {
            search
        },
        function(data, status){
            
            document.getElementById("MainContent").innerHTML= data
            getType()
            initDashboard()
        });
}


