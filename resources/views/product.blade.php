@extends('layouts.user')

@section('content')

<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                
                <li class="breadcrumb-item"><a href="{{route('category.single',['slug'=>$product->category->slug])}}">{{$product->category->name}}</a></li>
                <li aria-current="page" class="breadcrumb-item active">{{$product->name}}</li>
                
              </ol>
            </nav>
          </div>
          <div class="col-lg-3 order-2 order-lg-1">
            <!--
            *** MENUS AND FILTERS ***
            _________________________________________________________
            -->
            @include('includes.sidebar')
            
            <!-- *** MENUS AND FILTERS END ***-->
           
          </div>
          <div class="col-lg-9 order-1 order-lg-2">
            <div id="productMain" class="row">
              <div class="col-md-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <div class="item"> <img src="{{asset($product->image)}}" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="{{asset($product->image)}}" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="{{asset($product->image)}}" alt="" class="img-fluid"></div>
                </div>
                @foreach ($product->promotions as $promotion)
                              <div class="ribbon promo ">
                                <div class="theribbon"style="background-color: {{$promotion->colour}}">{{$promotion->promotion}}</div>
                                <div class="ribbon-background"></div>
                              </div>
                          @endforeach
              </div>
              <div class="col-md-6">
                <div class="box">
                  <h1 class="text-center">{{$product->name}}</h1>
                  <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                  <p class="price">GH?? {{$product->price}}</p>
                  <p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a><a href="basket.html" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>
                </div>
                <div data-slider-id="1" class="owl-thumbs">
                  <button class="owl-thumb-item"><img src="{{asset($product->image)}}" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="{{asset($product->image)}}" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="{{asset($product->image)}}" alt="" class="img-fluid"></button>
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
              <h4>Product details</h4>
              <p>{{$product->details}}</p>
              
              <h4>Sizes Available</h4>
              
                @foreach ($product->sizes as $size)
                  <button class="btn info" style="border: 2px solid black;
                  border-radius: 5px;
                  background-color: white;
                  color: black;
                  padding: 8px 12px;
                  font-size: 14px;
                  cursor: pointer;
                  border-color: #f4368f;
                  color: #f4368f;" >{{$size->size}}</button>      
                  
                    @endforeach
              
               
              
              
              <hr>
              <div class="social">
                <h4>Show it to your friends</h4>
                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
              </div>
            </div>
            <div class="row same-height-row">
              <div class="col-md-3 col-sm-6">
                <div class="box same-height">
                  <h3>You may also like these products</h3>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3>Fur coat</h3>
                    <p class="price">$143</p>
                  </div>
                </div>
                <!-- /.product-->
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="detail.html"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="detail.html"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3>Fur coat</h3>
                    <p class="price">$143</p>
                  </div>
                </div>
                <!-- /.product-->
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="detail.html"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="detail.html"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="detail.html" class="invisible"><img src="img/product3.jpg" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3>Fur coat</h3>
                    <p class="price">$143</p>
                  </div>
                </div>
                <!-- /.product-->
              </div>
            </div>
            
          </div>
          <!-- /.col-md-9-->
        </div>
      </div>
    </div>
  </div>


    
@endsection