<div class="{{$data['item_id']}}">
    <div class="item-name-action  ">
        <div class="col-md-4 col-sm-5">
            <small>Name: <b>{{$data['item_name']}}</b> </small>
        </div>
        <div class="col-md-4 col-sm-5 delete-data">
            <form action="/cart/delete" method="POST">
                <button class="delete_cart_data btn btn-default">Delete  <b><i class="fas fa-trash text-danger"></i></b> </button>
                <input type="hidden" name="product_id" value="{{$data['item_id']}}" class="product_id_to_delete">
            </form>
            <p class="response text-success pt-3"></small>
        </div>
    </div>
    <hr>
</div>

 {{-- To be included on the cart details page --}}