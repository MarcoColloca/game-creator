@extends('layouts.app')

@section('title', 'Character')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Your Character!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <div class="row justify-content-center gap-5">
            <div class="card my-card">
                <div class="card-body text-center">
                    <h2 class="mb-4">{{ $character->name }}</h2>
                    <p> <span class="fw-bold"> Class:  </span>{{ $character->type->name }}</p>
                    <p> <span class="fw-bold"> Defence:  </span>{{ $character->defence }}</p>
                    <p> <span class="fw-bold"> Speed: </span> {{ $character->speed }}</p>
                    <p> <span class="fw-bold"> Life: </span> {{ $character->life }}</p>
                    <p> <span class="fw-bold"> Attack: </span> {{ $character->attack }}</p>
                    <h5 class="fw-bold text-start">Description: </h5>                    
                    <p class="text-start">
                        {{ $character->description }}
                    </p>
                </div>
            </div>
            <div class="card my-card">
                <div class="card-body text-center">
                    <h2 class="mb-2">Inventory</h2>
                    <ul>
                        @foreach ($character->items as $item )
                            <li class="text-start">{{ $item->name }}: {{ $item->pivot->qty }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection