@if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    @if (Route::current()->getName() != 'products')
                        <a class="btn btn-primary" href="{{ route('products') }}">Products</a>
                    @else
                        <a class="btn btn-success" href="{{ route('products.create') }}"><i class="fas fa-plus mr-2"></i><span>Add product</span></a>
                    @endif
                    <a class="btn btn-primary" href="{{ route('admin.orders') }}">Orders</a>
                </div>
            </div>
        </div>
    </div>
@endif