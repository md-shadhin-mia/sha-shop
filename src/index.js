import "./import-style"
//adding dropdown

let parentMenu = document.querySelector(".menu-item-has-children");
if(parentMenu)
{
    parentMenu.addEventListener("click", (ev)=>{ev.target.querySelector(".sub-menu").classList.toggle("open")})
}