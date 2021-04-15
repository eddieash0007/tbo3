@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit : {{$product->name}} </h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="{{route('product.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" name="name" value="{{$product->name}}">
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id" id="category">
          <option value="">Select a Category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        @error('category_id')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Price (GH₵)</label>
        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" step="1" min="0" name="price" value="{{$product->price}}">
      
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Product Image</label>
        <input type="file" name="image" class="form-control">
      </div>

      

      <fieldset>
        <label for="productstatus">Product Sizes</label>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size4" value="1">
          <label class="form-check-label" for="new" >4</label>
          <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size6" value="1">
          <label class="form-check-label" for="new" >6</label>
          <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size8" value="1">
          <label class="form-check-label" for="new" >8</label>
          <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size10" value="1">
          <label class="form-check-label" for="new" >10</label>
          <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size12" value="1">
          <label class="form-check-label" for="new" >12</label>
          <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size14" value="1">
          <label class="form-check-label" for="new" >14</label>
        <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="size16" value="1">
          <label class="form-check-label" for="new" >16</label>
          <br>
          <br>
          
      </div>
      </fieldset>

      <div class="form-group col-sm-2">
        <label for="exampleInputEmail1">Colour</label>
        <input type="color" class="form-control" id="exampleInputEmail1" name="colour">
      </div>


      <fieldset>
        <label for="productstatus">Product Status</label>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="new" value="1">
          <label class="form-check-label" for="new" >New</label>
          <br>
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sale" value="1">
          <label class="form-check-label" for="new" >Sale</label>
        </div>
      </fieldset>
      

      
        
        <div class="form-group">
          <label>Product Details</label>
          <textarea class="form-control" rows="3" placeholder="Enter Product Details" name="details">{{$product->details}}</textarea>
        </div>
      
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary float-right">Update Product</button>
    </div>
  </form>
</div>
@endsection

    