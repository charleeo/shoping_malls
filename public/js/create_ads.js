$(document).ready(function(){
    let adType =$('#ad-type')
    adType.change(function(){
        if(adType.val()==='services'){
          window.location.href='/services/create'
        }else if(adType.val()==='products'){
            window.location.href='/products/create'
        }
    })

    $('.create').click(function(){
      $('.response-div').html('Creating Advert. Please be patient')
    })
})
