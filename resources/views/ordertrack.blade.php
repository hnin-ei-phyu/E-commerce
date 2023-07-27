@extends('layouts.master')

@section('contents')



<div class="container">
    <div class="row">
      <div class="d-flex justify-content-end my-2"><h4>Enter Your Order Id and See Your Order Status Here!</h4></div>
       
      <form action="{{route('orders.tracking')}}" method="post" class="d-flex justify-content-end">
        @csrf
        <input type="text" name="orderid" placeholder="#00000">
        <button type="submit"><i class="fa fa-search"></i>search</button>
      </form>
        
    </div>
</div>


@if(!isset($order))

<div class="container py-5">
    <div class="card p-5 shadow-0 border col-sm-12" style="border-radius:10px;">

        <div class="text-center">
                  <img src="{{asset('images/tracking.png')}}" class="img-fluid" alt="Phone" style="width:200px;height:auto;">
        </div>

      @else 
    </div>

    <div class="container py-3"> 
      <section style="background-color: #AF7AC5;">
         <div class="container py-4" style="width:70%">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-12">

                  <div class="card card-stepper text-black" style="border-radius: 16px; ">

                    <div class="card-body p-5">

                      <div class="d-flex justify-content-between align-items-center mb-5">
                        <div>
                          <h4 class="mb-0"><strong> Here is your order status! </strong></h4>
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
                            <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0 text-warning"></i>
                            <div>
                              <p class="fw-bold mb-1 pl-2">Order</p>
                              <p class="fw-bold mb-0 pl-2">processed</p>
                              
                          </div>
                          <div>
                              
                          </div>
                        </div>
                        <div class="d-lg-flex align-items-center">
                        <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0 text-info"></i>
                          <div>
                            <p class="fw-bold mb-1 pl-2">Order</p>
                            <p class="fw-bold mb-0 pl-2">Shipped</p>
                          </div>
                        </div>
                        <div class="d-lg-flex align-items-center">
                        <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0 text-danger"></i>
                          <div>
                            <p class="fw-bold mb-1 pl-2">Order</p>
                            <p class="fw-bold mb-0 pl-2">En Route</p>
                          </div>
                        </div>
                        <div class="d-lg-flex align-items-center">
                        <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0 text-success"></i>
                          <div>
                            <p class="fw-bold mb-1 pl-2">Order</p>
                            <p class="fw-bold mb-0 pl-2">Arrived</p>
                          </div>
                        </div>
                      </div>

                      <div class="progress mt-3">
                       
                        
                        @if($order->processed==1&& $order->shipped==0 && $order->enroute==0 && $order->arrived==0)
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        @elseif($order->processed==1&& $order->shipped==1 && $order->enroute==0 && $order->arrived==0)
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        @elseif($order->processed==1&& $order->shipped==1 && $order->enroute==1 && $order->arrived==0)
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
        </div>
      </section>
    </div>
  @endif


@endsection('contents')