@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create A New Promotion</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                
                    <div class="card-body">
                        <form action="{{route('promotion.store')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                        <label for="exampleInputEmail1">Promotion Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter promotion" name="promotion">
                        </div>
                        @error('size')
                        <p class="text-danger"> {{ $promotion }}</p>
                        @enderror

                        <div class="form-group col-sm-2">
                            <label for="exampleInputEmail1">Banner Colour</label>
                            <input type="color" class="form-control" id="exampleInputEmail1" name="colour">
                            @error('colour')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                          
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Store Promotion</button>
                        </div>
                        
                    </div>
                    </form>
                </div>

            
@endsection
