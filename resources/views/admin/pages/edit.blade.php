@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($erros->all() as $message)
                    {{$message}}
                @endforeach
                <form class="" action="{{route('admin.pages.update', $page->id)}}" method="POST" enctype="multipart/form-data">
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
                        {{-- in questo caso abbiamo la possibilita di scegliere solo photo già caricate --}}
                        {{-- @foreach ($photos as $photo)
                        <div class="card">
                            <img class="card-img-top"  src="{{asset('storage/'. $photo->path)}}" alt="{{$photo->name}}">
                            <div class="card-body">
                                <label for="photos-{{$photo->id}}">{{$photo->name}}</label>
                                <input type="checkbox" name="photos[]" id="photos-{{$photo->id}}" value="{{$photo->id}}" {{((is_array(old('photos')) && in_array($photo->id, old('photos'))) ||  $page->photos->contains($photo->id)) ? 'checked' : ''}}>
                            </div>
                        </div>
                        @endforeach --}}
                        @foreach ($tags as $key => $tag)
                            {{-- deve essere in un array tags per la store, se fai dd è chiave valore --}}
                            <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                            <input type="checkbox" name="tags[]" id="tags-{{$tag->id}}" value="{{$tag->id}}" {{((is_array(old('tags')) && in_array($tag->id, old('tags'))) ||  $page->tags->contains($tag->id)) ? 'checked' : ''}}>
                        @endforeach
                    </div>
                    <div class="form-group">
                        @foreach ($page->photos as $photo)
                        <img class="card-img-top"  src="{{asset('storage/'. $photo->path)}}" alt="{{$photo->name}}">
                        @endforeach
                        <input type="file" name="photo-file" >
                        <input type="submit" value="Salva" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
