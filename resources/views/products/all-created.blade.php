@extends('layouts.app')
@section('title','smart and sharp product|')
@section('content')
<section class="products-page">

    @include('ads_type.ads_heading2')

    <div class="position-center">
        <table class="table table-striped table-condensed table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @if(count($products) >0)
              @foreach ($products as $product )
               <tr>
                   <td>{{$product->product_name}}</td>
                   <td>
                    @php ($images = explode('|',$product->product_images))
                    <img class="images-class" src="{{asset($images[1])}}" alt="{{$product->product_name}}"
                    style="width: 40px">
                   </td>
                   <td>
                       {{$product->price}}
                   </td>
                    <td>
                        <a href="{{route('products.edit',['id'=>$product->id])}}" class=" btn btn-default btn-sm ">{{_('edit')}} <i class="fas fa-edit"></i> </a>
                        
                        {{--  --}}
                        <a href='{{route('products.show',["product"=>$product->id,"name"=>$product->product_name])}}?category={{$product->productCategory->id}}&shop={{$product->shop->id}}'class="btn btn-sm btn-default">view <i class="fas fa-eye"></i> </a>
                    </td>
                    <td>
                        <a href="{{route('destroy',['product'=>$product->id])}}" class="btn btn-default btn-sm"> <i class="fas fa-trash text-danger"></i> Del </a>
                    </td>
               </tr>              
              @endforeach
              @else
              <tr>
                  <td colspan="4">No Data Found</td>
              </tr>
              @endif
            </tbody>
        </table>
    </div>
</section>

@endsection

