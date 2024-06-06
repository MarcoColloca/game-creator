@extends('layouts.app')

@section('title', 'Type')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Your selected Type.</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <div class="row justify-content-center">
            <div class="card my-card">
                <div class="card-body text-center">
                    <h2 class="mb-2">{{ $type->name }}</h2>
                    <h5 class="fw-bold text-start">Description: </h5>                    
                    <p class="text-start">
                        {{ $type->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection