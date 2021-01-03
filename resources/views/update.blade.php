@extends ('layouts.app')

@section('title'){{ __('face.update') }}
@endsection

@section('content')

<h1>{{ __('face.update') }}</h1>

<form action="{{ route('update-submit', $data->id)}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">{{ __('face.name') }}</label>
    <input type="text" name="name" value="{{$data->name}}" placeholder="Введите название пластинки" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">{{ __('face.author') }}</label>
    <input type="text" name="author" value="{{$data->author}}" placeholder="Введите автора пластинки" id="author" class="form-control">
  </div>
  <div class="form-group">
    <label for="genre">{{ __('face.author') }}</label>
    <input type="text" name="genre" value="{{$data->genre}}" placeholder="Введите жанр пластинки" id="genre" class="form-control">
  </div>
  <div class="form-group">
    <label for="listoftracks">{{ __('face.listoftracks') }}</label>
    <textarea name="listoftracks" id="listoftracks" placeholder="Введите список записей" class="form-control">{{$data->listoftracks}}</textarea>
  </div>

  <button type="submit" class="btn btn-success">{{ __('face.save') }}</button>

</form>
@endsection

