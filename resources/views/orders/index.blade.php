@extends('layouts.admin')

@section('contents')


<div class="container">
    <div class="row">
        <div class="col"> {{$orders->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('orders.sreach')}}" method="post">
                @csrf
                <input type="text" name="search">
                <button><i class="fa fa-search"></i> Search </button>
            </form>
        </div>
    </div>
</div>

<div class="container py-3">
    
    <table class="table table-striped">
        <tr>
            <td>Order Id</td>
            <td>Customer Name</td>
            <td>Customer Email</td>
            <td>Customer Phone</td>
            <td>Customer Address</td>
            <td>Order status</td>
            <td>Order Delivery</td>
          
            <td> Actions </td>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->orderid}}</td>
            <td>{{$order->customer_name}}</td>
            <td>{{$order->customer_email}}</td>
            <td>{{$order->customer_phone}}</td>
            <td>{{$order->customer_address}}</td>
            <td>{{$order->order_status}}</td>
            <td>{{$order->order_delivery}}</td>
          
            <td class="d-flex content-align-center">
                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Details </a> 
                &nbsp;&nbsp;


                <form action="{{route('orders.destroy',$order->id)}}" method="post">
                @csrf
                @method('DELETE') 

                <button href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button> 
                </form> 
             </td>
        </tr>

        @endforeach
        
       
    </table>

</div>
<div class="container">
    {{$orders->links()}}
</div>

@endsection('contents')

