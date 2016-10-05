<div class="navbar-wrapper">
    <div class="container ">
        <div class="navbar navbar-inverse navbar-static-top ">

            <div class="navbar-header">
                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="navbar-brand" href="#">Mavericks Inc</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('index') !!}">Home</a></li>
                    <li><a href="{!! route('search') !!}">Search</a></li>
                    <li><a href="{!! route('about') !!}">About</a></li>
                    <li><a href="{!! route('contact') !!}">Contact</a></li>
                    <li><a href="{{ route('admin') }}">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right container-fluid">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li ><a href="{!! route('icons') !!}"><span class="icon-star-full" ></span></a></li>
                        <li ><a href="{!! route('form') !!}"><span class="icon-cart" ></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                My Account <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a>{{ Auth::user()->name }}</a></li>
                                <li><a>My Tickets </a></li>
                                <li><a>My Wishlist</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </div><!-- /container -->
</div><!-- /navbar wrapper -->
