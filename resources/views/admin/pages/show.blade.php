@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>{{$page->title}}</h2>
            <h3>Categoria: {{$page->category->name}}</h3>
            <small>Scritto da: {{$page->user->name}}</small>
            <small>Ultima modifica: {{$page->updated_at}}</small>
            <div class="">
                {{$page->body}}
            </div>
            @if($page->tags->count()>0)
            <div class="">
                <h4>Tags</h4>
                <ul>
                @foreach ($page->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
                </ul>
            </div>
            @endif
            @if($page->photos->count() > 0)
            @foreach ($page->photos as $photo)
            <img class="img-fluid" src="{{asset('storage/'. $photo->path)}}" alt="{{$photo->name}}">
            @endforeach
            @endif
        </div>
    </div>
@endsection
