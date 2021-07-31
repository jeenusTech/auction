
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index" class="logo mobile_logo"><img src="{{asset('/frontend/logo/logo_small.png')}}" height="75px" alt="logo" title="logo" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
        <div class="search_left">
          <form action="">
            <div class="searchContainer">
              <i class="bi bi-search searchIcon"></i>
              <input class="searchBox" type="search" name="search" placeholder="Search..." >
            </div>
          </form>

        </div>
        <div class="advanced_search_menu"><a href="/advanced_search" class="nav-link">advanced search</a></div>
        <!-- <li><a class="nav-link scrollto" href="#about">Category</a></li> -->
        <div class="logo_centered">
          <a href="{{url('index')}}"><img src="{{asset('/frontend/logo/logo.png')}}" alt="logo-desktop" title="logo home page"></a>
          
        </div>
          <li class="dropdown"><a class="nav-link scrollto  dropdown-toggle  {{
            (Request::is('latest-auction*'))||(Request::is('auction-archives*'))||(Request::is('upcoming-auction*')) ? 'active' : ''}}" href="javascript:void(0)"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Auction</a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
              <ul>
                <li>
                  <a class="dropdown-item nav-link {{(Request::is('latest-auction*')) ? 'active' : ''}}" href="{{route('latest-auction')}}">
                    Latest Auction
                  </a>
                </li>
                <li>
                  <a class="dropdown-item {{(Request::is('auction-archives*')) ? 'active' : ''}}" href="{{route('auction-archives')}}">
                    Auction Archive
                  </a>
                </li>
                <li>
                  <a class="dropdown-item {{(Request::is('upcoming-auction*')) ? 'active' : ''}}" href="{{route('upcoming-auction')}}">
                    Upcoming Auction
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="dropdown"><a class="nav-link dropdown-toggle {{(Request::is('category-auction*')) ? 'active' : ''}}" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="container">
              <div class="row menu_width100">
                <div class="width-50 cat-left">
                  <a href="javascript:void(0)">
                    <img src="{{asset('/frontend/megamenu.png')}}" alt="home-menu" title="home category menu" class="img-fluid cat_image">
                  </a>
                </div>
                <div class="width-50">
                  <div class="row">
                    @php
                        $categories = App\Models\category::get();
                    @endphp
                    @foreach($categories as $category)
                      <div class="width-25 tiles">
                        <a class=" {{(Request::is('category-auction/'.$category->id)) ? 'active' : ''}}" href="{{route('category-auction',$category->id)}}">
                          <figure>
                            <img class="pt-2 rounded-circle" src="{{getimg($category->cat_image)}}" alt="{{str_replace('.jpg', '', $category->cat_image)}}" title="{{$category->cat_name}}" height="45">
                            <figcaption>{{$category->cat_name}}</figcaption>
                          </figure>
                        </a>
                      </div>
                    @endforeach
                  </div>
                </div>
                <!-- /.col-md-4  -->
              </div>
            </div>
          <!--  /.container  -->
          </li>
          <li><a class="nav-link {{(Request::is('bank-info')) ? 'active' : ''}}" href="{{route('bank-info')}}">Bank Information</a></li>
          <li><a class="nav-link  {{(Request::is('about-us')) ? 'active' : ''}}" href="{{url('about-us')}}">About Us</a></li>
          <li><a class="nav-link {{(Request::is('contact')) ? 'active' : ''}}" href="{{url('contact')}}">Contact Us</a></li>
          <li><a clas="nav-link" href="#">Terms & Conditions</i></a>
          </li>
          @guest
            @if (Route::has('login'))
              <li class="mobile_right_menu"><a class="nav-link {{(Request::is('login')) ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
            @endif
              <li class="mobile_right_menu"><a class="nav-link  {{(Request::is('register')) ? 'active' : ''}}" href="{{url('register')}}">Register</a></li>
          @else
                <li class="nav-item dropdown mobile_right_menu" id="loggednavbarDropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('home') }}">
                          {{ __('My Dashboard') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('profile.index') }}">
                          {{ __('My Profile') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form1').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                </li>
              @endguest
          <li class="mobile_right_menu">
            <select name="lang" id="lang_dropdown">
              <option value="en" selected>Select Language</option>
              <option value="en" >English</option>
              <option value="hin">Hindi</option>
            </select>
          </li>

          <div class="right_menu">
            <ul>
              @guest
                @if (Route::has('login'))
                  <li class="padding_0"><a class="{{(Request::is('login')) ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
                @endif
                  <li class="padding_0"><a class="nav-link">|</a></li>
                  <li class="padding_0"><a class="{{(Request::is('register')) ? 'active' : ''}}" href="{{url('register')}}">Register</a></li>
              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('home') }}">
                          {{ __('My Dashboard') }}
                      </a>
                      @if(auth()->user()->role !== 'admin')
                      <a class="dropdown-item" href="{{ route('profile.index') }}">
                          {{ __('My Profile') }}
                      </a>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                </li>
              @endguest
              <li class="lang">
                <select name="lang" id="lang_dropdown">
                  <option value="en" selected>Select Language</option>
                  <option value="en" >English</option>
                  <option value="hin">Hindi</option>
                </select>
              </li>
            </ul>
          </div>
        </ul>

      <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <i class="bi bi-search search_icon"></i>
    </div>

  <div class="search-bar">
    <i class="bi bi-x search_x"></i>
    <form class="d-flex w-100 justify-content-center" method="GET">
      <input class="align-self-center search-input form-control" type="text" name="s" placeholder="Search">
      <button type="submit" class="align-self-center"><i class="bi bi-search"></i>
      </button>
    </form>
  </div>
  </header><!-- End Header -->