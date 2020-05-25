@if($paginator->total() > $paginator->count())
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ $paginator->links() }}
        </div>
    </div>
@endif
