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
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                            </ol>
                          </nav>
                        </div>
                        <div id="basket" class="col-lg-12">
                          <div class="box">
                           
                              <h1>Shopping cart</h1>
                              <p class="text-muted">You currently have {{Cart::getTotalQuantity()}} item(s) in your cart.</p>
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th colspan="2">Product</th>
                                      <th>Quantity</th>
                                      <th>Unit price</th>
                                      <th>Total</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  
                                      
                                 
                                  <tbody>
                                    
                                  @foreach ($cartitems as $item)
                                  
                                          <tr>
                                                <td><a href="{{route('product.single', ['slug'=>$item->associatedModel->slug])}}"><img src="{{asset($item->associatedModel->image)}}" alt="{{$item->name}}"></a></td>
                                                <td><a href="{{route('product.single', ['slug'=>$item->associatedModel->slug])}}">{{$item->name}}</a></td>
                                                <td style="width: auto">
                                                  <form action="{{route('cart.update', ['itemId'=>$item->id]) }}">
                                                    <div class="input-group">
                                                      <input type="number"  class="form-control"  step="1" min="1" name="quantity" value="{{$item->quantity}}"> 
                                                      <div class="input-group-append">
                                                        <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update Quantity</button></a>
                                                      </div>
                                                    </div>
                                                    
                                                   
                                                   
                                                  </form>
                                                  
                                                </td>
                                                <td>GH¢ {{Cart::get($item->id)->getPriceSum()}} </td>
                                                
                                                <td>GH¢ 246.00 </td>
                                                <td><a href="{{route('cart.destroy',$item->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                          </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th colspan="5">Total </th>
                                      <th colspan="2">GH¢ {{Cart::getTotal()}}</th>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                              <!-- /.table-responsive-->
                              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                                <div class="right">
                                  <a href=""><button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button></a>
                                  <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                                </div>
                              </div>
                          
                          </div>
                          <!-- /.box-->
                          <div class="row same-height-row">
                            <div class="col-lg-3 col-md-6">
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
                        <!-- /.col-lg-9-->
                        
                        <!-- /.col-md-3-->
                      </div>
                    </div>
                  </div>
                
                </div>
@endsection