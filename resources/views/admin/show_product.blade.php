<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Show</title>
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
            

            <div class="row centered-div">
              <div class="col-lg-8 grid-margin stretch-card centered-div">
                <h1 class="admin_heading">All the Products That added</h1>
              </div>
            </div>

            
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card centered-div">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin > All Products</h4>
                    <p class="card-description">All Products Are Listed Here</p>
                    <div class="table-responsive">
                      <table class="table mt-5">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Products Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>delete</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $products)
                          <tr>
                            <td>1</td>
                            <td>{{$products->title}}</td>
                            <td>
                                <div class="product-info">
                                  <p>{!! nl2br($products->description) !!}</p>
                                </div>
                            </td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->discount_price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>{{$products->category}}</td>
                            <td>
                              <!-- <img src="public/{{$products->image}}" alt=""> -->
                              <img src="{{ asset($products->image) }}" alt="">
                            </td>
                            <td>
                              <a class="btn btn-danger" href="{{route('delete_product',$products->id)}}">delete</a>
                            </td>
                            <td>
                              <a class="btn btn-success" href="{{route('update_product',$products->id)}}">Edit</a>
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
              

            <script src="admin/assets/vendors/select2/select2.min.js"></script>
            <script src="admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>

            <script src="admin/assets/js/off-canvas.js"></script>
            <script src="admin/assets/js/hoverable-collapse.js"></script>
            <script src="admin/assets/js/misc.js"></script>
            <script src="admin/assets/js/hoverable-collapse.js"></script>
            <script src="admin/assets/js/settings.js"></script>
            <script src="admin/assets/js/todolist.js"></script>

            <script src="admin/assets/js/file-upload.js"></script>
            <script src="admin/assets/js/typeahead.js"></script>
            <script src="admin/assets/js/select2.js"></script>

            
    @include('admin.script')
</body>
</html>