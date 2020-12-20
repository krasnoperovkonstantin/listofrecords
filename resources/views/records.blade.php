@extends ('layouts.app')

@section('title')list

@section('content')

    @foreach($data->all() as $data)
    <div class="alert alert-info">
    {{ $data->name }} {{ $data->author }}
    <a href="{{ route('update', $data->id)}}">Update</a>
    <a href="{{ route('delete-submit', $data->id)}}">Delete</a>
    </div>
    @endforeach
  


@endsection

