  // core version + navigation, pagination modules:
  import Swiper, { Navigation, Pagination, Thumbs, Zoom } from 'swiper';
  // import Swiper and modules styles
  import 'swiper/css';
  import 'swiper/css/navigation';
  import 'swiper/css/pagination';
  

  Swiper.use([Navigation, Pagination, Thumbs]);

  const thums = new Swiper(".gallery-Thumnail", {
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
  });

  const swiper = new Swiper('.product-gallery', {
        autoHeight: true,
        loop: true,
        thumbs:{
            swiper : thums,
        },
        pagination:{
            el: ".pagination",
            clickable: true,
        },
        navigation:{
            nextEl : '.swiper-button-next',
            prevEl : '.swiper-button-prev'
        }
  });

  

  function imageZoom(imageSelector, ResultSelector) {
    var img, lens, result, cx, cy;
    img = document.querySelector(imageSelector);
    result = document.querySelector(ResultSelector);
    /*create lens:*/
    lens = document.createElement("DIV");
    
    lens.setAttribute("class", "hidden md:block");
    lens.style.position = "absolute";
    lens.style.border = "1px solid #d4d4d4";
    lens.style.width = "120px";
    lens.style.height = "120px";
    /*insert lens:*/

    img.parentElement.addEventListener('mouseover', ()=>{

        img.parentElement.insertBefore(lens, img);
        result.classList.add("open");
        let heigh = Math.max(img.parentElement.parentElement.getBoundingClientRect().width, img.parentElement.parentElement.getBoundingClientRect().height);
        result.style.height = heigh+"px";
        result.style.width = heigh+"px";
            /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
            /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
    });
    img.parentElement.addEventListener('mouseleave', ()=>{
        lens.removeEventListener("mousemove", moveLens);
        img.removeEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.removeEventListener("touchmove", moveLens);
        img.removeEventListener("touchmove", moveLens);
        result.classList.remove("open");
        img.parentElement.removeChild(lens);
    });
    function moveLens(e) {
      var pos, x, y;
      /*prevent any other actions that may occur when moving over the image:*/
      e.preventDefault();
      /*get the cursor's x and y positions:*/
      pos = getCursorPos(e);
      /*calculate the position of the lens:*/
      x = pos.x - (lens.offsetWidth / 2);
      y = pos.y - (lens.offsetHeight / 2);
      /*prevent the lens from being positioned outside the image:*/
      if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
      if (x < 0) {x = 0;}
      if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
      if (y < 0) {y = 0;}
      /*set the position of the lens:*/
      lens.style.left = x + "px";
      lens.style.top = y + "px";
      /*display what the lens "sees":*/
      result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    }
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /*get the x and y positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x and y coordinates, relative to the image:*/
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
  }

  if(document.querySelector(".product-gallery .swiper-slide-active")){
        imageZoom('.product-gallery .swiper-slide-active img', '.zoom-preview .preview-container');
        swiper.on('slideChangeTransitionEnd', (sw)=>{
            imageZoom('.product-gallery .swiper-slide-active img', '.zoom-preview .preview-container');
        });
  }

