<div class="modal fade" id="orderyModal" tabindex="-1" role="dialog" aria-labelledby="orderyModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h6 class="text-center">Enter Your Information below</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" >&times;</span>
                </button>
              </div>
            <div class="modal-body">
                <form action="{{route('payment-pay')}}" id="order-form" method="POST">
                
                <input type="hidden" value="{{$grandTotal}}" name="amount">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-10">

                        <div class="form-group">
                            <label for="customerName">Customer Name</label>
                            <input type="text" name="customerName" id="customerName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="customerEmail">Customer Email</label>
                            <input type="email" name="customerEmail" id="customerEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number">
                        </div>
                        <div class="form-group">
                        <label for="address_line_1">Address Line 1</label>
                        <textarea name="address_line_1" id="address_line_1" cols="30" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address_line_2">Address Line 2 (optiona) </label>
                            <textarea name="address_line_2" id="address_line_2" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="paymentDescription">
                                Description/Remark (optional)
                            </label>
                            <textarea name="paymentDescription" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary checkou">Check Out</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>


  