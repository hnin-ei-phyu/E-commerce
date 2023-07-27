@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="font-size:100px;color:pink;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('products.update',$products->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" name="name" class="form-control mb-3" value="{{$products->name}}">
            <input type="text" name="price" class="form-control mb-3" value="{{$products->price}}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item "><label> Current Photo </label></li>
                <li class="list-group-item"><img src="{{asset('images')}}/{{$products->photo}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                <li class="list-group-item"><label> New Photo </label></li>
            </ul>
            <input type="hidden" name="curr_photo" value="{{$products->photo}}" class="form-control mb-3">
            <input type="file" name="new_photo" class="form-control mb-3">
         
            <button type="submit" class="form-control mb-3 btn btn-warning" name="submit"><i class="fa fa-refresh"></i> Update </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')

