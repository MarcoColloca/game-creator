<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("items.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|max:50",
            "description" => "nullable|max:2000",
            "category"=> "required|max:50",
            "weight"=> "required|numeric",
            "cost"=> "required|integer|numeric",
            "coin"=> "required|string|max:20",
            "damage_dice" => "required|string|max:10"
        ]);
        
        $form_data = $request->all();
        
        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;
        
        do{

            $find = Item::where('slug', $slug)->first(); // null | Item

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' .$n;
            }

        }while($find !== null);



        $form_data['slug'] = $slug;
        $form_data['type'] = 'Weapons';
        $form_data['unit'] = 'lb';
        $form_data['image'] = strtolower(str_replace(' ', '-', $form_data['category']));


        $new_item = Item::create($form_data);

        dump($form_data);

        return to_route('items.show', $new_item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view("items.show", compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view("items.edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            "name" => "required|max:50",
            "description" => "nullable|max:2000",
            "slug" => ['required', 'max:255', Rule::unique('items','slug')->ignore($item->id)],
            "category"=> "required|max:50",
            "weight"=> "required|numeric",
            "cost"=> "required|integer|numeric",
            "coin"=> "required|string|max:20",
            "damage_dice" => "required|string|max:10"
        ]);
        
        $form_data = $request->all();
        

        $form_data['type'] = 'Weapons';
        $form_data['unit'] = 'lb';
        $form_data['image'] = strtolower(str_replace(' ', '-', $form_data['category']));


       


       // dd($form_data);

        $item->update($form_data);

        return to_route('items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return to_route("items.index");
    }
}
