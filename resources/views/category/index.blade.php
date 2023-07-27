@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Category </a>

</div>

<div class="container py-3">
    
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Name</td>
          
            <td> Actions </td>
        </tr>
        @foreach($categories as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
          
            <td class="d-flex content-align-center">
                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a> 
                &nbsp;&nbsp;


                <form action="{{route('category.destroy',$cat->id)}}" method="post">
                @csrf
                @method('DELETE') 

                <button href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button> 
                </form> 
             </td>
        </tr>

        @endforeach
        
       
    </table>

</div>

@endsection('contents')

