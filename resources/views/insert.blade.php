@extends ('layouts.app')

@section('title'){{ __('face.addrecord') }}
@endsection

@section('content')

<h1>{{ __('face.addrecord') }}</h1>

<form action="{{ route('insert-submit')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">{{ __('face.name') }}</label>
    <input type="text" name="name"  placeholder="Введите название пластинки" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">{{ __('face.author') }}</label>
    <input type="text" name="author"  placeholder="Введите автора пластинки" id="author" class="form-control">
  </div>
  <div class="form-group">
    <label for="genre">{{ __('face.genre') }}</label>
    <input type="text" name="genre"  placeholder="Введите жанр пластинки" id="genre" class="form-control">
  </div>
  <div class="form-group">
    <label for="listoftracks">{{ __('face.listoftracks') }}</label>
    <textarea name="listoftracks" id="listoftracks" placeholder="Введите список записей" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success">{{ __('face.addrecord') }}</button>

</form>
@endsection

