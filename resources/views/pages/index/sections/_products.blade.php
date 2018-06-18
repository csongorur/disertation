<section class="products" id="products">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Product list</h2>
            </div>
            <div class="col-12 col-md-6">
                <ul>
                    <li class="@if (!isset($selected_category)) active @endif"><a href="{{ route('index') }}#products">All</a></li>
                    @foreach($categories as $category)
                        <li class="@if (isset($selected_category) && $selected_category == $category->id) active @endif"><a href="{{ route('index', ['category' => $category->id]) }}#products">{{ ucfirst($category->name) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="products-container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{ route('page.product', $product->id) }}">
                            <div class="product">
                                <img src="{{ route('media', $product->media->id) }}" alt="">
                                <div class="content">
                                    <span class="name">{{ $product->name }}</span>
                                    <span class="price">$ {{ $product->price }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>