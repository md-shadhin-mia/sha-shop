import "./product-gallery";
import "./import-style";


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
        const closetAction = function(evnt){
            if(evnt.target.closest('.menu-main-menu-container')){
                mobileMenuToggler.classList.add("open");
                navMenu.classList.add("open");
            }
            else
            {
                    mobileMenuToggler.classList.remove("open");
                    navMenu.classList.remove("open");
                    document.body.removeEventListener('click', closetAction);
                    // console.log("close by cosetaction");
            }
        }
        if(mobileMenuToggler.classList.contains('open'))
        {
            // console.log("clsoe");
            document.body.removeEventListener('click', closetAction);
            mobileMenuToggler.classList.remove("open");
            navMenu.classList.remove("open");
        }else{
            // console.log("opened");
            document.body.addEventListener('click', closetAction);
            mobileMenuToggler.classList.add("open");
            navMenu.classList.add("open");
            ev.stopPropagation();
        }
    });
}


if(window.jQuery)
{
    let $ = window.jQuery;
    $('body').on('added_to_cart removed_from_cart', function(event, fregment, cardhash){
        console.log("added to cart");
        // let resource = (new DOMParser()).parseFromString(fregment["div.widget_shopping_cart_content"],'text/html');
        // let totalCount = resource.querySelector('.total.count .items').innerText;
        // console.log(Number(totalCount));
        // console.log(cardhash);
        console.log(fregment);
    })
}

let search_lebel_button = document.querySelector('.woocommerce-product-search .product-search-label');
if(search_lebel_button){
    let wc_ps = document.querySelector('.woocommerce-product-search');
    let wc_psf = document.querySelector('.woocommerce-product-search .search-field');
    if(wc_ps){
        search_lebel_button.addEventListener('click', (evn)=>{
            wc_ps.classList.add('open');
            let closetAction = function(evnt){
                    if(evnt.target.closest('.woocommerce-product-search')){
                        wc_ps.classList.add('open');
                    }
                    else
                    {
                        if(wc_psf.value == ""){
                            wc_ps.classList.remove('open');
                            document.body.removeEventListener('click', closetAction)
                        }
                    }
                }
            document.body.addEventListener('click', closetAction);
        })
    }
}