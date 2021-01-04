@extends ('layouts.app')

@section('title'){{ __('face.addrecord') }}
@endsection

@section('content')

<h1>{{ __('face.addrecord') }}</h1>

<form action="{{ route('insert-submit')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">{{ __('face.name') }}</label>
    <input type="text" name="name" value="" placeholder="Введите название пластинки" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="genre">{{ __('face.genre') }}</label>
    <input type="text" name="genre" value="" placeholder="Введите автора пластинки" id="genre" class="form-control">
  </div>
  <div class="form-group">
    <label for="format">{{ __('face.format') }}</label>
    <input type="text" name="format" value="" placeholder="Введите жанр пластинки" id="format" class="form-control">
  </div>
  <div class="form-group">
    <label for="origin">{{ __('face.origin') }}</label>
    <input type="text" name="origin" value="" placeholder="Введите жанр пластинки" id="origin" class="form-control">
  </div>
  <div class="form-group">
    <label for="releasedate">{{ __('face.releasedate') }}</label>
    <input type="text" name="releasedate" value="" placeholder="Введите жанр пластинки" id="releasedate" class="form-control">
  </div>
  <div class="form-group">
    <label for="manufacturer">{{ __('face.manufacturer') }}</label>
    <input type="text" name="manufacturer" value="" placeholder="Введите жанр пластинки" id="manufacturer" class="form-control">
  </div>
  <div class="form-group">
    <label for="listoftracks">{{ __('face.listoftracks') }}</label>
    <textarea name="listoftracks" id="listoftracks" placeholder="Введите список записей" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success">{{ __('face.addrecord') }}</button>

</form>
@endsection

