@extends('layouts.app')

@section('title', 'Type')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success"> {{$type->name}} Class.</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4 position-relative">
        <div class="row justify-content-center">
            <div class="card my-card">
                <div class="card-body text-center">
                    
                    <h5 class="fw-bold text-start">Description: </h5>                    
                    <p class="text-start">
                        {{ $type->description }}
                    </p>
                </div>
            </div>
        </div>

        <span class="back-to-types">
            <a class="btn btn-outline-success" href="{{route('admin.types.index')}}"> ← </a>
        </span>
    </div>
</section>
@endsection