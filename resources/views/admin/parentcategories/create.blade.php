@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create a New Parent Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
   
      <div class="card-body">
        <form action="{{route('parentcategories.store')}}" method="POST">
            {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Parent Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" name="parent_category">
        </div>
        @error('parent_category')
          <p class="text-danger"> {{ $message }}</p>
        @enderror
      </div>
      <div class="card-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Store Parent Category</button>
          </div>
        
      </div>
    </form>
  </div>
@endsection