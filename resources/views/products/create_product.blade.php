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
                 {{-- {{$product->product_name}} --}}
                 <div class="card-body">
                   <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control"
                        value="{{ old('product_name', (isset($product->product_name))? $product->product_name: '') }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price (&#8358;)</label>
                        <input type="number" name="price" min="0" name="price" class="form-control"
                        value="{{ old('price', (isset($product->price))? $product->price: '') }}">
                    </div>

                    <div class="form-group">
                        <label for="quantities">Quantities (Optional) </label>
                        <input type="number"  min="0" name="quantities" class="form-control"
                        value="{{ old('quantites', (isset($product->quantity))? $product->quantity: '') }}">
                    </div>



                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select  name="categories" class="form-control">
                            <option value="">choose</option>
                            @foreach ($product_categories as $cat )
                                <option value="{{$cat->id}}"
                                    {{ old('categories') == $cat->id?"selected" :"" }}
                                    {{isset($product->product_category) && $product->product_category===$cat->id?'selected':''
                                    }}
                                    >
                                    {{$cat->product_category_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripton</label>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="enter item descripton here" class="form-control"
                        >{{ old('description', (isset($product->product_description))? $product->product_description: '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="delivery-status">Delivery Status</label>
                        <select name="delivery_status" id="" class="form-control">
                            <option value="">choose</option>
                            <option value="pay-on-delivery">Payment On Delivery</option>
                            <option value="payment-before-delivery">Payment Before Delivery</option>
                            <option value="both">Either of the two</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <input type="text" name="visibility" placeholder="enter where and where your product can be accessed" class="form-control"
                        value="{{ old('visibility', (isset($product->location))? $product->location: '') }}">
                    </div>
                    <div class="form-group">
                        <div class="file-input">
                            <input type="file" id="file" name="image[]" multiple class="file">
                            <label for="file">
                                <i class="fa fa-upload fa-2x " id="my-file"></i>
                              <p class="file-name"></p>
                            </label>
                          </div>
                          @if(isset($product))
                          <form action="{{route('products.destroy',['product'=>$product->id])}}">
                            @foreach ($images as $image )
                                <img src="{{asset("$image")}}" alt="{{$product->product_name}}" style="height:90px; width:90px; margin:20px">
                            @endforeach
                            </form>
                            <p>You can change the images at anytime</p>
                          @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Create</button>
                    </div>
                    <input type="hidden" name="product_id" value="">
                   </form>
                 </div>
             </div>
         </div>
     </div>
 </section>

@endsection
