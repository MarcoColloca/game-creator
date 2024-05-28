<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function weapon()
    {

        $weapons = Weapon::all();

        return view('weapon', compact('weapons'));
    }
}
