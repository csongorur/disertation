@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h1 class="text-center">Order {{ $order->id }}</h1>
                <form class="mt-5" action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif"
                               value="{{ $order->name }}"/>
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input type="text" name="address"
                               class="form-control @if($errors->has('address')) is-invalid @endif"
                               value="{{ $order->address }}"/>
                        @if($errors->has('address'))
                            <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Phone</label>
                        <input type="text" name="phone"
                               class="form-control @if($errors->has('phone')) is-invalid @endif"
                               value="{{ $order->phone }}"/>
                        @if($errors->has('phone'))
                            <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select name="status" class="form-control">
                            @foreach(config('orderStatus') as $status)
                                <option @if($status === $order->status) selected
                                        @endif value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update"/>
                </form>
            </div>
            <div class="col-12 col-sm-6">
                <h1>Products</h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection