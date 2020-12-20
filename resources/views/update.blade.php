@extends ('layouts.app')

@section('title')edit2


@section('content')

<h1>Редактировать</h1>

<form action="{{ route('update-submit', $data->id)}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Название пластинки</label>
    <input type="text" name="name" value="{{$data->name}}" placeholder="Введите название пластинки" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">Автор пластинки</label>
    <input type="text" name="author" value="{{$data->author}}" placeholder="Введите автора пластинки" id="author" class="form-control">
  </div>
  <div class="form-group">
    <label for="genre">Жанр пластинки</label>
    <input type="text" name="genre" value="{{$data->genre}}" placeholder="Введите жанр пластинки" id="genre" class="form-control">
  </div>

  <button type="submit" class="btn btn-success">Сохранить изменения</button>

</form>
@endsection

