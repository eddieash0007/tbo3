@extends('layouts.admin')

@section('page_title')
    Trashed Products
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Trashed Products</h3>

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
                {{-- <th>Category</th> --}}
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @if ($products->count()>0)
              @foreach ($products as $product)
              
                    <tr>
                        <td>{{$product->name}}</td>
                        {{-- @foreach ($categories as $category)
                        <td>{{$category->name}}</td>
                        @endforeach --}}
                        
                        <td>{{$product->price}}</td>
                        <td>
                        <a href="{{ route('product.restore',['id' => $product->id]) }}" class="btn btn-success">
                            Restore
                        </a>
                        </td>
                        <td>
                        <a href="{{ route('product.delete',['id' => $product->id]) }}" class="btn btn-danger">
                            Delete
                        </a>
                        </td>
                    </tr>
              @endforeach
              @else 
            <tr>
              <th colspan="5" class="text-center">No Trashed Products</th>
            </tr> 

            
            @endif
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-12 d-flex justify-content-center pt-4">
      {{$products -> links() }}
    </div>
  </div>
@endsection