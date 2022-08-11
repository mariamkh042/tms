
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif


@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif