<?php

namespace App\Http\Controllers;

use App\Models\{Ingredient, Meal};
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->get('id');
        $search = $request->get('search');
        $meal = Meal::whereHas('ingredients', function ($q) use ($input) {
            $q->where('id', $input );
        })->get();
//        dd($meal);
        return view('welcome')->with([
            'ingredients' => Ingredient::query()
                ->when($search, fn($query) => $query->where('name', 'like', "%$search%"))->paginate(10),
            'meals' => $meal
        ]);
    }

    public function cook(Request $request)
    {
        $input = $request->all();
        dd($input);
        return response()->json(['success' => 'lffkld']);
    }
}
