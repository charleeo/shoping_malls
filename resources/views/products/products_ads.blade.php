<div class="card shadow-lg border-0" id="productsAds">
    <div class="card-header">
        @if (isset($product))
        <h3 class="text-center">Update Your Store</h3>
        @else <h3 class="text-center">Stock Up Your Store</h3>
        @endif
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
           <label for="quantity">Previous Price (Optional, it is to show discount on your item) </label>
           <input type="number"  min="0" name="discount" class="form-control"
           value="{{ old('discount', (isset($product->discount))? $product->discount: '') }}">
       </div>


       <div class="form-group">
           <label for="quantity">Quantities  </label>
           <input type="number"  min="0" name="quantity" class="form-control"
           value="{{ old('quantity', (isset($product->quantity))? $product->quantity: '') }}">
       </div>



       <div class="form-group">
           <label for="product_category">Product Category</label>
           <select  name="product_category" class="form-control">
               <option value="">choose</option>
               @foreach ($product_categories as $cat )
                   <option value="{{$cat->id}}"
                       {{ old('product_category') == $cat->id?"selected" :"" }}
                       {{isset($product->product_category) && $product->product_category===$cat->id?'selected':''
                       }}
                       >
                       {{$cat->product_category_name}}
                   </option>
               @endforeach
           </select>
       </div>
       <div class="form-group">
           <label for="product_description">Descripton</label>
           <textarea name="product_description" id="" cols="5" rows="2" placeholder="enter item descripton here" class="form-control"
           >{{ old('product_description', (isset($product->product_description))? $product->product_description: '') }}</textarea>
       </div>
       <div class="form-group">
           <label for="delivery_status">Delivery Status</label>
           <select name="delivery_status" id="" class="form-control">
               <option value="">choose</option>
               @foreach ($deliveryStatus as  $status)
                 <option value="{{$status}}"
                 {{ old('delivery_status') == $status?"selected" :"" }}
                       {{isset($product->delivery_status) && $product->delivery_status===$status?'selected':''
                       }}
                 >{{strToUpper($status)}}</option>
               @endforeach
           </select>
       </div>
       <div class="form-group">
           <label for="location">Location</label>
           <input type="text" name="location" placeholder="enter where and where your product can be accessed" class="form-control"
           value="{{ old('location', (isset($product->location))? $product->location: '') }}">
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
             {{-- <form action="{{route('products.destroy',['product'=>$product->id])}}"> --}}
               @foreach ($images as $image )
                   <img src="{{asset("$image")}}" alt="{{$product->product_name}}" style="height:90px; width:90px; margin:20px">
               @endforeach
               {{-- </form> --}}
               <p>You can change the images at anytime</p>
             @endif
       </div>
       <div class="form-group">
           <button class="btn  btn-primary">{{$text}}</button>
       </div>
       <input type="hidden" name="product_id" value="{{isset($product)?$product->id:''}}">
      </form>
    </div>
</div>