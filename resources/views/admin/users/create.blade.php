@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create a New User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
   
      <div class="card-body">
        <form action="{{route('user.store')}}" method="POST">
            {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter the user's name" name="name">
          @error('name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">User E-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter the user's e-mail" name="email">
          </div>

          @error('email')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="card-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Store User</button>
          </div>
        
      </div>
    </form>
  </div>
@endsection