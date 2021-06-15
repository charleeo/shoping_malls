@extends('layouts.app')

@section('title','Manage Advert records |')

@section('content')
@include('ads_type.ads_heading2')
<section class="ads-type-page py-5">
    <p class="text-center mb-3">
        Note: Use any of the cards to access your records
    </p>
   <div class="row justify-content-center">
       <div class="col-md-5 col-sm-11">
           <div class="card p-3">
               <div class="card-header">
                   <h3 class="text-center">Products Records here</h3>
               </div>
               <div class="card-body shadow-lg">
                   <h4 class="text-center">
                      <a href="{{route('products.all-created')}}" class="btn btn-default">Products Records</a>
                   </h4>
               </div>
           </div>
       </div>
       <div class="col-md-5 col-sm-11">
        <div class="card p-3">
            <div class="card-header">
                <h3 class="text-center">Services Records here</h3>
            </div>
            <div class="card-body shadow-lg">
                <h4 class="text-center">
                   <a href="{{route('services.all-created')}}" class="btn btn-default">Services Records</a>
                </h4>
            </div>
        </div>
       </div>
   </div>
</section>
@endsection