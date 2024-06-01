@extends('layouts.app')

@section('title', 'Items')

@section('main-content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Items!</h1>
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
                @foreach ($items as $item)                
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->weight}}</td>
                        <td>{{$item->cost}}</td>
                        <td class="text-center">{{$item->damage_dice}}</td>
                        <td><img src="{{Vite::asset("resources/img/$item->image.png")}}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection