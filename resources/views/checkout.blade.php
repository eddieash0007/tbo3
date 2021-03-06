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
                <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
              </ol>
            </nav>
          </div>
          <div id="checkout" class="col-lg-9">
            <div class="box">
              <form method="post" action="{{route('orders.store')}}">
                    {{ csrf_field() }}
                <h1>Checkout - Address</h1>
                <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Address</a>
                    <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                <div class="content py-3">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" type="text" class="form-control" name="first_name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" type="text" class="form-control" name="last_name">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                   
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address">Address / Ghana Post GPS</label>
                        <input id="address" type="text" class="form-control" name="address">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input id="phone" type="text" class="form-control" name="phone">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <label for="email">Payment Methods</label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="box payment-method">
                        <h4>Paypal</h4>
                        <p>We like it all.</p>
                        <div class="box-footer text-center">
                          <input type="radio" name="payment_method" value="paypal" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="box payment-method">
                        <h4>Payment gateway</h4>
                        <p>VISA and Mastercard only.</p>
                        <div class="box-footer text-center">
                          <input type="radio" name="payment_method" value="visa" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="box payment-method">
                        <h4>Cash on delivery</h4>
                        <p>You pay when you get it.</p>
                        <div class="box-footer text-center">
                          <input type="radio" name="payment_method" value="cash_on_delivery">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="box payment-method" >
                        <h4>Mobile Money</h4>
                        <p>Convenience at it's best.</p>
                        <div class="box-footer text-center">
                          <input type="radio" name="payment_method" value="momo" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer d-flex justify-content-between"><a href="{{route('cart.index')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                  <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i></button>
                </div>
              </form>
            </div>
            <!-- /.box-->
          </div>
          <!-- /.col-lg-9-->
          <div class="col-lg-3">
            <div id="order-summary" class="card">
              <div class="card-header">
                <h3 class="mt-4 mb-4">Order summary</h3>
              </div>
              <div class="card-body">
                <p class="text-muted">Delivery cost is determined when we call you via phone to confirm the order.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th>GH?? {{Cart::getTotal()}}</th>
                      </tr>
                      <tr>
                        <td>Delivery</td>
                        <th>GH?? 0.00</th>
                      </tr>
                      
                      <tr class="total">
                        <td>Total</td>
                        <th>GH?? {{Cart::getTotal()}}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-3-->
        </div>
      </div>
    </div>
  </div>

@endsection 




    
     
      
    
  