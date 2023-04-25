const menu = document.getElementById("nav-links");
const menuIcon = document.querySelector(".fa-bars");

function showMenu(){
    menu.style.right = "0";
    menuIcon.style.display = "none !important";
    menuIcon.style.zIndex = "0";
}

function hideMenu(){
    menu.style.right = "-200px";
    menuIcon.style.display = "block !important";
}

