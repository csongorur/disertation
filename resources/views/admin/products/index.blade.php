@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Products</h1>
                <table class="mt-5 table-striped table" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($products) > 0)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->price . ' $' }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('products.delete', $product->id) }}" class="btn btn-danger delete-btn">Delete
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