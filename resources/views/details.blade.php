@extends('layouts.master')

@section('contents')



<div class="container py-4">
    <div class="row">
       
      <div class="col-lg-6">
        <img src="{{asset('images')}}/{{$product->photo}}" class="img-fluid" style="width:400px;height:400px;">
      </div>
      <div class="col-lg-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item active">Product Details </li>
            <li class="list-group-item ">cateogry: <h3>{{$product->category}} </h3> </li>
            <li class="list-group-item "><span style="color:orange;font-weight:800;">{{$product->name}}</span></li>
            <li class="list-group-item ">Price: <h3>{{$product->price}}</h3> </li>
            <li class="list-group-item "><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy </a> </li>
            <li class="list-group-item "><a href="/" class="btn btn-danger"><i class="fa fa-arrow-circle-right"></i> Continue Shopping </a></li>
        </ul>
      </div>
      
        
    </div>
</div>

<div class="container py-4">
  <div class="row py-4">
    <h3 style="color: rgb(19, 19, 94);">You May Also Like!</h3>
  </div>
    <div class="row">
        @foreach($products as $p)
        <div class="col-lg-3 p-4">
            <div class="card" style="width: 100%;">
                <img src="{{asset('images')}}/{{$p->photo}}" class="card-img-top" style="width:230px; height: auto;">
                <div class="card-body">
                    <h5 class="card-title">{{$p->name}}</h5>
                    <p class="card-text">Price: {{$p->price}}</p>
                    <div class="d-flex content-align-end">
                    <a href="{{route('cart.add',$p->id)}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy </a>
                    &nbsp;&nbsp;
                    <a href="{{route('front.show',$p->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i> Details </a>
                   </div>
                </div>  
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection('contents')