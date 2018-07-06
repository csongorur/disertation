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
    <form id="cart-form" action="{{ route('cart') }}" method="POST">
        {{ csrf_field() }}
        <input id="ids" type="hidden" name="ids"/>
    </form>
</header>

@push('content-scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let items = localStorage.getItem('items');
            let array = JSON.parse(items);
            // Show count of elements of cart list.
            if (items != null) {
                document.querySelector('.cart-items').innerHTML = JSON.parse(items).length;
            }

            // Submit cart form when cart button clicked.
            document.querySelector('.cart-page-btn').addEventListener('click', function () {
                let form = document.getElementById('cart-form');

                if (items != null && items.length > 0) {
                    document.getElementById('ids').value = items;
                    form.submit();
                }
            });
        });
    </script>
@endpush