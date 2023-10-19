<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>
    @include('admin.style')
</head>
<body>
    
   

    <div class="container-scroller">

    @include('admin.topbar')
    @include('admin.sidebar')

    <div class="main-panel">
          <div class="content-wrapper">

            @if(session()->has('message'))

                <div class="alert alert-success w-80 mx-auto mb-4">
                    <button type="button" aria-hidden="true" data-dismiss="alert" aria-label="Close" class="close">x</button>
                    {{session()->get('message')}}
                </div>

            @endif
            


            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card centered-div">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin > Orders</h4>
                    <p class="card-description">All Orders Table</p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                          <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <img src="/product_images/{{$order->image}}" alt="">
                            </td>
                          </tr>
                        @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>



            </div>
    @include('admin.script')
</body>
</html>