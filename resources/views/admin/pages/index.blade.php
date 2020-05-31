@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.pages.create')}}">Aggiungi pagina</a>
                    </li>
                </ul>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Categoria</th>
                            <th>Tags</th>
                            <th>Data Creazione</th>
                            <th>Data Update</th>
                            <th colspan='3'>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $pages)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->category->name}}</td>
                                <td>
                                    @foreach ($page->tags as $tag)
                                        {{$tag->name}} <br>
                                    @endforeach
                                </td>
                                <td>{{$page->created_at}}</td>
                                <td>{{$page->updated_at}}</td>
                                <td>Visualizza</td>
                                <td>Modifica</td>
                                <td>Elimina</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
