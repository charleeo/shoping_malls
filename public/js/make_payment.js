$(document).ready(()=>{
    let payment = $('.proceed-to-payment');
    payment.click(()=>{
       let checkoutTotal =$('.grand-total').val()
       if(checkoutTotal < 1){
           alert('error in your cart. Please make you didn\'t select above the available quantities for an item')
        }else {
            $('#orderyModal').modal('show')
        }
    })

    $('.checkout').click((e)=>{
        e.preventDefault()
    })
})