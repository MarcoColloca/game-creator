@extends('layouts.app')

@section('title', 'Types')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4 text-center">
        <h1 class="title  text-success">Classes!</h1>
        <a href="{{ route('admin.types.create') }}" class="btn btn-success mt-3">Create your class</a>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <div class="type-table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-center" scope="col"></th>
                        <th class="text-center" scope="col"></th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)                
                        <tr class="position-relative">
                            <td>{{$type->name}}</td>
                            <td class="text-center">
                                <a class="btn link-success" href="{{ route('admin.types.show', $type) }}">Show</a>
                            </td>
                            <td class="text-center">
                                <a class="btn link-primary" href="{{ route('admin.types.edit', $type) }}">Edit</a>
                            </td>
                            <td class="text-center">
                                <form class="item-delete-form" action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
    
                                    <button class="btn link-danger">X</button>
    
                                    <div class="my-modal">
                                        <div class="my-modal__box">
                                            <h6 class="text-center me-5">Do you really want to delete this type?!</h6>
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
    </div>
</section>
@endsection