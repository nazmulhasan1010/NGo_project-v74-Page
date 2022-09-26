<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class recipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $recipe = Recipe::latest()->get();
            return view('backend.aboutFood.recipe', compact('recipe'));
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'recipeTitle' => 'required',
            'recipeImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->recipeImage, "1200", "800", "recipe");
            $recipe = new Recipe();
            $recipe->title = $request->recipeTitle;
            $recipe->image = 'recipe/' . $fileName;
            $recipe->ingredients = $request->recipeIngredients;
            $recipe->steps = $request->recipeCooking;
            $recipe->save();

            Toastr::success('Recipe Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Recipe $recipe)
    {
        return response()->json(['row_data' => $recipe], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);


        try {
            if ($request->old_image === 'change') {
                $fileName = 'recipe/' . imageUploadWithCustomSize($request->editRecipeImage, "1200", "800", "recipe");
                Storage::delete('public/' . Recipe::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            if ($request->editRecipeIngredients === null) {
                $ingredients = $request->old_RecipeIngredients;
            } else {
                $ingredients = $request->editRecipeIngredients;
            }
            if ($request->editRecipeCookingSteps === null) {
                $cokingSteps = $request->old_RecipeCookingSteps;
            } else {
                $cokingSteps = $request->editRecipeCookingSteps;
            }

            $recipe = Recipe::findOrFail($request->old_id);

            $recipe->title = $request->editRecipeTitle;
            $recipe->image = $fileName;
            $recipe->ingredients = $ingredients;
            $recipe->steps = $cokingSteps;
            $recipe->status =$request->row_status;
            $recipe->update();

            Toastr::success('Recipe Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Recipe::findOrFail($id)->image);
            Recipe::Find($id)->delete();
            Toastr::success('Recipe Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
