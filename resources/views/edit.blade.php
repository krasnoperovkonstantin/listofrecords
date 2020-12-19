@extends ('layouts.app')

@section('title')edit2


@section('content')

<h1>Редактировать</h1>
@if($errors->all())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{ route('edit-form')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Название пластинки</label>
    <input type="text" name="name"  placeholder="Введите название пластинки" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">Автор пластинки</label>
    <input type="text" name="author"  placeholder="Введите автора пластинки" id="author" class="form-control">
  </div>
  <div class="form-group">
    <label for="genre">Жанр пластинки</label>
    <input type="text" name="genre"  placeholder="Введите жанр пластинки" id="genre" class="form-control">
  </div>

  <button type="submit" class="btn btn-success">Сохранить изменения</button>

</form>
@endsection

