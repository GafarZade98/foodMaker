<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Http\Requests\MealRequest;
use Illuminate\{Database\Eloquent\Builder, Http\Request, Support\Facades\Hash};
use App\Models\{Ingredient, Meal, User};

class WebController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ingredients = $request->get('ingredient', [null]);
        $meals = collect([]);

        sort($ingredients);

        foreach (Meal::get() as $meal) {
            $mealIngredients = $meal->ingredients->pluck('id')->toArray();
            sort($mealIngredients);

            if (!array_diff($mealIngredients, $ingredients)) {
                $meals = $meals->push($meal);
            }
        }

        return view('welcome')->with([
            'ingredients' => Ingredient::query()
                ->when($search, fn($query) => $query->where('name', 'like', "%$search%"))->paginate(10),
            'meals' => $meals
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

    public function createIngredient(IngredientRequest $request)
    {
        $validated = $request->validated();
        if ($request->file('photo')) {

            $photo = $request->file('photo');

            $validated['photo'] = $photo->storeAs('ingredients/February2022', $photo->hashName());
        }
        Ingredient::create($validated);

        return redirect()->route('homepage')->with(200);
    }

    public function createMeal(MealRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('photo')) {

            $photo = $request->file('photo');

            $validated['photo'] = $photo->storeAs('ingredients/February2022', $photo->hashName());
        }

        $meal = Meal::create($validated);
        $meal->ingredients()->attach($request->input('ingredients'));

        return redirect()->route('homepage')->with(200);
    }
}
