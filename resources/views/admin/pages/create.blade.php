@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($erros->all() as $message)
                    {{$message}}
                @endforeach
                <form class="" action="{{route('admin.pages.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="summary">Sommario</label>
                        <input type="text" name="summary" class="form-control" value="{{old('summary')}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Testo</label>
                        <textarea name="body" rows="8" cols="80" class="form-control">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(!empty(old('category_id'))) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @foreach ($tags as $tag)
                            <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                            {{-- deve essere in un array tags per la store, se fai dd è chiave valore --}}
                            <input type="checkbox" value="{{$tag->id}}" name="tags[]" id="tags-{{$tag->id}}" {{(is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : ''}}>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="photo">Fotografia</label>
                        <input type="file" name="photo" id="photo">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salva">
                </form>
            </div>
        </div>
    </div>
@endsection
