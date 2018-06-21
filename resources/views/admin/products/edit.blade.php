@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Edit product</h1>
                <form class="mt-5" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="name" class="form-control @if ($errors->has('name')) invalid-feedback @endif"
                               type="text" placeholder="Name" value="{{ $product->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea name="description"
                                  class="form-control @if ($errors->has('description')) invalid-feedback @endif"
                                  placeholder="Description">{{ $product->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="text-center pt-5 pb-5">
                        <img src="{{ route('media', $product->media->id) }}" width="100px" />
                    </div>
                    <div class="form-group">
                        <input name="file" class="form-control @if ($errors->has('file')) invalid-feedback @endif"
                               type="file" placeholder="Image" value="{{ $product->media->file }}" />
                        @if ($errors->has('file'))
                            <span class="invalid-feedback">{{ $errors->first('file') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if ($product->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <span class="invalid-feedback">{{ $errors->first('category') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="price" class="form-control @if ($errors->has('price')) invalid-feedback @endif"
                               type="number" placeholder="Price" value="{{ $product->price }}">
                        @if ($errors->has('price'))
                            <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update" />
                </form>
            </div>
        </div>
    </div>
@endsection