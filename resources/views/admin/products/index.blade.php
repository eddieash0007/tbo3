@extends('layouts.admin')

@section('page_title')
    Products
@endsection

@section('create_new')
<a class="btn btn-primary float-right" href="{{route('products.create')}}">
    Add New
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Products</h3>

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
                <th>Category</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
            @if ($products->count()>0)
              @foreach ($products as $product)
              <tr>
                <td>{{$product->name}}</td>
                
                
                  <td>{{$product->category->name}}</td>
                
                  
                
                
                <td>{{$product->price}}</td>
                <td>
                  <a href="{{ route('product.edit',['id' => $product->id]) }}" class="btn btn-info">
                    Edit
                  </a>
                  
                </td>
                <td>
                  <a href="{{ route('product.destroy',['id' => $product->id]) }}" class="btn btn-danger">
                    Trash
                  </a>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default-{{$product->id}}">
                    View
                  </button>
                </td>
              </tr>



              <div class="modal fade" id="modal-default-{{$product->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Product Details</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h4>Product Name</h4>
                      <p>{{$product->name}}</p>
        
                      <h4>Category Name</h4>
                      <p>{{$product->category->name}}</p>
        
                      <h4>Price</h4>
                      <p>GH₵{{$product->price}}</p>
        
                      <h4>Image</h4>
                      <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100px" height="200px">
        
                      <h4>Size</h4>
                      @if ($product->sizes->count()>0)
                      @foreach ($product->sizes as $size)
                          <p>{{$size->size}}</p>
                      @endforeach
                      @else
                          <p>No Sizes Available</p>
                      @endif
                      
        
                      <h4>Colour</h4>
                      <div style="height: 50px; width: 50px; background-color: {{$product->colour}};"></div>
        
                      <h4>Promotions</h4>
                      @if ($product->promotions->count()>0)
                      @foreach ($product->promotions as $promotion)
                          <p>{{$promotion->promotion}}</p>
                      @endforeach
                      @else
                          <p>No Promotions Available</p>
                      @endif
                      <h4>Details</h4>
                      <p><div style=" width:50px; word-wrap: break-word; "> {{$product->details}}</div></p>
        
        
        
                    </div>
                    <div class="modal-footer justify-content-between">
                      
                      <button type="button" class="btn btn-primary float-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


              @endforeach
            @else 
            <tr>
              <th colspan="6" class="text-center">No Uploaded Products</th>
            </tr> 

            
            @endif
              
              

              
            </tbody>
          </table>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    

    {{-- pagination --}}
      <div class="col-12 d-flex justify-content-center pt-4">
        {{$products -> links() }}
      </div>
    {{-- end pagination --}}
    

      
            
                  {{-- <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> --}}
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
  </div>
@endsection