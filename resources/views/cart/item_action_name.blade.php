<div class="row justify-content-center">
    <div class="col-md-6 col-sm-11">
        <div class="{{$data['item_id']}}">
            <div class="item-name-action pt-3 ">
                <div class="">
                    <small>Name: <b>{{$data['item_name']}}</b> </small>
                </div>
                <div class=" delete-data">
                    <form action="/cart/delete" method="POST">
                        <button class="delete_cart_data btn btn-default">Delete  <b><i class="fas fa-trash text-danger"></i></b> </button>
                        <input type="hidden" name="product_id" value="{{$data['item_id']}}" class="product_id_to_delete">
                    </form>
                    <p class="response text-success pt-3"></small>
                </div>
            </div>
            <hr>
        </div>

    </div>
</div>

 {{-- To be included on the cart details page --}}