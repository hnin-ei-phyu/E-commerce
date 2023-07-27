@extends('layouts.master')

@section('contents')
<div class="container">
    <section class="gradient-custom-2">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-lg-12 col-xl-12">
                <div class="card">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                      @if($user[0]->photo=="" || $user[0]->photo == "none" )
                    <img src="{{asset('images/sunglasses2.png')}}"
                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                        style="width: 150px; z-index: 1">
                      @else 
                      <img src="{{asset('images')}}/{{$user[0]->photo}}"
                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                        style="width: 150px; z-index: 1">
                      @endif
        
                    
                        <button type="submit" data-toggle="modal" data-target="#photoModal" class="btn btn-outline-dark mt-2" data-mdb-ripple-color="dark"
                          style="z-index: 1;">
                          Update photo
                        </button>
   
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                       <p><h5>{{$user[0]->name}}</h5></p>
                    </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                    
                </div>
                <div class="card-body p-4 text-black">
                    <div class="mb-5">
                    <p class="lead fw-normal mb-1 py-4">Personal Information</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                        <p class="font-italic mb-1">Email     : {{$user[0]->email}}</p>
                        <p class="font-italic mb-0">Phone     : {{$user[0]->phone}}</p>
                        <p class="font-italic mb-1">Address   : {{$user[0]->address}}</p>  
                        <button type="submit" data-toggle="modal" data-target="#infoModal" class="btn btn-outline-dark mt-2" data-mdb-ripple-color="dark"
                        style="z-index: 1;">
                        <i class="fa fa-pencil"></i> Edit Info
                        </button>                    
                    </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0">My Orders</p>
                    <p class="mb-0"><a href="#!" class="text-muted"></a></p>
                    </div>
                    <hr>
           

                    <!--Order Accordion --> 

                        <div class="container-fluid bg-gray" id="accordion-style-1">
                            <div class="container">
                                <section>
                                    <div class="row">
                                       
                                        <div class="col-12 mx-auto">
                                            <div class="accordion" id="accordionExample">

                                            @foreach($orders as $order)

                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$order->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fa fa-list mr-3"></i>{{$order->order_date}} &nbsp;&nbsp;| Order ID: {{$order->orderid}}
                                                    </button>
                                                </h5>
                                                    </div>

                                                    <div id="{{$order->id}}" class="collapse fade" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <p class="text-muted mb-0">  
                                                                @php 

                                                                $items = substr($order->ordered_items,0,-1);
                                                                $products=explode("-",$items);

                                                                @endphp
                                                                <p class="text-muted mb-0">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item "><strong> Ordered Items </strong></li>
                                                                        @foreach($products as $p)

                                                                            @php

                                                                            $facts=explode(",",$p);
                                                                
                                                                            @endphp

                                                                        <li class="list-group-item"><i class="fa fa-arrow-circle-right pr-2"></i><img src="{{asset('images')}}/{{$facts[0]}}" class="img-thumbnail" style="width: 50px;height:auto;"> {{$facts[1]}} ( {{$facts[2]}} * {{$facts[3]}} ) =  {{$facts[4]}}</li>
                                                                        
                                                                        @endforeach
                                                                        
                                                                        
                                                                    </ul>
                                                                </p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                               
                                            </div>
                                        </div>	
                                    </div>
                                </section>
                            </div>
                        </div>

                     <!--accordion --> 
                    
                    <hr>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
</div>

<!-- Info Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Your Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users.update',$user[0]->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      <div class="modal-body text-center">

            <input type="file" name="user_photo" class="form-control mb-3">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Photo</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of Modal -->

<!-- Info Modal 1 -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Your Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users.update',$user[0]->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      <div class="modal-body text-center">
            <input type="text" name="new_name" value="{{$user[0]->name}}" class="form-control mb-3">
            <input type="text" name="new_email" value="{{$user[0]->email}}" class="form-control mb-3">
            <input type="text" name="new_phone" value="{{$user[0]->phone}}" class="form-control mb-3">
            <input type="text" name="new_address" value="{{$user[0]->address}}" class="form-control mb-3">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Info</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of Modal 1 -->

@endsection('contents')
