@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Orders</h1>
                <table class="mt-5 table-striped table" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($orders) > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td><a href="{{ route('admin.orders.edit', $order->id) }}">{{ $order->name }}</a></td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ !is_null($order->user) ? $order->user->name : '' }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.delete', $order->id) }}" class="btn btn-danger delete-btn">Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No product</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection