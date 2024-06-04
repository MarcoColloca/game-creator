@extends('layouts.app')

@section('title', 'Character')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-warning">Edit your Item!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <form action="{{ route('items.update', $item) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert your item's name"
                    value="{{ old('name', $item->name) }}">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label fw-bold">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="nome-item"
                    value="{{ old('slug', $item->slug) }}">
            </div>
            

            <label for="category" class="form-label fw-bold">Category</label>
            <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
                <option value="Simple Melee Weapons">Simple Melee Weapon</option>
                <option value="Simple Ranged Weapons">Simple Ranged Weapon</option>
                <option value="Martial Melee Weapons">Martial Melee Weapon</option>
                <option value="Martial Ranged Weapons">Martial Ranged Weapon</option>
            </select>
            
            <div class="mb-3">
                <label for="weight" class="form-label fw-bold">Weight (lb)</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Insert value es. 15"
                    value="{{ old('weight', $item->weight) }}">
            </div>

            <div class="mb-3">
                <label for="cost" class="form-label fw-bold">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost" placeholder="Insert value es. 21"
                    value="{{ old('cost', $item->cost) }}">
            </div>

            <label for="coin"  class="form-label fw-bold">Coin</label>
            <select class="form-select mb-3" aria-label="Default select example" name="coin" id="coin">
                <option value="cp">cp</option>
                <option value="sp">sp</option>
                <option selected value="gp">gp</option>
            </select>
            
            <label for="damage_dice"  class="form-label fw-bold">Damage Dice </label>
            <select class="form-select mb-3" aria-label="Default select example" name="damage_dice" id="damage_dice">
                <option value="0">0</option> 
                <option value="1">1</option>     
                <option value="1d4">1d4</option> 
                <option value="1d6">1d6 </option>
                <option value="1d8">1d8</option>
                <option value="1d10">1d10</option>
                <option value="1d12">1d12</option>
                <option value="2d6">2d6</option>
            </select>

            <button class="btn btn-primary">Edit</button>
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