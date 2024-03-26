<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function save(Request $request) {
        $result = new Recipe();
        $result->title = $request->title;
        $result->ingredients = $request->ingredients;
        $result->description = $request->description;
        $result->steps = $request->steps;
        $result->user_id = auth()->user()->id;
        $result->save();

        return redirect('/')->with('success', 'New Recipe Added');
    }

    public function updateRecipe(Request $request) {
        $result = Recipe::find($request->id);
        if (!$result) redirect('/')->with('error', 'Resep tidak ditemukan');

        $result->title = $request->title;
        $result->ingredients = $request->ingredients;
        $result->description = $request->description;
        $result->steps = $request->steps;
        $result->save();

        return redirect('/')->with('success', 'Berhasil Meninjau Resep');
    }

    public function getOne($id) {
        $result = Recipe::findOrFail($id);
        $user = User::findOrFail($result['user_id']);
        $result['user'] = $user['name'];

        return view('recipe', ['data' => $result]);
    }

    public function getReport() {
        $id = auth()->user()->id;
        $result = Recipe::where('user_id', $id)->get();

        return view('recipeReport', ['data' => $result]);
    }

    public function update($id) {
        $recipe = Recipe::findOrFail($id);

        return view('updateRecipe', ['data' => $recipe]);
    }

    public function delete($id) {
        $recipe = Recipe::find($id);

        if ($recipe) {
            $recipe->delete();
            return redirect('/')->with('success', 'Resep berhasil dihapus');
        } else {
            return redirect('/')->with('error', 'Resep tidak ditemukan');
        }
    }
}
