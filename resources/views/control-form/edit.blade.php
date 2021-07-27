@extends('layouts.main-layout')

@section('content')
    <div class="container">
        @include('includes.show-message')
        <div class="card">
            <div class="card-header">
                <h5 class="card-text">{{ $title.': '.$item->title }}</h5>
            </div>
            <form action="{{ route($route_update, $item->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('includes.controls')
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                    <div class="btn-group">
                        <a class="form-control btn-primary text-center text-decoration-none" href="javascript:history.back()">Вернуться назад</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
