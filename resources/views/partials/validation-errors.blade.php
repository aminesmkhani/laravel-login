@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            {{$error}}
        </div>
    </div>
    @endforeach
@endif
