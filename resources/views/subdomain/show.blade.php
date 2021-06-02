@extends('layouts.app')
@section('title',$domain->business_name.' page |')

@section('content')
<div class="row justify-content-center pt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Business Details') }}</div>

            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        {{$domain->business_name}}
                    </li>
                    <li class="list-group-item">
                        {{$domain->business_domain}}
                    </li>
                    <li class="list-group-item">
                        {{$domain->description}}
                    </li>
                    <li class="list-group-item">
                        {{$domain->business_phone_number}}
                    </li>
                    <li class="list-group-item">
                        {{$domain->business_email}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
