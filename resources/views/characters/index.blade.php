@extends('layouts.app')

@section('title', 'Characters')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Characters!</h1>
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
                    <th scope="col">Defense</th>
                    <th scope="col">Speed</th>
                    <th scope="col">Life</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($characters as $character)                
                    <tr>
                        <td>{{$character->name}}</td>
                        <td>{{$character->description}}</td>
                        <td>{{$character->attack}}</td>
                        <td>{{$character->defense}}</td>
                        <td>{{$character->speed}}</td>
                        <td>{{$character->life}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection