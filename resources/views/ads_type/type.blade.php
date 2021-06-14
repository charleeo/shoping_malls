@extends('layouts.app')

@section('title','New Advert creation')

@section('content')
<section class="ads-type-page">
    <div class="row justify-content-center pt-4">
        <div class="col-md-6 col-sm-11">
            @include('ads_type.ads_type')
            <p class="mt-4">
              Note: We have two Advert type in the system for now - for product and services. To access each one simply use the select box above to navigate the various pages and create your advert in seconds
            </p>
        </div>
    </div>
</section>
@endsection