<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4">
                <div class="left">
                    <img class="img-fluid" src="{{ asset('images/logo.png') }}" />
                    <h1>Filipe Hugo</h1>
                </div>
            </div>
            <div class="col-6 col-lg-8">
                <div class="hamburger-icon-container">
                    <button class="navbar-toggler toggler-example hamburger-icon" type="button" id="mobile-menu-btn"><span class="dark-blue-text"><i class="fa fa-bars fa-1x"></i></span></button>
                </div>
                <ul class="right" id="menu">
                    <li class="@if (Route::current()->getName() == 'index') active @endif"><a href="{{ route('index') }}">Home</a></li>
                    <li class="@if (Route::current()->getName() == 'about') active @endif"><a href="{{ route('about') }}">About</a></li>
                    <li class="@if (Route::current()->getName() == 'shop') active @endif"><a href="{{ route('shop') }}">Shop</a></li>
                    <li class="@if (Route::current()->getName() == 'contact') active @endif"><a href="{{ route('contact') }}">Contact</a></li>
                    <li><i class="fas fa-shopping-cart"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
        <ul>
            <li class="@if (Route::current()->getName() == 'index') active @endif"><a href="{{ route('index') }}">Home</a></li>
            <li class="@if (Route::current()->getName() == 'about') active @endif"><a href="{{ route('about') }}">About</a></li>
            <li class="@if (Route::current()->getName() == 'shop') active @endif"><a href="{{ route('shop') }}">Shop</a></li>
            <li class="@if (Route::current()->getName() == 'contact') active @endif"><a href="{{ route('contact') }}">Contact</a></li>
            <li><i class="fas fa-shopping-cart"></i></li>
        </ul>
    </div>
</header>