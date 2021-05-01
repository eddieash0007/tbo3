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
          <option value="">Select Category</option>
          
          @foreach ($categories as $category)
            {{-- <option value="{{$category->id}}" {{($category->id)?"selected = selected":''}} <? if($category->id === $product->category_id){ echo ("selected = selected");} ?> >{{$category->name}}</option> --}}

            <option value="{{$category->id}}" <?php if ($category->id == $product->category_id) {
              echo 'selected';
          } ?> >{{$category->name}}</option>
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

      

      <div class="form-group">
        <label for="productstatus">Product Sizes</label>
       @foreach ($sizes as $size)
          <div class="checkbox">
              <label><input type="checkbox" name="size[]" value={{$size->id}}>&nbsp;&nbsp;{{ $size->size }}</label>
          </div>           
       @endforeach
      </div>

      <div class="form-group col-sm-2">
        <label for="exampleInputEmail1">Colour</label>
        <input type="color" class="form-control" id="exampleInputEmail1" name="colour">
      </div>


      <div class="form-group">
        <label for="productstatus">Promotion Status</label>
       @foreach ($promotions as $promotion)
          <div class="checkbox">
              <label><input type="checkbox"  name="promotion[]" value={{$promotion->id}}>&nbsp;&nbsp;{{ $promotion->promotion }}</label>
          </div>           
       @endforeach
      </div>
      

      
        
        <div class="form-group">
          <label>Product Details</label>
          <textarea class="form-control" rows="3" placeholder="Enter Product Details" id="details"  name="details">{{$product->details}}</textarea>
        </div>
      
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary float-right">Update Product</button>
    </div>
  </form>
</div>
@endsection
@section('scripts')

<script>
  ClassicEditor
      .create( document.querySelector( '#details' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
    
@endsection
    
    