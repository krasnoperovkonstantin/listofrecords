@extends ('layouts.app')

@section('title'){{ __('face.addrecord') }}
@endsection

@section('content')

<h1>{{ __('face.addrecord') }}</h1>

<form action="{{ route('insert-submit')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">{{ __('face.name') }}</label>
    <input type="text" name="name" value="" placeholder="Название пластинки" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="genre">{{ __('face.genre') }}</label>
    <input type="text" name="genre" value="" placeholder="Жанр пластинки" id="genre" class="form-control">
  </div>
  <div class="form-group">
    <label for="format">{{ __('face.format') }}</label>
    <input type="text" name="format" value="" placeholder="Формат пластинки" id="format" class="form-control">
  </div>
  <div class="form-group">
    <label for="origin">{{ __('face.origin') }}</label>
    <input type="text" name="origin" value="" placeholder="Происхождение пластинки" id="origin" class="form-control">
  </div>
  <div class="form-group">
    <label for="releasedate">{{ __('face.releasedate') }}</label>
    <input type="text" name="releasedate" value="" placeholder="Дата релиза пластинки" id="releasedate" class="form-control">
  </div>
  <div class="form-group">
    <label for="manufacturer">{{ __('face.manufacturer') }}</label>
    <input type="text" name="manufacturer" value="" placeholder="Производитель пластинки" id="manufacturer" class="form-control">
  </div>
  <div class="form-group">
    <label for="listoftracks">{{ __('face.listoftracks') }}</label>
    <textarea name="listoftracks" id="listoftracks" rows="11" placeholder="Список записей пластинки" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success">{{ __('face.addrecord') }}</button>

</form>
@endsection

