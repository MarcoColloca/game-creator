@extends('layouts.app')

@section('title', 'Character')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Character!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $character->name }}</h3>
                <p>Attacco: {{ $character->attack }}</p>
                <p>Difesa: {{ $character->defence }}</p>
                <p>Velocità: {{ $character->speed }}</p>
                <p>Punti Ferita: {{ $character->life }}</p>
                <p>Descrizione: {{ $character->description }}</p>
            </div>
        </div>
    </div>
</section>
@endsection