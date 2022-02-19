<?php

namespace App\Http\Controllers;

use App\Models\{Ingredient, IngredientMeal, Meal};
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


         $ingredients = new IngredientMeal();
         $meals_id = $ingredients->select('meal_id')->whereIn('ingredient_id',$request->data)->get();
      //   $meals_id = $ingredients->select('meal_id')->whereIn('ingredient_id',[2,3])->get();

         $arr = [];
         foreach ($meals_id as $key => $id){
             $arr[] = $id->meal_id;
         }
          $meals = Meal::whereIn('id',$arr)->get();
        return $response = [
            'status'=>'success',
            'data' => $meals
        ];
    }
}
