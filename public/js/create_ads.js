$(document).ready(function(){
    let adType =$('#ad-type')
    let serviceAds = $('#servicesAds')
    let productsAds= $('#productsAds')
    adType.change(function(){
        if(adType.val()==='services'){
          window.location.href='/services/create'
        }else if(adType.val()==='products'){
            window.location.href='/products/create'
        }
    })
})