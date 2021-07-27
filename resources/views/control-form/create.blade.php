@extends('layouts.main-layout')

@section('content')
    <div class="container">
        @include('includes.show-message')
        <div class="card">
            <div class="card-header">
                <h5 class="card-text">{{ $title }}</h5>
            </div>
            <form action="{{ route($route_store, $constrained_id ?? Null) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('includes.controls')
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div> 
                    <div class="btn-group">
                        <a class="form-control btn-primary text-center text-decoration-none" href="{{ route($button_route, $button_route_param ?? '') }}">{{ $button_title }}</a>   
                    </div>       
                </div>
            </form>
        </div>
    </div>
@endsection
