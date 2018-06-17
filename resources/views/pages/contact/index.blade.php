@extends ('app')

@section ('content')
    <div class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Contact</h1>
                    <p>Send for us a message.</p>
                    <form action="{{ route('contact.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" name="email" placeholder="Email address"/>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @if ($errors->has('message')) is-invalid @endif" name="message" cols="30" rows="10" placeholder="Message"></textarea>
                            @if ($errors->has('message'))
                                <span class="invalid-feedback">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <input class="btn" type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection