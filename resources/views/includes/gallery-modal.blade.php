<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body " id="gallery-modal-body">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval='false'>
                <div class="carousel-inner text-center">
                    @foreach ($images as $key=> $image)
                    <div class="carousel-item {{$images[0]==$image?'active':''}}">
                        <div class="gallery-image-wrapper">
                            <img src="{{asset($image)}}"  alt="{{$product->product_name}}"
                            class='gallery-popup' data-key={{$key}}width="100%">
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
      </div>
    </div>
  </div>
