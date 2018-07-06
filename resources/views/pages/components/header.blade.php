<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4">
                <div class="left">
                    <img class="img-fluid" src="{{ asset('images/logo.png') }}"/>
                    <h1>Filipe Hugo</h1>
                </div>
            </div>
            <div class="col-6 col-lg-8">
                <div class="hamburger-icon-container">
                    <button class="navbar-toggler toggler-example hamburger-icon" type="button" id="mobile-menu-btn">
                        <span class="dark-blue-text"><i class="fa fa-bars fa-1x"></i></span></button>
                </div>
                <ul class="right" id="menu">
                    <li class="@if (Route::current()->getName() == 'index') active @endif"><a
                                href="{{ route('index') }}">Home</a></li>
                    <li class="@if (Route::current()->getName() == 'about') active @endif"><a
                                href="{{ route('about') }}">About</a></li>
                    <li class="@if (Route::current()->getName() == 'shop') active @endif"><a href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="@if (Route::current()->getName() == 'contact') active @endif"><a
                                href="{{ route('contact') }}">Contact</a></li>
                    <li class="cart-page-btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-items"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
        <ul>
            <li class="@if (Route::current()->getName() == 'index') active @endif"><a
                        href="{{ route('index') }}">Home</a></li>
            <li class="@if (Route::current()->getName() == 'about') active @endif"><a
                        href="{{ route('about') }}">About</a></li>
            <li class="@if (Route::current()->getName() == 'shop') active @endif"><a href="{{ route('shop') }}">Shop</a>
            </li>
            <li class="@if (Route::current()->getName() == 'contact') active @endif"><a href="{{ route('contact') }}">Contact</a>
            </li>
            <li class="cart-page-btn">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-items"></span>
            </li>
        </ul>
    </div>
</header>

@push('content-scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let items = JSON.parse(localStorage.getItem('items'));
            let cartItems = document.querySelectorAll('.cart-items');

            for (let i = 0; i < cartItems.length; i++) {
                cartItems[i].innerHTML = items.length;
            }

            // Cart button
            let cartBtns = document.querySelectorAll('.cart-page-btn');

            function sendCartItems() {
                let xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ route('cart.addItems') }}', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.setRequestHeader('Content-Type', 'application/json');

                xhr.send(JSON.stringify(items));

                xhr.onreadystatechange = function () {
                    window.location.replace(this.responseURL);
                }
            }

            for (let i = 0; i < cartBtns.length; i++) {
                cartBtns[i].addEventListener('click', function () {
                    sendCartItems();
                });
            }
        });
    </script>
@endpush