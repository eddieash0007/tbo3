@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create a New Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
   
      <div class="card-body">
        <form action="{{route('categories.store')}}" method="POST">
            {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" name="name">
        </div>
        @error('name')
          <p class="text-danger"> {{ $message }}</p>
        @enderror

        <div class="form-group">
          <label>Parent Category</label>
          <select class="form-control" name="big_category_id" id="category">
            <option value="">Select A Parent Category</option>
            @foreach ($bigcategories as $bigcategory)
              <option value="{{$bigcategory->id}}">{{$bigcategory->name}}</option>
            @endforeach
          </select>
          @error('parent_category_id')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
      
      <div class="card-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Store Category</button>
          </div>
        
      </div>
    </form>
  </div>
@endsection