@extends('layouts.app')
@section('title',' go digital with your business|')

@section('content')
 <section class="create-product">
    
    @include('ads_type.ads_heading2')

     <div class="row justify-content-center">
         <div class="col-md-7 col-sm-11">
             {{-- Advertisement type --}}
             @if(!isset($service))
                @include('ads_type.ads_type')
             @endif
             {{-- Ends here --}}
            
             {{-- For Service Ads --}}
             @include('services.service_ads')
         </div>
     </div>
 </section>

@endsection
