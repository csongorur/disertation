<div class="alerts-container" id="alerts-container">
    <div class="container">
        <div class="alert alert-success alert-dismissible alert-auto-close fade @if (Session::has('success_msg') || Session::has('status')) show @else d-none @endif"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="icon icon-arrows-remove"></span>
            </button>
            <span class="message">
            @if (Session::has('success_msg'))
                    {!! Session::get('success_msg') !!}
                @elseif (Session::has('status'))
                    {!! Session::get('status') !!}
                @endif
            </span>
        </div>

        <div class="alert alert-danger alert-dismissible alert-auto-close fade @if (Session::has('error_msg')) show @else d-none @endif"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="icon icon-arrows-remove"></span>
            </button>
            <span class="message">
            @if (Session::has('error_msg'))
                    {!! Session::get('error_msg') !!}
                @endif
            </span>
        </div>

        <div class="alert alert-danger alert-dismissible alert-auto-close fade @if (count($errors->all()) > 0) show @else d-none @endif"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="icon icon-arrows-remove"></span>
            </button>
            <span class="message">
            @if (count($errors->all()) > 0)
                    @foreach($errors->all() as $error)
                        {!! $error !!}
                    @endforeach
                @endif
            </span>
        </div>
    </div>
</div>
