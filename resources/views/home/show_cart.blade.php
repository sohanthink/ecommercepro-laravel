
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      @include('home.headerstyle')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         
        <div class="cart">
        <div class="container mt-5">

        @if(session()->has('message'))

            <div class="alert alert-success w-80 mx-auto mb-4">
                <button type="button" aria-hidden="true" data-dismiss="alert" aria-label="Close" class="close">x</button>
                {{session()->get('message')}}
            </div>

        @endif

        <h1 class="text-center hd">My Shopping Cart</h1>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <?php $total_price=0; ?>
                            @foreach($cart as $cart)
                            <div class="row cart-item">
                                <div class="col-2">
                                    <img src="{{$cart->image}}" alt="Product_image" class="product-image">
                                </div>
                                <div class="col-6">
                                    <h5>Title : {{$cart->product_title}}</h5>
                                    <p>Price : {{$cart->price}}</p>
                                    <p>Quantity : {{$cart->quantity}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('remove_cart_item',$cart->id)}}" onclick="return confirm('Are you sure to remove this product?')" class="btn btn-danger">Remove</a>
                                </div>
                            </div>

                        <?php $total_price = $total_price + $cart->price; ?> 
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">

                    <div class="card-body mb-5">
                        <h5 class="card-title">Cart Summary</h5>
                        <p class="mb-3">Subtotal: {{$total_price}}</p>
                        <a href="{{route('cash_order')}}" class="btn btn-primary btn-block">Cash on delivery</a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <p class="mb-3">Subtotal: {{$total_price}}</p>
                        <a href="{{route('stripe',$total_price)}}" class="btn btn-primary btn-block">Card Payment</a>
                    </div>

                </div>
            </div>

            

        </div>
    </div>
        </div>

      </div>
    
      <!-- footer start -->
      @include('home.footer')
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>