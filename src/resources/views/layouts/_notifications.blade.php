@if( $errors->any() )
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
@endif

@if(session()->has('success'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif
