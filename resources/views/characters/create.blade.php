@extends('layouts.app')

@section('title', 'Character')

@section('content')
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
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert your name's character"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="attack" class="form-label fw-bold">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" placeholder="Insert value"
                    value="{{ old('attack') }}">
            </div>
            <div class="mb-3">
                <label for="defence" class="form-label fw-bold">Defence</label>
                <input type="number" class="form-control" id="defence" name="defence" placeholder="Insert value"
                    value="{{ old('defence') }}">
            </div>
            <div class="mb-3">
                <label for="life" class="form-label fw-bold">Life</label>
                <input type="number" class="form-control" id="life" name="life" placeholder="Insert value"
                    value="{{ old('life') }}">
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label fw-bold">Speed</label>
                <input type="number" class="form-control" id="speed" name="speed" placeholder="Insert value"
                    value="{{ old('speed') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Describe your character">{{ old('description') }}</textarea>
            </div>
            <button class="btn btn-primary">Create</button>
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