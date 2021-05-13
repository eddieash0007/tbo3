@extends('layouts.admin')

@section('page_title')
    Orders
@endsection

@section('create_new')
{{-- <a class="btn btn-primary float-right" href="{{route('categories.create')}}">
    Add New
</a> --}}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Orders</h3>

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
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date</th>
                <th>Actions</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->grand_total}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->created_at->toFormattedDateString()}}</td>
                    <td>sth nice</td>
                </tr>
            @endforeach
              
            </tbody>
          </table>
        
        <!-- /.card-body -->
      </div>
                
   
@endsection
@section('scripts')

{{-- <script>
  ClassicEditor
      .create( document.querySelector( '#description' ) )
      .catch( error => {
          console.error( error );
      } );
</script> --}}
    
@endsection