@if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <a class="btn btn-primary" href="{{ route('products') }}">Products</a>
                    <a class="btn btn-primary" href="#">Orders</a>
                </div>
                <div class="mb-5 mt-3">
                    @if (Route::current()->getName() == 'products')
                        <a class="btn btn-outline-primary" href="{{ route('products.create') }}">Add product</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif