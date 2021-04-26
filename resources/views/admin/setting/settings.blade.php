@extends('layouts.admin')

@section('page_title')
    
@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Site Settings</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
   
      <div class="card-body">
        <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Site Name</label>
                <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
              @enderror            
              </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                @error('address')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>

            <div class="form-group">
              <label for="address">Logo</label>
              <input type="file" name="logo" class="form-control" >
            </div>

            <div class="form-group">
                <label for="address">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
                @error('contact_number')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>

            <div class="form-group">
                <label for="address">Contact Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>


              <div class="form-group">
                <label>About Details</label>
                <textarea class="form-control" rows="3" placeholder="Enter about page details" name="about"></textarea>
                @error('about')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>

              
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                       Update Site Settings
                    </button>
                </div>
            </div>

           
      </div>
    </form>
  </div>

  
@endsection