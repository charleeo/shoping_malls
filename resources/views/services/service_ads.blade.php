<div class="card shadow-lg border-0" id="servicesAds">
    <div class="card-header">
        @if (isset($service))
        <h3 class="text-center">Update service information</h3>
        @else <h3 class="text-center">Create a service</h3>
        @endif
    </div>
    <div class="card-body">
      <form action="{{route('services.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
           <label for="service_name">Service Name</label>
           <input type="text" name="service_name" class="form-control"
           value="{{ old('service_name', (isset($service->service_name))? $service->service_name: '') }}" placeholder="service name here" spellcheck="english"/>
       </div>
       <div class="form-group">
           <label for="price">Price (&#8358;)</label>
           <input type="number" name="price" min="0" name="price" class="form-control"
           value="{{ old('price', (isset($service->price))? $service->price: '') }}"
           placeholder="service price or charges here"/>
       </div>

       <div class="form-group">
            <label for="service_location">Service Location </label>
            <input type="text" name="service_location" min="0" name="service_location" class="form-control"
            value="{{ old('service_location', (isset($service->service_location))? $service->service_location: '') }}"
            placeholder="service  location here"/>
        </div>

       <div class="form-group">
           <label for="service_description">Descripton</label>
           <textarea name="service_description" id="" cols="5" rows="2" placeholder="enter item descripton here" class="form-control"
           >{{ old('service_description', (isset($service->service_description))? $service->service_description: '') }}</textarea>
       </div>
        
       @include('ads_type.multitple_file_input')
        
       <div class="form-group">
           <button class="btn  btn-primary">{{$text}}</button>
       </div>
       <input type="hidden" name="service_id" value="{{isset($service)?$service->id:''}}">
      </form>
    </div>
</div>

