@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5 mb-5">Cart</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="cart-item mb-2 d-flex">
                            <div class="image-wrapper">
                                <img src="{{ route('media', $product->media->id) }}"/>
                            </div>
                            <div class="content">
                                <h3>{{ $product->name }}</h3>
                                <span><strong>$ {{ $product->price }}</strong></span>
                                <div class="delete-btn" data-id="{{ $product->id }}">
                                    <i class="far fa-trash-alt"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="total-price-container">
                    <h3>Total price: $<span id="total-price">{{ $total_price }}</span></h3>
                    <button id="order-btn" type="button" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('content-scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let deleteBtns = document.querySelectorAll('.delete-btn');
            let items = JSON.parse(localStorage.getItem('items'));
            let form = document.getElementById('cart-form');

            deleteBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    let id = btn.getAttribute('data-id');
                    let index = items.indexOf(id);

                    items.splice(index, 1);

                    localStorage.clear();
                    localStorage.setItem('items', JSON.stringify(items));


                    document.getElementById('ids').value = JSON.stringify(items);
                    form.submit();
                })
            });

            // Order button.
            document.getElementById('order-btn').addEventListener('click', function () {
                window.location.replace('{{ route('order') }}?ids=' + JSON.stringify(items));
            });
        });
    </script>
@endpush