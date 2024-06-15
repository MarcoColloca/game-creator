@extends('layouts.app')

@section('title', 'Character')

@section('content')
<section class="mt-5 py-1">
    <div class="container bg-dark py-4">
        <h1 class="title text-center text-coral">Create your Character!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="bg-light container py-4">
        <form action="{{ route('admin.characters.store') }}" method="POST">
            @csrf
            <!-- Charcater Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert your name's character"
                    value="{{ old('name') }}">
            </div>
            
            <!-- Character Class -->
            <div class="form-group mb-3">
                <label class="form-label fw-bold" for="type_id">Character Class</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">-- Select your Class --</option>
                    @foreach ($types as $type)                        
                        <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Charcater Attack -->
            <div class="mb-3">
                <label for="attack" class="form-label fw-bold">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" placeholder="Insert value"
                    value="{{ old('attack') }}">
            </div>

            <!-- Charcater Defence -->
            <div class="mb-3">
                <label for="defence" class="form-label fw-bold">Defence</label>
                <input type="number" class="form-control" id="defence" name="defence" placeholder="Insert value"
                    value="{{ old('defence') }}">
            </div>

            <!-- Charcater Life -->
            <div class="mb-3">
                <label for="life" class="form-label fw-bold">Life</label>
                <input type="number" class="form-control" id="life" name="life" placeholder="Insert value"
                    value="{{ old('life') }}">
            </div>

            <!-- Charcater Speed -->
            <div class="mb-3">
                <label for="speed" class="form-label fw-bold">Speed</label>
                <input type="number" class="form-control" id="speed" name="speed" placeholder="Insert value"
                    value="{{ old('speed') }}">
            </div>

            <!-- Charcater Description -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Describe your character">{{ old('description') }}</textarea>
            </div>

            <!-- Charcater Inventory -->
            <div class="form-group mb-3 ">
                <label class="form-label fw-bold" for="item_id">Select your Items</label>

                <div class="d-flex gap-2 my-form-container">


                    <cart
                     :items="{{ $items }}"
                    ></cart>

                    {{--
                    @foreach ($items as $item)                        
                        <div class="form-check">
                            <input @checked(in_array($item->id, old('items', []))) name="items[]" class="form-check-input"
                                type="checkbox" value="{{$item->id}}" id="item-{{$item->id}}">
                            <label class="form-check-label" for="item-{{$item->id}}">
                                {{$item->name}}
                            </label>
                        </div>

                        <!-- <div class="mb-3">
                                <label for="qty" class="form-label fw-bold">Qty</label>
                                <input type="number" class="form-control" id="qty" name="qty[]"
                                    placeholder="Insert qty" value="{{ old('qty') }}">
                            </div> -->
                        <!-- <form class="form-group mb-3">
                            <label class="form-label fw-bold" for="item_id">item of Project</label>
                            <select class="form-control" name="item_id" id="item_id">
                                <option value="">-- Seleziona Item --</option>
                                @foreach ($items as $item)                                
                                    <option @selected($item->id == old('item_id')) value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                            <button>Add</button>
                        </form> -->
                    @endforeach 
                    --}}
                    
                </div>
            </div>


            <!-- Form Submit -->
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