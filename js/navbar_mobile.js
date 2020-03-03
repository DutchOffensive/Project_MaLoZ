var icon = document.getElementById("icon");
var navStatus = false;

function toggleNav(){
    if(navStatus == true){
        closeNav();
    } else {
        openNav();
    }
}

function openNav() {
    document.getElementById("mySidebar").style.width = "100%";
    icon.classList.toggle("change");
    navStatus = true;
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    icon.classList.toggle("change");
    navStatus = false;
}

window.onresize = function() {
    if (mySidebar.style.width === "100%") {
        closeNav();
    }
}   

window.onscroll = function(){ 
if (mySidebar.style.width === "100%") {
        closeNav();
    }
}