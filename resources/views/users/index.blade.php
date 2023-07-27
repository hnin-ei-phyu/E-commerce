@extends('layouts.admin')

@section('contents')


<div class="container">
    <div class="row">
        <div class="col"> {{$users->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('users.sreach')}}" method="post">
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
            <td>User Type</td>
            <td>User Name</td>
            <td>User Email</td>
            <td>User Phone</td>
            <td>User/Admin</td>
            
            <td> Actions </td>
        </tr>
        @foreach($users as $user)

        
        <tr>
            <td>{{$user->user_type}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>                 
                <label class="switch">
                <input type="checkbox" id="switch-primary-{{$user->id}}" value="{{$user->id}}" data-toggle="modal" data-target="#toggleAdminUser{{$user->id}}" name="toggle" {{ $user->user_type == "admin" ? 'checked' : '' }}>
                <span class="slider round"></span>
                </label>
            </td>
          
            <td class="d-flex content-align-center">
                <form action="{{route('users.destroy',$user->id)}}" method="post">
                @csrf
                @method('DELETE') 

                <button href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button> 
                </form> 
             </td>
        </tr>

        <!--User/Admin Modal-->
        <div class="modal fade" id="toggleAdminUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Admin or User</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="{{route('users.update',$user->id)}}" method="post">
                @csrf 
                @method('PATCH')
                
                Are you sure you want to switch user type?
                <input type="hidden" name="user_type" value="{{$user->user_type}}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Update  </button>
            </form>

              </div>
            </div>
          </div>
        </div>

        @endforeach
    </table>

</div>
<div class="container">
    {{$users->links()}}
</div>


@endsection('contents')

