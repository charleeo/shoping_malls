let myGallery = document.querySelectorAll('.my-gallery');
let theImage = document.querySelector('.gallery-popup');
let alTheImages = document.querySelectorAll('.gallery-popup');
myGallery.forEach((el,index)=>{
    el.addEventListener('click',function(){
        theImage.removeAttribute('src')
        theImage.setAttribute('src',el.getAttribute('src'))
     el.setAttribute('data-toggle','modal')
    })
})




