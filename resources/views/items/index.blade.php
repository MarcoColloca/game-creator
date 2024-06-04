@extends('layouts.app')

@section('title', 'Items')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-success">Items!</h1>
        <a href="{{ route('items.create') }}" class="btn btn-success mt-3">Create your Item</a>

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
                    <tr class="position-relative">
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->weight . ' ' . $item->unit}}.</td>
                        <td>{{$item->cost . ' ' . $item->coin}}</td>
                        <td class="text-center">{{$item->damage_dice}}</td>
                        <td><img src="{{Vite::asset("resources/img/$item->image.png")}}" alt=""></td>
                        <td class="text-center">
                            <a class="btn link-success" href="{{ route('items.show', $item) }}">Show</a>
                        </td>
                        <td class="text-center">
                            <a class="btn link-primary" href="{{ route('items.edit', $item) }}">Edit</a>
                        </td>
                        <td class="text-center">
                            <form class="item-delete-form" action="{{ route('items.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn link-danger">X</button>

                                <div class="my-modal">
                                    <div class="my-modal__box">
                                        <h5 class="text-center me-5">Do you really want to delete this Character?!</h5>
                                        <span class="link link-danger my-modal-yes mx-5">Yes</span>
                                        <span class="link link-success my-modal-no">No</span>
                                    </div>
                                </div>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection