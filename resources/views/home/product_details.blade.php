
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      @include('home.headerstyle')
   </head>
   <body>
     
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      
     
         <div class="product_details">
         <div class="container">
            <h1>Product Detail</h1>
            <div class="product">
                <div class="product-image">
                    <img src="{{$product->image}}" alt="Product Image">
                </div>
                <div class="product-details">
                    <h2 class="product-title">Title : {{$product->title}}</h2>
                    <p class="product-description">
                    Description : {{$product->description}}
                    </p>
                    @if($product->discount_price != null)
                        <p style="text-decoration:line-through" class="product-price">Original Price : $ {{$product->price}}</p>
                        <p class="product-price">Discount Price : $ {{$product->discount_price}}</p>
                        @else
                        <p class="product-price">Original Price : $ {{$product->price}}</p>
                    @endif
                    <button class="btn btn-success">Add to Cart</button>
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