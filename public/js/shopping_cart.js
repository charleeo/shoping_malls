$(document).ready(function () {
    $('.add-to-cart').click(function (e) {
        e.preventDefault();       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let quantity = $(this).closest('.product_data').find('.qty').val()
        let responseSpan = $(this).closest('.product_data').find('.response');
        
        if(quantity ==''){//ensure that quantity is specify
           responseSpan.text('Please specify quantity')
           setTimeout(function(){responseSpan.text('')},2000)
           return;
        }

        $.ajax({
            url: "/cart/add-to-cart",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
            },
            success: function (response) {
                cartload();//provide a realtime update of the cart items
                responseSpan.text(response.status)
                setTimeout(function(){
                    responseSpan.text('')
                },2000)
            },
        });
    });
});



$(document).ready(function () {
    cartload(); //also update the cart on page load
});

function cartload()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/cart/load-data',
        method: "GET",
        success: function (response) {
            $('.basket-item-count').html('');
            var parsed = jQuery.parseJSON(response)
            var value = parsed; 
            $('.basket-item-count').append($('<span class="badge badge-pill text-success">'+ value['totalcart'] +'</span>'));
        }
    });
}