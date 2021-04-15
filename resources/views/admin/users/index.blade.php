@extends('layouts.admin')

@section('page_title')
    Users
@endsection

@section('create_new')
<a class="btn btn-primary float-right" href="{{route('user.create')}}">
    Add New
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Users</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Permissions</th>
                <th>Delete</th>
                
                
              </tr>
            </thead>
            <tbody>

              @foreach ($users as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->admin)
                        <a href="{{ route('user.not.admin',['id' => $user->id]) }}" class="btn btn-info">
                            Revoke Admin
                        </a>
                    @else
                        <a href="{{ route('user.admin',['id' => $user->id]) }}" class="btn  btn-danger">
                            Make Admin
                        </a>
                    @endif
                   
                </td>
                <td>
                    @if (Auth::id() !== $user->id)
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                            Delete User
                          </button>
                                
                    @else
                                <button type="button" class="btn btn-danger disabled">Delete User</button>     
                    @endif
                </td>

                
               
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Danger</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h6>Are you sure you want to delete "{{$user->name}}" permanently</h6>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
              <a href="{{ route('user.delete',['id' => $user->id]) }}" >
                <button type="button" class="btn btn-outline-light">Delete</button>
              </a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.card -->
      <div class="col-12 d-flex justify-content-center pt-4">
        {{$users -> links() }}
      </div>
    </div>
  </div>
@endsection