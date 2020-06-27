function toggleMenu() {
    let nav_bar = document.getElementById("nav_bar")
    let toggle = document.getElementById("menu_toggle");
    nav_bar.classList.toggle("active");
    if(nav_bar.classList.contains("active"))
    toggle.setAttribute('src','Media/close_toggle.png');
    else 
    toggle.setAttribute('src','Media/menu_toggle3.png');
    
}