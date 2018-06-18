@extends('app')

@section('content')
    <section class="pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center bg-white pb-5 pt-5 pr-5 pl-5">
                    <img class="img-fluid" src="{{ route('media', $product->media->id) }}" alt="" />
                </div>
                <div class="col-12 col-md-6 text-center text-md-left mt-5 mt-md-0">
                    <h1>{{ $product->name }}</h1>
                    <p>{!! $product->description !!}</p>
                    <p><strong>$ {{ $product->price }}</strong></p>
                    <a class="btn btn-outline-secondary"><i class="fas fa-cart-plus mr-2"></i>Add to cart</a>
                </div>
            </div>
        </div>
    </section>
@endsection