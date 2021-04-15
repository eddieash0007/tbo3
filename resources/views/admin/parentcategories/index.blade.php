@extends('layouts.admin')

@section('page_title')
    Parent Categories
@endsection

@section('create_new')
<a class="btn btn-primary float-right" href="{{route('parentcategories.create')}}">
    Add New
</a>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Parent Categories</h3>

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
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
            </thead>
            <tbody>
            @if ($parent_categories->count()>0)
                  @foreach ($parent_categories as $parent_category)
                  <tr>
                    <td>{{$parent_category->name}}</td>
                    <td>{{$parent_category->updated_at->toFormattedDateString()}}</td>
                    <td>
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default-{{$parent_category->id}}">
                        Edit
                      </button>
                        
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$parent_category->id}}">
                        Delete
                      </button>
                        
                    </td>
                  
                  </tr>
<!-- EDIT:MODAL -->
                <div class="modal fade" id="modal-default-{{$parent_category->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit: {{ $parent_category->name}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('parentcategory.update', ['id'=> $parent_category->id])}}" method="POST">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="exampleInputEmail1">Parent Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                              value="{{$parent_category->name}}" name="name">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Update Parent Category</button>
                          </div>
                        </form>
                            
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </div>
    <!-- END:: MODAL EDIT -->

    <!-- DELETE MODAL -->
        <div class="modal fade" id="modal-danger-{{$parent_category->id}}">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Danger</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6>Are you sure you want to perform this action?<br>
                  Deleting "{{$parent_category->name}}" permanently will delete all <b>products</b>  and <b>categories</b> associated with it.</h6>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <a href="{{ route('parentcategory.delete',['id' => $parent_category->id]) }}" >
                  <button type="button" class="btn btn-outline-light">Delete</button>
                </a>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END::DELETE MODAL -->
              @endforeach
              
              
            @else
                  <tr>
                    <th colspan="5" class="text-center">No Uploaded Parent Categories</th>
                  </tr> 

            @endif
              
            </tbody>
          </table>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->      
    </div>
    <div class="col-12 d-flex justify-content-center pt-4">
      {{-- {{$categories -> links() }} --}}
    </div>
  </div>
@endsection