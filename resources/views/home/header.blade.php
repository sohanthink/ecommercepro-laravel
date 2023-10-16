<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <div>
                  <a class="navbar-brand" href="index.html"><img width="250" src="home/images/logo.png" alt="#" /></a>
                  </div>
                  <div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="product.html">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('show_cart')}}">Cart</a>
                        </li>
                        
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>

                        @if (Route::has('login'))
                        @auth
                           <li class="nav-item">
                              <x-app-layout>

                              </x-app-layout>
                           </li>
                           @else
                              <li class="nav-item">
                                 <a href="{{ route('login') }}"><div class="btn btn-info text-white mr-2">Login</div></a>
                              </li>
                              @if (Route::has('register'))
                              <li class="nav-item">
                                 <a href="{{ route('register') }}"><div class="btn btn-info">Register</div></a>
                              </li>
                              @endif
                        @endauth
                        @endif

                        
                  
                     </ul>
                  </div>
               </nav>
            </div>
         </header>