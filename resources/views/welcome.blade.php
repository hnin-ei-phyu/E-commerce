@extends('layouts.master')

@section('contents')

<div class="container">
    <div class="row">
            <div class="col"> {{$products->links()}} </div>
            <div class="col d-flex justify-content-end">
                <form action="{{route('front.sreach')}}" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <select name="category" class="form-control">
                                <option>Products</option>
                                @foreach( $categories as $cat)
                                <option value="{{$cat->name}}"> {{$cat->name}} </option>
                                @endforeach
                                </select>
                            </td>
                        
                            <td><button type="submit" style="border-radius: 5px;height: 40px;"><i class="fa fa-search"></i> Search </button></td>
                        </tr>
                    </table>
                </form>
            </div>
    </div>
</div>

<div class="container">
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

<div class="container">
    <div class="row col d-flex justify-content-end">
        <div class="col"> {{$products->links()}} </div>
    </div>
</div>

@endsection('contents')