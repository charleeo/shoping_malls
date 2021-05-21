@extends('layouts.app')
@section('title','store stocking|')
@section('content')

 <section class="create-product">
     <div class="row justify-content-center">
         <div class="col-md-7 col-sm-9">
             <div class="card shadow-lg border-0">
                 <div class="card-header">
                     <h3 class="text-center">Stock Up Your Store</h3>
                 </div>
                 <div class="card-body">
                   <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" min="0" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantities">Quantities (Optional) </label>
                        <input type="number" name="quantites" min="0" name="quantities" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <input type="text" name="categories" name="categories" class="form-control" placeholder="state item category here">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripton</label>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="enter item descripton here" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="delivery-status">Delivery Status</label>
                        <select name="deleivery_status" id="" class="form-control">
                            <option value="">choose</option>
                            <option value="pay-on-delivery">Payment On Delivery</option>
                            <option value="payment-before-delivery">Payment Before Delivery</option>
                            <option value="both">Either of the two</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <input type="text" name="visibility" placeholder="enter where and where your product can be accessed" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="file-input">
                            <input type="file" id="file" name="image[]" multiple class="file">
                            <label for="file">
                                <i class="fa fa-upload fa-2x " id="my-file"></i>
                              <p class="file-name"></p>
                            </label>
                          </div>                        
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Create</button>
                    </div>
                    
                   </form>
                 </div>
             </div>
         </div>
     </div>
 </section>

@endsection
