@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Edit Contact</h1>
                <form class="mt-5" method="POST" action="{{ route('admin.contacts.update', $contact->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                               type="text" placeholder="Name" value="{{ $contact->email }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea name="message"
                                  class="form-control @if ($errors->has('message')) is-invalid @endif"
                                  placeholder="Description">{{ $contact->message }}</textarea>
                        @if ($errors->has('message'))
                            <span class="invalid-feedback">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update" />
                </form>
            </div>
        </div>
    </div>
@endsection