@extends('layouts.master')

@section('contents')



<div class="container">
    <div class="row">
       
      <table class="talbe table-striped">
        <tr class="bg-info text-white">
            <td> Action </td>
            <td> photo </td>
            <td> Name </td>
            <td> Quantity </td>
            <td> Price </td>
            <td> Total Price </td>
        </tr>

        @if(count((Array)$cart) > 0)

        @php 
            $subtotal=0;
            $grandtotal=0;

        @endphp
        @foreach($cart as $id=>$p)

        @php 

              $subtotal =$p['price'] * $p['quantity'];

        @endphp
        <tr>
            <td><a href="{{route('cart.remove',$id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
            <td><img src="{{asset('images')}}/{{$p['photo']}}" class="img-thumbnail" style="width: 60px; height: auto;"></td>
            <td>{{$p['name']}}</td>
            <td><a href="{{route('cart.decrease',$id)}}" class="btn btn-danger"> - </a> <input type="text" value="{{$p['quantity']}}" style="width:50px;"> <a href="{{route('cart.increase',$id)}}" class="btn btn-primary"> + </a> </td>
            <td>{{$p['price']}}</td>
            <td width="30%">{{number_format($subtotal,2) }} ks </td>
        </tr>
        @php 

          $grandtotal=$grandtotal+$subtotal;

        @endphp
        @endforeach

        <tr><td colspan="6"></td></tr>
        <tr class="bg-dark text-white"><td colspan="5">Grand Total </td><td>{{number_format($grandtotal,2)}} ks </td> </tr>
        <tr><td colspan="6"></td></tr>
        <tr class="mt-4">
            <td colspan="5">  </td>
            <td> 
                <a href="{{route('orders.create')}}" class="btn btn-info"><i class="fa fa-dollar"></i> Checkout </a>
                <a href="/" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i>  Continue Shopping </a>
            </td>
        </tr>
   

        @else

         <tr class="my-3 text-center">
            <th colspan="6"><img src="{{asset('images/ec.png')}}" style=" width:400px;height:auto;"><div class="my-3 text-center"><h3>Your Cart is Empty!</h3></div> </th>
        </tr>
        
        @endif

      </table>
      
        
    </div>
</div>



@endsection('contents')