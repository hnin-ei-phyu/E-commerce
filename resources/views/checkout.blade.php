@extends('layouts.master')

@section('contents')



<div class="container">
    <form action="{{route('orders.store')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-lg-6">
                <h1> Shipping Address </h1>
                @php 
                $name=Auth::user()->name;
                $email=Auth::user()->email;
                @endphp
                <hr>
                <input type="text" name="customer_name" value="{{$name}}" class ="form-control mb-3" readonly>
                <input type="text" name="customer_email" value="{{$email}}" class ="form-control mb-3" readonly>
                <input type="text" name="customer_phone" class ="form-control mb-3" placeholder="Customer Phone">
                <select name="shipping_type" class="form-control mb-3">
                  <option value=""> Choose your Distance </option>
                  <option value="free"> Free (0)ks</option>
                  <option value="short">Short Distance (1000)ks </option>
                  <option value="long">Long Distnace (3000)ks</option>
                </select>
                <textarea type="text" name="customer_address" rows="10" class ="form-control mb-3" placeholder="Customer Address"></textarea>

            </div>
            @php

            $subtotal = 0;
            $grandtotal = 0;
            $ordered_list = "";

            @endphp

            
            <div class="col-lg-6">
                <ul class="list-grop list-group-flush">
                    <li class="list-group-item"></li>&nbsp;
                </ul>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item active">Product Lists </li>
                    @foreach(Session::get('cart') as $id=>$product)
                    @php
                    
                    $subtotal = $product['price'] * $product['quantity'];
                    $grandtotal = $grandtotal + $subtotal;
                    $ordered_list .= $product['photo'] .",". $product['name'] .",". $product['price'] .",". $product['quantity'] .",". $subtotal . "-";

                    @endphp 
                    <li class="list-group-item ">{{$product['name']}} ({{$product['price']}} x {{$product['quantity']}}) = {{$subtotal}}</li>
                    @endforeach

                    <input type="hidden" name="ordered_items" value="{{$ordered_list}}">
                    <input type="hidden" name="grandtotal" value="{{$grandtotal}}">
                    <li class="list-group-item "><span style="font-weight:800;"> GrandToal: {{$grandtotal}} </span></li>
                    <li class="list-group-item active"> Payment Type

                    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       <input type="radio" name="payment_type" value="Cash On Delivery"> &nbsp;&nbsp; Cash On Delivery
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"> Make Payment when the order is delivered   </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
             <input type="radio" name="payment_type" value="KPay"> &nbsp;&nbsp; KPay  &nbsp;&nbsp;
             <input type="radio" name="payment_type" value="Wave Pay"> &nbsp;&nbsp; Wave Pay &nbsp;&nbsp;
             <input type="radio" name="payment_type" value="Bank Transfer">  &nbsp;&nbsp;Bank Transter &nbsp;&nbsp;
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
         <h5> Upload Payment Receipt Copy Here </h5>
         <input type="file" name="receipt_copy" id="">
      </div>
    </div>
  </div>
  
</div>

                        
                
                    </li>
                    <hr>
                    <div class ="d-flex content-align-center">
                        <li class="list-group-item "><button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Place Order </button> </li>
                        <li class="list-group-item "><a href="/" class="btn btn-danger"><i class="fa fa-arrow-circle-right"></i> Continue Shopping </a></li>
                    </div>
                        
                </ul>    
            </div>
        </div>
    </form>
</div>



@endsection('contents')