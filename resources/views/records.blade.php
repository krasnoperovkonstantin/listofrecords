@extends ('layouts.app')

@section('title')list

@section('content')

    @foreach($data->all() as $value)
    <div class="alert alert-info">
    {{ $value->name }} {{ $value->author }}
    <a href="{{ route('update', $value->id)}}">Update</a>
    <a href="{{ route('delete-submit', $value->id)}}">Delete</a>
    </div>
    @endforeach
  
    {{ $data->links() }}

@endsection

