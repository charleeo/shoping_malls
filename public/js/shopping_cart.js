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
        
        if(quantity =='' || quantity < 1){//ensure that quantity is specify
           responseSpan.text('Please specify quantity').css('color','#ffa500')
           setTimeout(function(){responseSpan.text('')},2000)
           return;
        }

        responseSpan.text('loading...').css('color','#e3e7e7').css('background','#333333').css('padding','10px');

        $.ajax({
            url: "/cart/add-to-cart",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
            },
            success: function (response) {
                cartload();//provide a realtime update of the cart items
                responseSpan.text(response.status).css('color','#21c505')
                setTimeout(function(){
                    responseSpan.text('').css('background','inherit').css('padding','0')
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
            let va= value['totalcart']
            let colr= va==0?'text-warning':'text-success' 
            $('.basket-item-count').append($(`<span class="badge badge-pill ${colr} ">`+  va +'</span>'));
        }
    });
}


// Increase or decrease cart value
$(document).ready(function () {

    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<100){
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

});


// Update Cart Data
$(document).ready(function () {

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        let quantity = $(this).closest(".cartpage").find('.qty-input').val();
        let product_id = $(this).closest(".cartpage").find('.product_id').val();
        let responseSpan =  $(this).closest('.cartpage').find('.response')
         let item_sub_price  = $(this).closest('.parent').find('.item_sub_price')
        responseSpan.text('updating...');

        let data = {
            '_token': $('input[name=_token]').val(),
            'quantity':quantity,
            'product_id':product_id,
        };
        
        $.ajax({
            url: '/cart/update-cart',
            type: 'POST',
            data: data,
            success: function (response) {
                // window.location.reload();
                let {itemTotalValue,cartGrandTotal,status}=response
                responseSpan.text(status)
                item_sub_price.val(itemTotalValue)
                $('.sub-total').val(cartGrandTotal)
                $('.grand-total').val(cartGrandTotal)
                setTimeout(function(){
                    responseSpan.text('')
                },2500)
            },
            error:function(error){
                console.log(error.responseText)
                responseSpan.text(`There was an error:`+ JSON.stringify(error))
            }
        });
    });

});


$(document).ready(function () {

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();

        let product_id = $(this).closest(".delete-data").find('.product_id_to_delete').val();

        let rowToBeremoved = $('#'+product_id)
        let nameAndAction = $('.'+product_id)
        let responseSpan =  $(this).closest('.item-name-action').find('.response')
        responseSpan.text('Deleting...');
        let data = {
            '_token': $('input[name=_token]').val(),
            "product_id": product_id,
        };

        $.ajax({
            url: '/cart/delete',
            type: 'DELETE',
            data: data,
            success: function (response) {
                let {status,cartGrandTotal} = response
                responseSpan.text(status)
                $('.grand-total').val(cartGrandTotal)
                $('.sub-total').val(cartGrandTotal)
                responseSpan.text(status)
                cartload()
                setTimeout(function(){
                    rowToBeremoved.hide('slow')
                    nameAndAction.hide('slow')
                },3000)
            }
        });
    });
   $('.empty-cart').click(function(){
       if(!confirm('You are about to empty your shopping cart. Click "Ok" to proceed '))return;
   })
});


