@extends('layouts.app')

@section('title', 'Character')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Create your Character!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <form action="{{ route('characters.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="attack" class="form-label">Attacco</label>
                <input type="number" class="form-control" id="attack" name="attack" placeholder="Inserisci il valore"
                    value="{{ old('attack') }}">
            </div>
            <div class="mb-3">
                <label for="defence" class="form-label">Difesa</label>
                <input type="number" class="form-control" id="defence" name="defence" placeholder="Inserisci il valore"
                    value="{{ old('defence') }}">
            </div>
            <div class="mb-3">
                <label for="life" class="form-label">Punti ferita</label>
                <input type="number" class="form-control" id="life" name="life" placeholder="Inserisci il valore"
                    value="{{ old('life') }}">
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Velocità</label>
                <input type="number" class="form-control" id="speed" name="speed" placeholder="Inserisci il valore"
                    value="{{ old('speed') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Inserisci la descrizione">{{ old('description') }}</textarea>
            </div>
            <button class="btn btn-primary">Crea</button>
        </form>
    </div>

    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
@endsection