@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
      <div class="col-md-6 col-sm-10">
          <div class="card shadow-sm">
              <div class="card-header"><h3>Create A Business</h3></div>
              <div class="card-body">
                <div class="form-group">
                    <label for="name">Business Name</label>
                    <input type="text" class="form-control" placeholder="enter shop name">
                </div>

                <div class="form-group">
                    <label for="name">Businnes Location</label>
                    <input type="text" class="form-control" placeholder="enter shop location">
                </div>
                <div class="form-group">
                    <label for="name">Business Category</label>
                    <select name="category" id="" class="form-control">
                        <option value="">select a category</option>
                        @foreach ($categories as $category )
                        <option value="{{$category}}">
                            {{strtoupper($category)}}
                        </option>
                        @endforeach
                    </select>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection

