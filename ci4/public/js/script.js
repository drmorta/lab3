const links = document.querySelectorAll(".scroll_to");
links.forEach((item)=>{
    item.addEventListener("click", ()=>{
        const el = document.getElementById(item.getAttribute("data-link"));
        el.scrollIntoView({behavior:"smooth", block:"end"})
    })
});
var typed = new Typed(".auto-type", {
    strings: [ "Welcome to my website!"],
    typeSpeed: 50,
    backSpeed: 100,
    loop: true});
