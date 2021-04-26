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
                <label for="exampleInputFile">First Carousel</label>
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="first">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <a href="{{route('carousel.first')}}"><span class="input-group-text">Upload</span></a>
                      
                    </div>
                  </div>


                  <label for="exampleInputFile">Second Carousel</label>
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="second">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <a href="{{route('carousel.second')}}"><span class="input-group-text">Upload</span></a>
                    </div>
                  </div>

                  <label for="exampleInputFile">Third Carousel</label>
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="third">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <a href="{{route('carousel.third')}}"><span class="input-group-text">Upload</span></a>
                    </div>
                  </div>

                  <label for="exampleInputFile">Fourth Carousel</label>
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fourth">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <a href="{{route('carousel.fourth')}}"><span class="input-group-text">Upload</span></a>
                    </div>
                  </div>

        </form>

      </div>


@endsection