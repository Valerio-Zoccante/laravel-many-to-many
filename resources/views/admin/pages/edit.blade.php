@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($erros->all() as $message)
                    {{$message}}
                @endforeach
                <form class="" action="{{route('admin.pages.update', $page->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" class="form-control" value="{{old('title') ?? $page->title}}">
                    </div>
                    <div class="form-group">
                        <label for="summary">Sommario</label>
                        <input type="text" name="summary" class="form-control" value="{{old('summary') ?? $page->summary}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Testo</label>
                        <textarea name="body" rows="8" cols="80" class="form-control">{{old('body') ?? $page->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(!empty(old('category_id'))|| $category->id == $page->category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @foreach ($tags as $key => $tag)
                            <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                            {{-- deve essere in un array tags per la store, se fai dd è chiave valore --}}
                            <input type="checkbox" value="{{$tag->id}}" name="tags[]" id="tags-{{$tag->id}} {{(!empty(old('tags.'. $key))||$page->tags->contains($tag->id)) ? 'checked' : ''}}>
                        @endforeach
                    </div>
                    <div class="form-group">
                        @foreach ($photos as $photo)
                            <label for="photos-{{$photo->id}}">{{$photo->name}}</label>
                            {{-- deve essere in un array photos per la store, se fai dd sulla store della request è chiave valore --}}
                            <input type="checkbox" value="{{$photo->id}}" name="photos[]" id="photos-{{$photo->id}}">
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salva">
                </form>
            </div>
        </div>
    </div>
@endsection
