@extends('layouts.app')
@section('title','create your online shop fast and easy')
@section('content')
<section class="create-business">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-10">
            <div class="card shadow-sm">
                <div class="card-header"><h3>Create A Business</h3></div>
                <div class="card-body">
                    <form action="{{route('shops')}}" method="POST">
                      @csrf
                        <div class="form-group">
                            <label for="name">Business Name</label>
                            <input type="text" name='business_name' class="form-control" placeholder="enter business name"
                            value="{{ old('business_name', (isset($shopDetails->shop_name))? $shopDetails->shop_name: '') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Businnes Description</label>
                            <input type="text" name='description' class="form-control" placeholder="enter shop location"
                            value="{{ old('description', (isset($shopDetails->description))? $shopDetails->description: '') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Business Category</label>
                            <select name="business_category_id" id="" class="form-control">
                                <option value="">select a category</option>
                                @foreach ($categories as $category )
                                <option value="{{$category['id']}}"
                                {{ old('business_category_id') == $category['id']?"selected" :"" }}
                                {{isset($shopDetails->business_category_id) && $shopDetails->business_category_id===$category['id']?'selected':''
                                }}>{{strtoupper($category['category_name'])}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Upload a business profile image to be in the home page --}}

    {{-- Only do this if there is already a business profile created --}}
    @if ($shopDetails)
        <div class="row justify-content-center shadow-sm p-3">
            <div class="col-md-5 col-sm-8">
                <div class="card shadow-lg p-5 border-0">
                    <div class="card-header">
                        <h4 class="text-center">Upload a profile picture for your business</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        <form action="{{route('business-profile-photo')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">PROFILE PICTURE</label>
                                <input type="file" class="form-control"name='profile_photo'>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Upload File</button>
                            </div>
                            <input type="hidden" name="business_id" value="{{$shopDetails->id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection

