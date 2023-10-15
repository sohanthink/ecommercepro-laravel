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
              <div class="col-12 grid-margin stretch-card centered-div">
              <form method="post" action="{{route('add_category')}}" class="form-inline">
                @csrf
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Category Name</label>
                        <input name="category" type="text" class="form-control" id="inputPassword2" placeholder="Category Name" required="">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add Category</button>
                </form>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card centered-div">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin > Category</h4>
                    <p class="card-description">All Categories Table</p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created AT</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                          <tr>
                            <td>1</td>
                            <td>{{$data->category_name}}</td>
                            <td>{{$data->created_at}}</td>
                            <td><a onclick="return confirm('Are you sure to delete this category?')" href="{{route('category_delete',$data->id)}}"><label class="badge badge-danger">Delete</label></a></td>
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