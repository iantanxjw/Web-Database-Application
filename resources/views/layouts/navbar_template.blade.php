<div class="navbar-wrapper">
    <div class="container ">
        <div class="navbar navbar-inverse navbar-static-top ">
            <div class="navbar-header">
                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                @yield('header')
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @yield('left_links')
                </ul>
                <ul class="nav navbar-nav navbar-right container-fluid">
                    @yield('right_links')
                </ul>
            </div>

        </div>
    </div><!-- /container -->
</div><!-- /navbar wrapper -->
