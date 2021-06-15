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

$(document).ready(function(){
    $('.delete-form-image').click(function(){
       let imagePath = $(this).attr('src')
       let product_id = $('.product_id').val()
       let adsTYpe = $('.ads_type').val()
       $('.input_image_path').val(imagePath)
       let responseT = $('.response-text');
       responseT.text('Deleting.....')
       let divToHide = $(this).closest('.parents').find('.immediate-parents');
       $.ajax({
        url: "/ads/delete_form_image",
        method: "POST",
        data: {
            'input_image_path': imagePath,
            'product_id': product_id,
            'ads_type' :adsTYpe
        }, 
        success:function(response){
           if(response.status ==='error'){
               responseT.text("You can't remove all the images. Please upload new ones instead and this one will be deleted")
               setTimeout(function(){
                responseT.text('')
            },3500)
           }else{  
               responseT.text(response.status)
               setTimeout(function(){
                   divToHide.hide('slow')
                   responseT.text('')
               },2500)
           }
        }
       })
    })
})




