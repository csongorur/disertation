@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">Cart</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="cart-item mb-5 d-flex">
                            <img class="img-thumbnail" src="{{ route('media', $product->media->id) }}" />
                            <div class="content">
                                <h3>{{ $product->name }}</h3>
                                <span><strong>$ {{ $product->price }}</strong></span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection