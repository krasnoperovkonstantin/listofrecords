@extends ('layouts.app')

@section('title'){{ __('face.listofrecords') }}
@endsection

@section('content')
    <h1>{{ __('face.listofrecords') }}</h1>

    @foreach($data->all() as $value)
    <div class="alert alert-info row">
        <div class="col-sm-7">
            <div class="form-group row">    
                <label for="name" class="col-sm-4 col-form-label">{{ __('face.name') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="name" id="name">{{ $value->name }}</span>
                </div>
            </div>
            <div class="form-group row">    
                <label for="author" class="col-sm-4 col-form-label">{{ __('face.author') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="author" id="author">{{ $value->author }}</span>
                </div>
            </div>
            <div class="form-group row">    
                <label for="genre" class="col-sm-4 col-form-label">{{ __('face.genre') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="genre" id="genre">{{ $value->genre }}</span>
                </div>
            </div>
            <a href="{{ route('update', $value->id)}}" class="btn btn-outline-secondary">{{ __('face.update') }}</a>
            <a href="{{ route('delete-submit', $value->id)}}" class="btn btn-outline-secondary">{{ __('face.delete') }}</a>
        </div>
        <div class="col-sm-5">
            <textarea name="listoftracks" id="listoftracks" rows="7" placeholder="Список записей пуст" class="form-control" readonly>{{$value->listoftracks}}</textarea>
        </div>

    </div>
    @endforeach
  
    {{ $data->links() }}

@endsection

