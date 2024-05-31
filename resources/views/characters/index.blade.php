@extends('layouts.app')

@section('title', 'Characters')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4 text-center">
        <h1 class="title  text-success">Characters!</h1>
        <a href="{{ route('characters.create') }}" class="btn btn-success mt-3">Crea il tuo personaggio</a>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attack</th>
                    <th scope="col">Defence</th>
                    <th scope="col">Speed</th>
                    <th scope="col">Life</th>
                    <th scope="col">Mostra</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($characters as $character)                
                    <tr>
                        <td>{{$character->name}}</td>
                        <td>{{$character->description}}</td>
                        <td>{{$character->attack}}</td>
                        <td>{{$character->defence}}</td>
                        <td>{{$character->speed}}</td>
                        <td>{{$character->life}}</td>
                        <td class="text-center"><a class="link-success"
                                href="{{ route('characters.show', $character) }}">Info</a></td>
                        <td class="text-center"><a class="link-primary"
                                href="{{ route('characters.edit', $character) }}">Modifica</a></td>
                        <td class="text-center">
                            <form action="{{ route('characters.destroy', $character) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-link link-danger">Elimina</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection