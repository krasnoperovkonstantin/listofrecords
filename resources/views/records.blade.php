@extends ('layouts.app')

@section('title'){{ __('face.listofrecords') }}
@endsection

@section('content')
    <h1>{{ __('face.listofrecords') }}</h1>

    @foreach($data->all() as $value)
    <div class="alert alert-info row">
        <div class="col-sm-7">
            <div class="form-group row">    
                <label for="name" class="col-sm-4 form-control-sm">{{ __('face.name') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext form-control-sm" name="name" id="name">{{ $value->name }}</span>
                </div>   
                <label for="genre" class="col-sm-4 form-control-sm">{{ __('face.genre') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext form-control-sm" name="genre" id="genre">{{ $value->genre }}</span>
                </div>
                <label for="format" class="col-sm-4 form-control-sm">{{ __('face.format') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="format" id="format">{{ $value->format }}</span>
                </div>
                <label for="origin" class="col-sm-4 form-control-sm">{{ __('face.origin') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="origin" id="origin">{{ $value->origin }}</span>
                </div>  
                <label for="releasedate" class="col-sm-4 form-control-sm">{{ __('face.releasedate') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="releasedate" id="releasedate">{{ $value->releasedate }}</span>
                </div>    
                <label for="manufacturer" class="col-sm-4 form-control-sm">{{ __('face.manufacturer') }}</label>
                <div class="col-sm-8">
                    <span class="form-control-plaintext" name="manufacturer" id="manufacturer">{{ $value->manufacturer }}</span>
                </div>
            </div>
            <a href="{{ route('update', $value->id)}}" class="btn btn-outline-secondary">{{ __('face.update') }}</a>
            <a href="{{ route('delete-submit', $value->id)}}" class="btn btn-outline-secondary">{{ __('face.delete') }}</a>
        </div>
        <div class="col-sm-5">
            <textarea name="listoftracks" id="listoftracks" rows="11" placeholder="Список записей пуст" class="form-control" readonly>{{$value->listoftracks}}</textarea>
        </div>

    </div>
    @endforeach
  
    {{ $data->links() }}

@endsection

