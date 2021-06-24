<div class="modal fade" id="orderyModal" tabindex="-1" role="dialog" aria-labelledby="orderyModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('products.all-created')}}" id="order-form" method="GET">
                <input type="hidden" value="{{$grandTotal}}" name="grand_total">
                @csrf
                <div class="row justify-content-center">
                    <small>Enter Your Information below</small>
                    <div class="col-md-6 col-sm-10">
                        <div class="form-group">
                            <label for="full-name">Fullname</label>
                            <input type="text" name="fullname" id="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="delivery_email">Delivery Email</label>
                            <input type="email" name="delivery_email" id="delivery_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number">
                        </div>
                        <div class="form-group">
                        <label for="address_line_1">Address Line 1</label>
                        <textarea name="adress_line_1" id="address_line_1" cols="30" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address_line_2">Address Line 2</label>
                            <textarea name="adress_line_2" id="address_line_2" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary checkout">Check Out</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
