@extends('layouts.admin')
@section('content')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div>
        <a href="{{route('admin.post.edit', $post->id)}}">Обновить</a>
    </div>
    <div>
        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Удалить"/>
        </form>
    </div>
    <div>
        <a href="{{route('admin.post.index')}}">Назад</a>
    </div>
@endsection
