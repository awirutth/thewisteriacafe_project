const iconPhone = document.getElementById('iconPhone');

function toggleConPhone() {
    if (iconPhone.className === 'con-phone-text'){
        iconPhone.className += ' showCon-phone'
    }else{
        iconPhone.className = 'con-phone-text'
    }
}