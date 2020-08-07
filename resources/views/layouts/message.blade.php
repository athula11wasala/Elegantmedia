@if ( count( $errors ) > 0 or (Session::has('message')) or (Session::has("messageWarning")))
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @if ( count( $errors ) > 0 )
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {!! $error !!}<br>
                            @endforeach
                            @endif

                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @if (Session::has('messageWarning'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('messageWarning') }}
                                </div>
                            @endif

                        </div>
                </div>
            </div></div>
    </div>
@endif