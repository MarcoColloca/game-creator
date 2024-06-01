@extends('layouts.app')

@section('title', 'Characters')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4 text-center">
        <h1 class="title  text-success">Personaggi!</h1>
        <a href="{{ route('characters.create') }}" class="btn btn-success mt-3">Crea il tuo Personaggio</a>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th class="text-center" scope="col">Attacco</th>
                    <th class="text-center" scope="col">Difesa</th>
                    <th class="text-center" scope="col">Velocità</th>
                    <th class="text-center" scope="col">Vita</th>
                    <th scope="col">Descrizione</th>
                    <th class="text-center" scope="col">Mostra</th>
                    <th class="text-center" scope="col">Modifica</th>
                    <th class="text-center" scope="col">Eilimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($characters as $character)                
                    <tr class="position-relative">
                        <td>{{$character->name}}</td>
                        <td>{{$character->attack}}</td>
                        <td>{{$character->defence}}</td>
                        <td>{{$character->speed}}</td>
                        <td>{{$character->life}}</td>
                        <td>{{$character->description}}</td>
                        <td class="text-center">
                            <a class="btn link-success" href="{{ route('characters.show', $character) }}">Mostra</a>
                        </td>
                        <td class="text-center">
                            <a class="btn link-primary" href="{{ route('characters.edit', $character) }}">Modifica</a>
                        </td>
                        <td class="text-center">
                            <form class="character-delete-form" action="{{ route('characters.destroy', $character) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn link-danger">X</button>

                                <div class="my-modal">
                                    <div class="my-modal__box">
                                        <h5 class="text-center me-5">Vuoi Davvero Eliminare il Personaggio?!</h5>
                                        <span class="link link-danger my-modal-yes mx-5">Sì</span>
                                        <span class="link link-success my-modal-no">No</span>
                                    </div>
                                </div>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection