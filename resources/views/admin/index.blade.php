@extends('layouts.admin')

@section('contents')

<div class="container">
    <div class="row">

      <div class="col lg-4">
          <div class="card p-5 text-center" style="width: 90%;">
            <i class="nav-icon fas fa-th text-warning" style="font-size:100px"></i>
            <div class="card-body">
            <a href="{{route('category.index')}}" class="btn btn-primary"> Category </a>
            </div>
          </div>
        </div>

        <div class="col lg-4">
          <div class="card p-5 text-center" style="width: 90%;">
            <i class="nav-icon fas fa-copy text-warning" style="font-size:100px"></i>
            <div class="card-body">
            <a href="{{route('products.index')}}" class="btn btn-primary"> Products </a>
            </div>
          </div>
        </div>

        <div class="col lg-4">
          <div class="card p-5 text-center" style="width: 90%;">
            <i class="nav-icon fas fa-users text-warning" style="font-size:100px"></i>
            <div class="card-body">
            <a href="{{route('users.index')}}" class="btn btn-primary"> Users  </a>
            </div>
          </div>
        </div>

        <div class="col lg-4">
          <div class="card p-5 text-center" style="width: 90%;">
            <i class="nav-icon fas fa-chart-pie text-warning" style="font-size:100px"></i>
            <div class="card-body">
            <a href="{{route('orders.index')}}" class="btn btn-primary" > Orders </a>
            </div>
          </div>
        </div>

    </div>
</div>



@endsection('contents')