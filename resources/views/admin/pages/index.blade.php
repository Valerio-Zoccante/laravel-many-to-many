@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
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
