// // Hambergur Bar
// function toggleHam(el) {
//     el.classList.toggle("change"); //เพิ่มคลาส change

//     // Show Menu When Responsive Mobile
//     let ul_menu = document.getElementById("ul_Menu")
//     //check ว่าถ้าเป็น class = menu ให้เพิ่มคลาส menu-active
//     //ถ้ามีสองคลาสอยู่แล้ว จะแปลงกลับเป็นคลาส menu เดิม
//     if(ul_menu.className === 'menu'){
//         ul_menu.className += ' menu-active'
//     }else{
//         ul_menu.className = 'menu'
//     }
// }





console.log("Contected javascript success")




// Function กดปุ่ม search แล้วแสดง search bar input
const SearchBar = document.getElementById('SearchBar');

SearchBar.style.marginTop = '-100%';

function toggleSearchbar() {
    if (SearchBar.style.marginTop == "-100%") {
        SearchBar.style.marginTop = "-0%";
    } else {
        SearchBar.style.marginTop = "-100%";
    }
}

// เปลี่ยนพื้นหลังของ background navbar header หลังจากเลื่อน scroll
const navbar_header = document.getElementById('navbarHeader')

window.addEventListener("scroll", function(){
    navbar_header.classList.toggle("sticky", this.window.scrollY > 60)
});






//Form Sign In Sign Up

      document.addEventListener("DOMContentLoaded", function(event) {
        let signupBtn = document.getElementById("signupBtn");
      let signinBtn = document.getElementById("signinBtn");
      let formsignup = document.getElementById("form-signup");
      let formsignin = document.getElementById("form-signin");
      let title = document.getElementById("title");

      formsignup.style.display = "none";

      signupBtn.onclick = function () {
        formsignin.style.maxHeight = "0";
        title.innerHTML = "ลงทะเบียน";
        signinBtn.classList.add("disable");
        signupBtn.classList.remove("disable");
        formsignup.style.display = "block";
      };

      signinBtn.onclick = function () {
        formsignin.style.maxHeight = "465px";
        title.innerHTML = "เข้าสู่ระบบ";
        signinBtn.classList.remove("disable");
        signupBtn.classList.add("disable");
        formsignup.style.display = "none";
      };
      });