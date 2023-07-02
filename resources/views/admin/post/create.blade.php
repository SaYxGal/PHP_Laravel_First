@extends('layouts.admin')
@section('content')
    <div>
        <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input
                    value="{{old('title')}}"
                    type="text" name="title" class="form-control" id="title"/>
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержимое</label>
                <textarea
                    name="content" class="form-control" id="content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Добавить изображение</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input
                            name="image" type="file" class="custom-file-input" id="image"/>
                        <label class="custom-file-label">Выберите изображение</label>
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="category">Категория</label>
                <select name="category_id" id="category" class="form-select">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags">Тэги</label>
                <select class="form-select" multiple id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
