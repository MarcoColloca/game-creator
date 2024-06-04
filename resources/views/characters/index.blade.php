@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4 text-center">
        <h1 class="title  text-success">Characters!</h1>
        <a href="{{ route('characters.create') }}" class="btn btn-success mt-3">Create your Character</a>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th class="text-center" scope="col">Attack</th>
                    <th class="text-center" scope="col">Defence</th>
                    <th class="text-center" scope="col">Speed</th>
                    <th class="text-center" scope="col">Life</th>
                    <th scope="col">Description</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Delete</th>
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
                            <a class="btn link-success" href="{{ route('characters.show', $character) }}">Show</a>
                        </td>
                        <td class="text-center">
                            <a class="btn link-primary" href="{{ route('characters.edit', $character) }}">Edit</a>
                        </td>
                        <td class="text-center">
                            <form class="item-delete-form" action="{{ route('characters.destroy', $character) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn link-danger">X</button>

                                <div class="my-modal">
                                    <div class="my-modal__box">
                                        <h5 class="text-center me-5">Do you really want to delete this Character?!</h5>
                                        <span class="link link-danger my-modal-yes mx-5">Yes</span>
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