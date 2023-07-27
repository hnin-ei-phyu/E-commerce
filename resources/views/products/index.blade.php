@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <a href="{{route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Product </a>

</div>

<div class="container">
    <div class="row">
        <div class="col"> {{$products->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('products.sreach')}}" method="post">
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
            <td>Id</td>
            <td>Category</td>
            <td>Name</td>
            <td>Price</td>
            <td>Photo</td>
          
            <td> Actions </td>
        </tr>
        @foreach($products as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->category}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->price}}</td>
            <td><img src="{{asset('images')}}/{{$p->photo}}" style="width: 100px; height: auto"></td>
          
            <td class="d-flex content-align-center">
                <a href="{{route('products.edit',$p->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a> 
                &nbsp;&nbsp;


                <form action="{{route('products.destroy',$p->id)}}" method="post">
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
    {{$products->links()}}
</div>


@endsection('contents')

