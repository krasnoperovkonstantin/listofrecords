@extends('layouts.main-layout')

@section('content')
    <div class="container">
    <div class="mb-3">
        
            <form action="{{ route('record.index') }}" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Search</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
            </div>
            <div class="mb-3">
            <div class="form-label">Choose category</div>
                <select name="genre_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}" @if(isset($_GET['genre_id'])) @if($_GET['genre_id'] == $genre->id) selected @endif @endif>{{$genre->title}}</option>
                    @endforeach
                </select>
                <select name="origin_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    @foreach($origins as $origin)
                    <option value="{{$origin->id}}" @if(isset($_GET['origin_id'])) @if($_GET['origin_id'] == $origin->id) selected @endif @endif>{{$origin->title}}</option>
                    @endforeach
                </select>
                <select name="format_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    @foreach($formats as $format)
                    <option value="{{$format->id}}" @if(isset($_GET['format_id'])) @if($_GET['format_id'] == $format->id) selected @endif @endif>{{$format->title}}</option>
                    @endforeach
                </select>
  
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="btn-group">
            @if (isset($select_genre))
                <a class="btn btn-primary dropdown-toggle active" href="#" data-toggle="dropdown">{{$select_genre->title}}</a>
            @else
                <a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Выберите жанр</a>
            @endif

            <div class="dropdown-menu">
                @foreach ($genres as $genre)
                    @if (isset($select_genre) and $genre->slug === $select_genre->slug)
                        <a href="{{route('getRecords')}}" class="dropdown-item active">{{$genre->title}}</a>
                    @else
                        <a href="{{route('getRecordsByGenre', $genre->slug)}}" class="dropdown-item">{{$genre->title}}</a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="btn-group">
            @if (isset($select_origin))
                <a class="btn btn-primary dropdown-toggle active" href="#" data-toggle="dropdown">{{$select_origin->title}}</a>
            @else
                <a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Выберите происхождение</a>
            @endif

            <div class="dropdown-menu">
                @foreach ($origins as $origin)
                    @if (isset($select_origin) and $origin->slug === $select_origin->slug)
                        <a href="{{route('getRecords')}}" class="dropdown-item active">{{$origin->title}}</a>
                    @else
                        <a href="{{route('getRecordsByOrigin', $origin->slug)}}" class="dropdown-item">{{$origin->title}}</a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="btn-group">
            @if (isset($select_format))
                <a class="btn btn-primary dropdown-toggle active" href="#" data-toggle="dropdown">{{$select_format->title}}</a>
            @else
                <a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Выберите формат</a>
            @endif
            
            <div class="dropdown-menu">
                @foreach ($formats as $format)
                    @if (isset($select_format) and $format->slug === $select_format->slug)
                        <a href="{{route('getRecords')}}" class="dropdown-item active">{{$format->title}}</a>
                    @else
                        <a href="{{route('getRecordsByFormat', $format->slug)}}" class="dropdown-item">{{$format->title}}</a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="btn-group">
            @if (isset($select_manufacturer))
                <a class="btn btn-primary dropdown-toggle active" href="#" data-toggle="dropdown">{{$select_manufacturer->title}}</a>
            @else
                <a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Выберите производителя</a>
            @endif

            <div class="dropdown-menu">
                @foreach ($manufacturers as $manufacturer)
                    @if (isset($select_manufacturer) and $manufacturer->slug === $select_manufacturer->slug)
                        <a href="{{route('getRecords')}}" class="dropdown-item active">{{$manufacturer->title}}</a>            
                    @else
                        <a href="{{route('getRecordsByManufacturer', $manufacturer->slug)}}" class="dropdown-item">{{$manufacturer->title}}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mt-4">
        @foreach ($records as $record)
            <div class="card mb-4">
                <div class="card-body d-flex">
                        <div class="flex-grow-1">
                       
                            <h5 class="card-title">{{ $record->title }}</h5>
                            <p class="card-text">{{ $record->description }}</p>
                            <div class="collapse" id="more-{{ $record->slug }}">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-text">Характеристики:</h5>              
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Жанр: <a href="{{ route('getRecordsByGenre', $record->genre->slug) }}" class="card-text">{{ $record->genre->title }}</a></li>
                                            <li class="list-group-item">Происхождение: <a href="{{ route('getRecordsByOrigin', $record->origin->slug) }}" class="card-text">{{ $record->origin->title }}</a></li>
                                            <li class="list-group-item">Формат: <a href="{{ route('getRecordsByFormat', $record->format->slug) }}" class="card-text">{{ $record->format->title }}</a></li>
                                            <li class="list-group-item">Производитель: <a href="{{ route('getRecordsByManufacturer', $record->manufacturer->slug) }}" class="card-text">{{ $record->manufacturer->title }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="card-text">Список треков:</h5>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($record->tracks as $track)
                                                <li class="list-group-item p-1">{{$track->number}}. {{$track->title}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" data-toggle="collapse" href="#more-{{ $record->slug }}">Больше информации</a>
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
                        <div class="">
                            <img class="float-right" src="{{ asset('/storage/' . $record->image) }}" height="150" width="150" alt="изображение {{ $record->image }} отсутствует на сервере">
                        </div>
                    

        
                </div>
            </div>
        @endforeach
        {{$records->withQueryString()->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
