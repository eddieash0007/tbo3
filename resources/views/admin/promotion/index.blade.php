@extends('layouts.admin')

@section('page_title')
    Promotions
@endsection

@section('create_new')
<a class="btn btn-primary float-right" href="{{route('promotion.create')}}">
    Add New
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Promotions</h3>

          
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Name</th>
                <th>Banner Colour</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
            </thead>
            <tbody>
              @if ($promotions->count()>0)
              @foreach ($promotions as $promotion)
              <tr>
                <td>{{$promotion->promotion}}</td>
                <td><div style="height: 30px; width: 80px; background-color: {{$promotion->colour}};"></div></td>
                <td>{{$promotion->updated_at->toFormattedDateString()}}</td>
                <td>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default-{{$promotion->id}}">
                    Edit
                  </button>
                    
                </td>
                <td>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$promotion->id}}">
                    Delete
                  </button>
                    
                </td>
               
              </tr>

              {{-- Edit Modal --}}
          <div class="modal fade" id="modal-default-{{$promotion->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit: {{$promotion->promotion}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('promotion.update', ['id'=> $promotion->id])}}" method="POST">
                      {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Promotion</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{$promotion->promotion}}" name="promotion">
                          @error('promotion')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        
                        <div class="form-group col-sm-2">
                            <label for="exampleInputEmail1">Banner Colour</label>
                            <input type="color" class="form-control" id="exampleInputEmail1" name="colour" value="{{$promotion->colour}}">
                            @error('colour')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                          
                        </div>
                    
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary float-right">Update Promotion</button>
                        </div>
                      
                    
                
                  </form>
                
                      {{-- <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div> --}}
              
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          {{-- End Edit Modal --}}
          
          
        </div>
        {{-- Delete Modal --}}
        <div class="modal fade" id="modal-danger-{{$promotion->id}}">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Danger</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6>Are you sure you want to delete "{{$promotion->promotion}}" permanently</h6>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <a href="{{ route('promotion.delete',['id' => $promotion->id]) }}" >
                  <button type="button" class="btn btn-outline-light">Delete</button>
                </a>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        {{-- End Delete Modal --}}
              @endforeach
              @else
              <tr>
                <th colspan="5" class="text-center">No Uploaded Categories</th>
              </tr> 

        @endif 
              
            </tbody>
          </table>
          
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      
    </div>
    <div class="col-12 d-flex justify-content-center pt-4">
      {{$promotions -> links() }}
    </div>
  </div>
@endsection