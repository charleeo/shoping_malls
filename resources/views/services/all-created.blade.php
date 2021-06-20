@extends('layouts.app')
@section('title','smart and sharp product|')
@section('content')
<section class="services-page">
   @include('ads_type.ads_heading2')
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <table class="table table-striped  table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th  class="text-center">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @if(count($services) >0)
                  @foreach ($services as $service )
                   <tr>
                       <td>{{$service->service_name}}</td>
                       <td>
                        @php ($images = explode('|',$service->service_images))
                        <img class="images-class" src="{{asset($images[1])}}" alt="{{$service->service_name}}"
                        style="width: 40px">
                       </td>
                       <td>
                           {{$service->price}}
                       </td>
                        <td>
                            <a href="{{route('services.edit',['id'=>$service->id])}}" class=" btn btn-default btn-sm ">{{_('edit')}} <i class="fas fa-edit"></i> </a>

                            {{--  --}}
                            <a href='{{route('services.show',["service"=>$service->id,"name"=>$service->service_name])}}?shop={{$service->shop->id}}'class="btn btn-sm btn-default">view <i class="fas fa-eye"></i> </a>
                            {{--  --}}

                            <a href="{{route('services.delete',['service'=>$service->id])}}" class="btn btn-default btn-sm"> <i class="fas fa-trash text-danger"></i> Del </a>
                        </td>
                   </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="4">No data found</td>
                  </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

