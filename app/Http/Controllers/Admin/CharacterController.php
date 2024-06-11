<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use App\Models\Item;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return view("admin.characters.index", compact("characters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $items = Item::orderBy('name', 'asc')->get();


        return view("admin.characters.create", compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        //dd($request->all());


        //VALIDATION SPOSTATA NELLO StoreCharacterRequest

        $form_data = $request->validated();



        
        $new_character = Character::create($form_data);


        if($request->has('items'))
        {
            //$project->items()->attach($form_data['items']);

            $new_character->items()->attach($request->items);

        }


        return to_route("admin.characters.show", $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {

        $character->load(['items']);
        return view("admin.characters.show", compact("character"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view("admin.characters.edit", compact("character"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        //VALIDATION SPOSTATA NELL'UpdateCharacterRequest

        $form_data = $request->validated();
        $character->fill($form_data);

        $character->save();
        return to_route("admin.characters.show", $character);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return to_route("admin.characters.index");
    }
}
