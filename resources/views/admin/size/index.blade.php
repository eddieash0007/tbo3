@extends('layouts.admin')

@section('page_title')
    Sizes
@endsection
@section('create_new')
<a class="btn btn-primary float-right" href="{{route('size.create')}}">
    Add New
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Sizes</h3>

          
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
              @if ($sizes->count()>0)
              @foreach ($sizes as $size)
              <tr>
                <td>{{$size->size}}</td>
                <td>{{$size->updated_at->toFormattedDateString()}}</td>
                <td>
                  <button type="button" id="{{$size->id}}" class="btn btn-info" data-toggle="modal" data-target="#modal-default-{{$size->id}}">
                    Edit
                  </button>
                    
                </td>
                <td>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$size->id}}">
                    Delete
                  </button>
                    
                </td>
               
              </tr>
              {{-- Edit Modal --}}
                  <div class="modal fade" id="modal-default-{{$size->id}}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Edit: {{$size->size}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{route('size.update', ['id'=> $size->id])}}" method="POST">
                                      {{ csrf_field() }}
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Size</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1"
                                              value="{{$size->size}}" name="size">
                                          @error('size')
                                          <p class="text-danger"> {{ $message }}</p>
                                          @enderror
                                      </div>


                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary float-right">Update Size</button>
                                      </div>



                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                        <!-- /.modal-content -->
  
                        <!-- /.modal-dialog -->

                {{-- End Edit Modal --}}

                <!-- /.modal-dialog -->
              

                  

              {{-- Delete Modal --}}
                <div class="modal fade" id="modal-danger-{{$size->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                      <div class="modal-header">
                        <h4 class="modal-title">Danger</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h6>Are you sure you want to delete "{{$size->name}}" permanently</h6>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                        <a href="{{ route('size.delete',['id' => $size->id]) }}" >
                          <button type="button" class="btn btn-outline-light">Delete</button>
                        </a>
                        
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                </div>
              {{-- End Delete Modal --}}
              @endforeach
              @else
                  <tr>
                    <th colspan="5" class="text-center">No Uploaded Size</th>
                  </tr> 

            @endif
              
            </tbody>
          </table>
          

          
          
        
        
        
        </div>
      </div>

    </div>
</div>

     
      
    </div>
    <div class="col-12 d-flex justify-content-center pt-4">
      {{$sizes -> links() }}
    </div>
  </div>
@endsection