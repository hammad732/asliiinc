
<style>

  .dropdown-menu .dropdown-item{
    display: block;
  }
  .navbar-toggle1{
    background-color: white !important
  }
  .navigation-agileits{
    position: sticky;
      top: 0px;
      z-index: 1000;
  }
  .active_nav {
      /* color: var(--green-color) !important;
      font-weight: var(--active-font-weight) !important;
      border: 0.063rem solid var(--green-color) !important; */

      background-color: #f07701;
    color: white!important;
  }
  .navbar-default .navbar-nav > li > a:hover{
  background-color: #f07701;
    color: white!important;
}
  .header-a-tag{
    margin: 10px 30px;
  }

  @media(min-width: 768px){
    .navigation-agileits{
      display: flex;
align-items: center
    }
    .mobile-screen-a{
      display: none;
    }
  }
  @media(max-width: 767px){
    .header-a-tag{
      display: none;
    }
    .mobile-screen-image{
      margin-top: 5px;
    }
    .navbar-default {
  text-align: start !important;
}
  }
</style>

  {{-- <div class="agileits_header">
    <div class="container">
      <div class="w3l_offers">
        <p>
          SALE UP TO 70% OFF. USE CODE "SALE70%" .
          <a href="">SHOP NOW</a>
        </p>
      </div>
      <div class="agile-login">
        <ul>


        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
   </div> --}}

  {{-- <div class="logo_products">
    <div class="container">
      <div class="w3ls_logo_products_left1">
        <ul class="phone_email">
          <li>
            <i class="fa fa-phone" aria-hidden="true"></i>Order online or call
            us : {{$connects->phone_no}}
          </li>
        </ul>
      </div>
      <div class="w3ls_logo_products_left">
        <h1>
          <a href="{{route('main')}}">
            <img class="img-fluid logo-img" src="{{asset('assets/images/logo.png')}}" alt="">
          </a>
        </h1>
      </div>
      <div class="w3l_search">
        <form action="" method="post">
          <input type="search" name="Search" placeholder="Search for a Product..." required="" />
          <button type="submit" class="btn btn-default search" aria-label="Left Align">
            <i class="fa fa-search" aria-hidden="true"> </i>
          </button>
          <div class="clearfix"></div>
        </form>
      </div>

      <div class="clearfix"></div>
    </div>
  </div> --}}
  <!-- //header -->
  <!-- navigation -->
  <div class="navigation-agileits">
    <a href="{{route('main')}}" class="header-a-tag">
      <img class="img-fluid logo-img" src="{{asset('assets/images/logo.png')}}" alt="">
    </a>
    <div class="container">

      <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header nav_2">
          <a href="{{route('main')}}" class="mobile-screen-a">
            <img class="img-fluid logo-img mobile-screen-image" src="{{asset('assets/images/logo.png')}}" alt="">
          </a>
          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class=" collapse navbar-collapse navbar_custom " id="bs-megadropdown-tabs">
          <ul class="nav navbar-nav">

            <li class="nav-item">
              <a class="nav-link {{ Request::is('aboutus') ? 'active_nav' : '' }} "
                  href="{{ route('aboutus') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link   {{ Request::is('home') ? 'active_nav' : '' }} "
                  href="{{ route('home') }}">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link   {{ Request::is('services') ? 'active_nav' : '' }} "
                  href="{{ route('sa.show.service_all') }}">Services</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Request::is('stores') ? 'active_nav' : '' }} "
                href="{{ route('stores') }}">Delivery Locator</a>
            </li>

            <li class="nav-item ms-5 ">
              <a class="nav-link {{ Request::is('cart-display') ? 'active_nav' : '' }}" href="{{route('cart.display')}}"><i class="fa fa-shopping-cart" id="cart-basket"> (<span id="basket">{{ \Cart::getContent()->count()}}</span>) </i> My Orders</a>
            </li>

                      @guest

          <li class="nav-item">
              <a class="nav-link {{ Request::is('login') ? 'active_nav' : '' }} "
                  href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
              {{-- @if (Route::has('register'))

                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('register') ? 'active_nav' : '' }} "
                        href="{{ route('register') }}">{{ __('Sign-Up') }}</a>
                  </li>
              @endif --}}

          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->fname }} {{ Auth::user()->lname }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right text-dark" aria-labelledby="navbarDropdown">

                    @if(Auth::user()->hasRole('Super Admin'))
                      <a class="dropdown-item d-none" href="{{ route('sa.dashboard') }}">
                       Dashboard
                      </a>
                    @endif



                    @if(Auth::user()->hasRole(' Admin'))
                          <a class="dropdown-item" href="{{ route('a.dashboard') }}">
                              Dashboard
                          </a>
                      @endif

                      @hasrole('Distributor')
                          <a class="dropdown-item" href="{{ route('d.dashboard') }}">
                              Dashboard
                          </a>
                          <a class="dropdown-item" href="{{ route('d.orders') }}">
                              My Orders
                          </a>
                      @endif

                      @if(Auth::user()->hasRole('Retailer'))
                          <a class="dropdown-item" href="{{ route('r.dashboard') }}">
                              Dashboard
                          </a>
                          <a class="dropdown-item" href="{{ route('r.orders') }}">
                              My Orders
                          </a>
                      @endif

                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>

          @endguest



            <li class="nav-item">
              <a class="nav-link {{ Request::is('jobs') ? 'active_nav' : '' }} "
                  href="{{ route('view.jobs') }}">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('connect') ? 'active_nav' : '' }} "
                  href="{{ route('connect') }}">Connect</a>
            </li>


{{--
            <li class="nav-item ms-5 ">
              <a class="nav-link" href="{{route('cart.display')}}"><i class="fa fa-shopping-cart" id="cart-basket"> (<span id="basket">{{ \Cart::getContent()->count()}}</span>) </i> My Orders</a>
          </li> --}}




          </ul>
        </div>
      </nav>
    </div>
  </div>

