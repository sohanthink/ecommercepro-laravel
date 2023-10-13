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
            

            <div class="row centered-div">
              <div class="col-lg-8 grid-margin stretch-card centered-div">
                <h1 class="admin_heading">Add Product</h1>
              </div>
            </div>

            <div class="row centered-div">
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dashboard > Product Create</h4>
                    <p class="card-description"> </p>

                    <form class="forms-sample" action="{{route('add_product')}}" enctype="multipart/form-data" method="POST">

                        @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Product Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Product Title Name" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Product Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail3" placeholder="Write A description" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputPassword4" placeholder="Product Original Price" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Discount Price</label>
                        <input type="number" name="discount_price" class="form-control" id="exampleInputPassword4" placeholder="Product Discount Price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Product Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="exampleInputPassword4" placeholder="Quantity" required="">
                      </div>
                      <div>
                      <label for="exampleSelectGender">Category select</label>
                        <select class="form-control" id="exampleSelectGender" required="" name="category">

                        @foreach($categories as $category)
                          <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                        
                        </select>
                      </div>
                      <div class="form-group">
                      <div class="mb-3 mt-3">
                        <label for="formFile" class="form-label">Product Image Upload</label>
                        <input name="image" class="form-control" type="file" id="formFile" required="">
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>

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