@extends('layouts.app')

@section('title', 'Weapons')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Weapons!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Cost</th>
                    <th class="text-center" scope="col">Damage Dice</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weapons as $weapon)                
                    <tr>
                        <td>{{$weapon->name}}</td>
                        <td>{{$weapon->slug}}</td>
                        <td>{{$weapon->type}}</td>
                        <td>{{$weapon->category}}</td>
                        <td>{{$weapon->weight}}</td>
                        <td>{{$weapon->cost}}</td>
                        <td class="text-center">{{$weapon->damage_dice}}</td>
                        <td><img src="{{Vite::asset("resources/img/$weapon->image.png")}}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection