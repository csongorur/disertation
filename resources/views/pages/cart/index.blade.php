@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Cart</h1>
                {{ count($products) }}
            </div>
        </div>
    </div>
@endsection