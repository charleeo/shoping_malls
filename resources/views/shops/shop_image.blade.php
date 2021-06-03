@extends('layouts.app')
@section('title','upload an image for your shop')
@section('content')

@if ($businessDetails)
        <div class="row justify-content-center shadow-sm p-3">
            <div class="col-md-8 col-sm-12 py-5">
                <div class="card shadow-lg py-4 border-0">
                    <div class="card-header">
                        <h4 >Your Business Image Or Logo</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        <form action="{{route('business-profile-photo')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="profile_photo">PROFILE PICTURE</label>
                                <input type="file" class="form-control"name='profile_photo'>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Upload File</button>
                            </div>
                            <input type="hidden" name="business_id" value="{{$businessDetails->id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <p>Please create a shop before uploading an image</p>
    @endif
@endsection