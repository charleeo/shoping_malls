<div class="form-group">
    <div class="file-input">
        <input type="file" id="file" name="image[]" multiple class="file">
        <label for="file">
            <i class="fa fa-upload fa-2x " id="my-file"></i>
          <p class="file-name"></p>
        </label>
      </div>
      @if(isset($product) || isset($service))
      @foreach ($images as $image )
        <small class="parents">
            <small class="immediate-parents">
                <img src="{{asset("$image")}}" alt="advert images" style="height:50px; width:50px; margin:10px; cursor: pointer;" 
                 class="rounded-circle delete-form-image"/> 
            </small>
        </small>
            @endforeach
         @php
             $productID = isset($product)?$product->id: $service->id
         @endphp
        <input type="hidden" name="input_image_path" class="input_image_path">
        <input type="hidden" value="{{$productID}}" name="product_id" class="product_id">
        <p>Click or any of the images to delete it</p>
        @else
        <p>You can select multiple images</p>
      @endif
      <p class="response-text text-info d-inline"></p>
      @if(isset($product))
        <input type="hidden" name="ads_type" value="product" class="ads_type">
        @elseif(isset($service))
        <input type="hidden" name="ads_type" value="service" class="ads_type">
      @endif
</div>

