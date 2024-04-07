<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RecipeCreated;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recipes = Recipe::all();
        return response()->json($recipes, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $recipe = Recipe::create($request->all());
        $recipe = Recipe::find(3);
        // email to jawdropsmile@gmail.com
        Mail::to("jawdropsmile@gmail.com")->send(new RecipeCreated($recipe));

        return response()->json($recipe, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $recipe = Recipe::find($id);
        return response()->json($recipe, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $recipe = Recipe::find($id);
        return response()->json($recipe->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $recipe = Recipe::find($id);
        $recipe->delete();
        return response()->json(null, 204);
    }
}
