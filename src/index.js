import "./import-style"
//adding dropdown

let parentMenu = document.querySelector(".menu-item-has-children");
if(parentMenu)
{
    parentMenu.addEventListener("click", (ev)=>{
        ev.target.querySelector(".sub-menu").classList.toggle("open");
    });
}

let mobileMenuToggler = document.querySelector(".navbar .mobile-menu-toggler");
let navMenu = document.querySelector(".navbar .nav-menu");
if(mobileMenuToggler && navMenu){
    mobileMenuToggler.addEventListener('click', (ev)=>{
        mobileMenuToggler.classList.toggle("open");
        navMenu.classList.toggle("open");
    });
}


if(window.jQuery)
{
    let $ = window.jQuery;
    console.log($);
    $('body').on('added_to_cart removed_from_cart', function(event, fregment, cardhash){
        console.log("added to cart");
        // let resource = (new DOMParser()).parseFromString(fregment["div.widget_shopping_cart_content"],'text/html');
        // let totalCount = resource.querySelector('.total.count .items').innerText;
        // console.log(Number(totalCount));
        // console.log(cardhash);
        console.log(fregment);
    })
}