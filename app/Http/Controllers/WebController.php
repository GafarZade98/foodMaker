<?php

namespace App\Http\Controllers;

use App\Models\{Ingredient, Meal};
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        return view('welcome')->with([
            'ingredients' => Ingredient::query()
                 ->when($search, fn ($query) => $query->where('name', 'like', "%$search%"))->paginate(10),
            'meals' => Meal::get()
        ]);
    }

    public function meals(Request $request){
        return view("welcome");
    }
}
