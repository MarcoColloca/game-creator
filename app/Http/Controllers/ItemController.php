<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item()
    {

        $items = Item::all();

        return view('items', compact('items'));
    }
}
