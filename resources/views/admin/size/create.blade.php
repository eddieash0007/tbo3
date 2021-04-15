@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create A New Size</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                
                    <div class="card-body">
                        <form action="{{route('size.store')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                        <label for="exampleInputEmail1">Size Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter product size" name="size">
                        </div>
                        @error('size')
                        <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Store Size</button>
                        </div>
                        
                    </div>
                    </form>
                </div>

            
@endsection
