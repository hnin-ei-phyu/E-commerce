@extends('layouts.admin')

@section('contents')


<div class="container py-3">
    <div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="font-size:100px;color:pink;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <select name="category" class="form-control">
                <option>-Category-</option>

                @foreach( $categories as $cat)
                <option value="{{$cat->name}}"> {{$cat->name}} </option>

               @endforeach

            </select>

            <input type="text" name="name" class="form-control mb-3" placeholder="Enter Name">
            <input type="text" name="price" class="form-control mb-3" placeholder="Enter Price">
            <input type="file" name="photo" class="form-control mb-3">
         
            <button type="submit" class="form-control mb-3 btn btn-primary" name="submit"><i class="fa fa-save"></i> Save </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')

