<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <style>
        .div_center{
            text-align: center;
            padding: 40px;
        }

        .input_colour{
            color: black;
        }

        .center{
            width: 50%;
            border: 3px solid white;
            padding: 10px;
            text-align: center;
            margin-top: 30px;
        }

        .label{
            display: inline-block;
            width: 200px;
        }

    </style>


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('livewire.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="admin/assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-divider"></div>
                    <div class="preview-item-content">
                    @auth
                				<a class="nav-link" title="Log Out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    				Log Out
                				</a>
                				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    				@csrf
                				</form>
        					@endauth
                    </div>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>



        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            @if(Session::has('message'))
            <div>
                <p class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> 
                    {{Session::get('message')}}
                </p>
            </div>

            @endif
            <div clas="div_center">
                <h2>Update Product</h2>
                <div class="div_design">
                <form action="{{ url('/edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div>
                        <label>Product Name: </label>
                        <input class="input_colour" type="text" name="title" placeholder="Product Name" required="" value="{{$product->title}}">
                    </div>
                    <div>
                        <label>Product Description: </label>
                        <input class="input_colour" type="text" name="description" placeholder="Product Description - Explain briefly" required="" value="{{$product->description}}">
                    </div>
                    <div>
                        <label>Product Price: </label>
                        <input class="input_colour" type="number" name="price" placeholder="Product Price" required="" value="{{$product->price}}">
                    </div>
                    <div>
                        <label>Discounted Price: </label>
                        <input class="input_colour" type="number" name="dis_price" placeholder="Discounted Price" value="{{$product->discount_price}}">
                    </div>
                    <div>
                        <label>Product Quantity: </label>
                        <input class="input_colour" type="number" name="quantity" placeholder="Product Quantity" required="" value="{{$product->quantity}}">
                    </div>
                    <div>
                        <label>Product Category: </label>
                        <select name="category" required="" value="{{$product->category}}">
                        @foreach($category as $category)
                                <option>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Current image: </label>
                        <img height="250" width="250" src="/product/{{$product->image}}">
                    </div>
                    
                    <div>
                        <input type="submit" name="submit" value="Update Product" class="btn btn-primary">
                    </div>
                </form>
            </div>

          </div>
        </div>
        <!-- main-panel ends -->



      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>