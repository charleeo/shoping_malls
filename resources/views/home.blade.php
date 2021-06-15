@extends('layouts.app')
@section('title',Auth::user()->name.' dashboard |')
@section('content')
<section class="dashboard">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-11">
            <div class="card">
              <div class="card-header">
                  <h1 class="text-center">Welcome {{Auth::user()->name}}</h1>
              </div>
              <div class="card-body">
                  <p>
                      We are glad to have you around, please do feel at home and use this platform to it utmost level
                  </p>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection
