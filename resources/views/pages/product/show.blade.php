@extends('app')

@section('content')
    <section class="pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center bg-white pb-5 pt-5 pr-5 pl-5">
                    <img class="img-fluid" src="{{ route('media', $product->media->id) }}" alt=""/>
                </div>
                <div class="col-12 col-md-6 text-center text-md-left mt-5 mt-md-0">
                    <h1>{{ $product->name }}</h1>
                    <p>{!! $product->description !!}</p>
                    <p><strong>$ {{ $product->price }}</strong></p>
                    <a class="btn btn-outline-secondary cart-btn"
                       data-id="{{ $product->id }}"><i class="fas fa-cart-plus mr-2"></i>Add to cart</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('content-scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let btn = document.querySelector('.cart-btn');

            btn.addEventListener('click', function () {
                let id = btn.getAttribute('data-id');

                let items = localStorage.getItem('items');

                items = JSON.parse(items);

                if (items == null) {
                    items = [];
                }

                items.push(id);

                items = JSON.stringify(items);

                localStorage.setItem('items', items);

                window.location.reload();
            })
        });
    </script>
@endpush