@extends('layouts.main-layout')

@section('content')
    <div class="container">
        @include('includes.show-message')
        <div class="card">
            <div class="card-header">
                <h5 class="card-text">{{ $title }}</h5>
            </div>
            <div class="card-body">                
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th scope="col">Идентификатор</th>
                            @foreach ($columns as $column)
                                <th scope="col">{{ $column['title'] }}</th>
                            @endforeach
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($items as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                @foreach ($columns as $column)
                                    <th>{{ $item->{$column['name']} }}</th> 
                                @endforeach
                               
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route($route_edit, $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Редактировать
                                    </a>
                                    <form class="d-inline" action="{{ route($route_destroy, $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash"></i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $items->withQueryString()->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
