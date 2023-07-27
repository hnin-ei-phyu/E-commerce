@extends('layouts.admin')

@section('contents')

<div class="container"> 
<section style="background-color: #AF7AC5;">
         <div class="container py-4" style="width:60%">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-12">

                  <div class="card card-stepper text-black" style="border-radius: 16px; ">

                    <div class="card-body p-5">

                      <div class="d-flex justify-content-between align-items-center mb-5">
                        <div>
                          <h4 class="mb-0"><strong> Thank you for your order! </strong></h4>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-6">
                            RECEIPT:
                          </div>
                          <div class="col-lg-6 d-flex justify-content-end">
                            RECEIPT VOUCHER: {{$order->orderid}}
                          </div>
                      </div>
                      &nbsp;
                      
                      <div class="d-flex justify-content-between">
                        <div class="d-lg-flex align-items-center">
                            <a href="#" data-toggle="modal" data-target="#processedModal"><i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0 text-warning"></i></a>
                            <div>
                              <p class="fw-bold mb-1 pl-2">Order</p>
                              <p class="fw-bold mb-0 pl-2">processed</p>
                              
                          </div>
                          <div>
                              
                          </div>
                        </div>
                        <div class="d-lg-flex align-items-center">
                        <a href="#" data-toggle="modal" data-target="#shippedModal"><i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0 text-info"></i></a>
                          <div>
                            <p class="fw-bold mb-1 pl-2">Order</p>
                            <p class="fw-bold mb-0 pl-2">Shipped</p>
                          </div>
                        </div>
                        <div class="d-lg-flex align-items-center">
                        <a href="#" data-toggle="modal" data-target="#enrouteModal"><i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0 text-danger"></i></a>
                          <div>
                            <p class="fw-bold mb-1 pl-2">Order</p>
                            <p class="fw-bold mb-0 pl-2">En Route</p>
                          </div>
                        </div>
                        <div class="d-lg-flex align-items-center">
                        <a href="#" data-toggle="modal" data-target="#arrivedModal"><i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0 text-success"></i></a>
                          <div>
                            <p class="fw-bold mb-1 pl-2">Order</p>
                            <p class="fw-bold mb-0 pl-2">Arrived</p>
                          </div>
                        </div>
                      </div>

                      <div class="progress mt-3">
                       
                        
                        @if($order->processed==1&& $order->shipped==0 && $order->enroute==0 && $order->arrived==0)
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        @elseif($order->processed==1 && $order->shipped==1 && $order->enroute==0 && $order->arrived==0)
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        @elseif($order->processed==1 && $order->shipped==1 && $order->enroute==1 && $order->arrived==0)
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        @elseif($order->processed==1 && $order->shipped==1 && $order->enroute==1 && $order->arrived==1)
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        @else 
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                          
                        @endif
                      </div>&nbsp;

                      <div class="container mt-3">
                      
                        <div class="row">

                            @php 

                              $items = substr($order->ordered_items,0,-1);
                              $products=explode("-",$items);
                            @endphp
                          <p>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item"><strong> Order Items </strong></li>


                              @foreach($products as $p)
                              @php 
                              $facts= explode(",",$p);
                              @endphp
                              <li class="list-group-item"><i class="fa fa-arrow-circle-right mr-3"></i><img src="{{asset('images')}}/{{$facts[0]}}" style="width:40px;height:auto;"> {{$facts[1]}} ({{$facts[2]}} * {{$facts[3]}}) = {{$facts[4]}} </li>
                              @endforeach             
                          </ul>
                          </p>

                        </div>
                      </div>


                      <div class="d-flex justify-content-between mt-3">
                        <p class="ml-3 mb-0">Order Id : {{$order->orderid}}</p>
                        <p class="mb-0"><span class="fw-bold me-4">Shipping Fee :</span> {{$order->shipping_fee}} ks</p>
                      </div>

                      <div class="d-flex justify-content-between mb-3">
                        <p class="ml-3 mb-0">Order Date : {{$order->order_date}}</p>
                        <p class="mb-0"><span class="fw-bold me-4">Total :</span> {{$order->total}} ks</p>
                      </div>

                      <div class="card-body p-2">
                        <div class="card-footer"
                          style="background-color: #AF7AC5; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                          <h5 class="d-flex align-items-center justify-content-end text-uppercase mb-0">Total
                          paid: <span class="h2 mb-0 ms-2">{{$order->total}} ks</span></h5>
                        </div>
                      </div>


                    </div>
                  </div>
              </div>
            </div>
            <div class="d-flex justify-content-end m-2"><button style="border-radius: 10px;"><a href="/send-email-pdf/{{$order->id}}"> Send Receipt to Email </a></button></div>
        </div>
</section>
 
</div>


<!-- Process Modal 1 -->

<div class="modal fade" id="processedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('orders.processed',$order->id)}}" method="post">
        @csrf
      <div class="modal-body text-center">
      <h1>Update Delivery Process...</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Process</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of Modal 1 -->

<!-- Shipped Modal 2 -->

<div class="modal fade" id="shippedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('orders.shipped',$order->id)}}" method="post">
        @csrf
      <div class="modal-body text-center">
      <h1>Update Shipping Process...</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Shipping</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of Modal 1 -->

<!-- En route Modal 2 -->

<div class="modal fade" id="enrouteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('orders.enroute',$order->id)}}" method="post">
        @csrf
      <div class="modal-body text-center">
      <h1>Update En Route Process...</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update En Route</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of Modal 1 -->

<!-- Arrived Modal 2 -->

<div class="modal fade" id="arrivedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('orders.arrived',$order->id)}}" method="post">
        @csrf
      <div class="modal-body text-center">
        <h1>Update Arrived Process...</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Arrived</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of Modal 1 -->


@endsection('contents')