@if (session('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>{{ session('success') }}</h4>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li><h4>{{ $error }}</h4></li>
            @endforeach
        </ul>
    </div>
@endif
