@extends('layouts.admin')
@section('content')
    <div>
        <form action="{{route('admin.post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}"/>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержимое</label>
                <textarea name="content" class="form-control" id="content">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input name="image" type="text" class="form-control" id="image" value="{{$post->image}}"/>
            </div>
            <div class="mb-3">
                <label for="category">Категория</label>
                <select name="category_id" id="category" class="form-select">
                    @foreach($categories as $category)
                        <option {{$category->id === $post->category->id ? 'selected' : ''}}
                                value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags">Тэги</label>
                <select class="form-select" multiple id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{$tag->id === $postTag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
