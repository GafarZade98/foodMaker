<?php

namespace App\Http\Controllers;

use Illuminate\{Database\Eloquent\Builder, Http\Request};
use App\Models\{Ingredient, Meal};

class WebController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ingredients = $request->get('ingredient', [null]);

        $meal = Meal::whereHas('ingredients', function (Builder $query) use ($ingredients) {
            $query->where('id', $ingredients);
        })->get();

        return view('welcome')->with([
            'ingredients' => Ingredient::query()
                ->when($search, fn($query) => $query->where('name', 'like', "%$search%"))->get(),
            'meals' => $meal
        ]);
    }

    public function meals(Request $request)
    {
        $search = $request->get('search');

        return view('meals')->with([
            'meals' => Meal::query()
                ->when($search, fn($query) => $query->where('name', 'like', "%$search%"))->paginate(4)
        ]);
    }
}
