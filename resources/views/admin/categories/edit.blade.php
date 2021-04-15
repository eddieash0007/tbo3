@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category: {{$category->name}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
   
      <div class="card-body">
        <form action="{{route('category.update', ['id'=> $category->id])}}" method="POST">
            {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{$category->name}}" name="name">
        </div>
      </div>
      <div class="card-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Update Category</button>
          </div>
        
      </div>
    </form>
  </div>
@endsection