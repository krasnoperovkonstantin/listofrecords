@extends('layouts.main-layout')

@section('content')
    <div class="container">
        @include('includes.show-message')
        <form action="{{ route('record.index') }}" method="get">
            <div class="form-group row px-3">
                <div class="col-2">
                    <select name="genre_id" class="form-control" onchange="javascript:this.form.submit()">
                        <option value="">Все жанры</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" @if(isset($_GET['genre_id']) and $_GET['genre_id'] == $genre->id) selected @endif>{{ $genre->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <select name="origin_id" class="form-control" onchange="javascript:this.form.submit()">
                        <option value="">Все происхождения</option>
                        @foreach($origins as $origin)
                        <option value="{{ $origin->id }}" @if(isset($_GET['origin_id']) and $_GET['origin_id'] == $origin->id) selected @endif>{{ $origin->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <select name="format_id" class="form-control" onchange="javascript:this.form.submit()">
                        <option value="">Все форматы</option>
                        @foreach($formats as $format)
                        <option value="{{ $format->id }}" @if(isset($_GET['format_id']) and $_GET['format_id'] == $format->id) selected @endif>{{ $format->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <select name="manufacturer_id" class="form-control" onchange="javascript:this.form.submit()">
                        <option value="">Все производители</option>
                        @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}" @if(isset($_GET['manufacturer_id']) and $_GET['manufacturer_id'] == $manufacturer->id) selected @endif>{{ $manufacturer->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input class="form-control" name="search_field" value="{{ $_GET['search_field'] ?? '' }}" type="text" id="search" placeholder="Текстовый поиск">
                </div>
                <div class="col-2">
                    <a class="form-control btn-primary text-center text-decoration-none" href="{{ route('record.index')}}">Очистить</a>
                </div>
            </div>
        </form>

        <div class="container mt-4">
            @foreach ($records as $record)
                <div class="card mb-4">
                    <div class="card-body d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title">{{ $record->title }}</h5>
                            <p class="card-text">{{ $record->description }}</p>
                            <div class="collapse" id="more-{{ $record->id }}">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-text">Характеристики:</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Жанр: {{ $record->genre->title }}</li>
                                            <li class="list-group-item">Происхождение: {{ $record->origin->title }}</li>
                                            <li class="list-group-item">Формат: {{ $record->format->title }}</li>
                                            <li class="list-group-item">Производитель: {{ $record->manufacturer->title }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="card-text">Список треков:</h5>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($record->tracks as $track)
                                                <li class="list-group-item p-1">{{ $track->number }}. {{ $track->title }} [{{ $track->duration }}]</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" data-toggle="collapse" href="#more-{{ $record->id }}">Больше информации</a>
                            <div class="btn-group">
                                <a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Действия</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('record.edit', $record->id) }}">
                                        Редактировать пластинку
                                    </a>
                                    <a class="dropdown-item" href="{{ route('record.track.index', $record->id) }}">
                                        Редактировать треки пластинки
                                    </a>
                                    <a class="dropdown-item" href="{{ route('record.track.create', $record->id) }}">
                                        Добавить трек пластинки
                                    </a>
                                    <form class="d-inline" action="{{ route('record.destroy', $record->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item bg-danger text-white">
                                            Удалить пластинку
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img class="float-right ml-3" src="{{ asset('/storage/' . $record->image) }}" height="150" width="150" alt="изображение {{ $record->image }} отсутствует на сервере">
                        </div>
                    </div>
                </div>
            @endforeach
            @if($emptyListRecords)
                <div>
                    Список пластинок пуст, пожалуйста измените фильтр.
                </div>
            @endif
            {{ $records->withQueryString()->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>
@endsection
