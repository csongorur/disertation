@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5 mb-5">Order Form</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="total-price-container">
                    <h3>Total price: $<span id="total-price">{{ $total_price }}</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="mb-5" action="{{ route('order.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="products" value="{{ json_encode($ids) }}"/>
                    <div class="form-group">
                        <input type="text" name="name"
                               value="{{ (!is_null(old('name'))) ? old('name') : '' }}"
                               class="form-control @if($errors->has('name')) is-invalid @endif"
                               placeholder="Name"/>
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" value="{{ (!is_null(old('address'))) ? old('address') : '' }}"
                               class="form-control @if($errors->has('address')) is-invalid @endif"
                               placeholder="Address"/>
                        @if($errors->has('address'))
                            <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" value="{{ (!is_null(old('phone'))) ? old('phone') : '' }}"
                               class="form-control @if($errors->has('phone')) is-invalid @endif"
                               placeholder="Phone"/>
                        @if($errors->has('phone'))
                            <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Send order"/>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('content-scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let clear = '{{ Session::has('success_msg') }}';

            if (clear) {
                localStorage.clear();
                document.getElementById('total-price').innerHTML = 0;
            }
        });
    </script>
@endpush