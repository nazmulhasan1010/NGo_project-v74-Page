<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FoodValue;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class foodValueController extends Controller
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
        try{
            $foodValue = FoodValue::latest()->get();
            return view('backend.aboutFood.foodValue',compact('foodValue'));
        }
        catch (\Exception $e) {
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foodValueTitle' => 'required',
            'foodValueDescription' => 'required',
        ]);

        try{
            $foodValue    = new FoodValue();
            $foodValue->title = $request->foodValueTitle;
            $foodValue->description = $request->foodValueDescription;
            $foodValue->save();

            Toastr::success('A New FoodValue Successfully Added');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodValue  $foodValue
     * @return \Illuminate\Http\Response
     */
    public function show(FoodValue $foodValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodValue  $foodValue
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(FoodValue $foodValue)
    {
        return response()->json(['row_data' => $foodValue],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodValue  $foodValue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request,[
            'old_id' => 'required',
        ]);

        try {

            if ($request->editFoodValueDescription === null) {
                $foodValueDes = $request->old_food_value;
            } else {
                $foodValueDes = $request->editFoodValueDescription;
            }
            $foodValue = FoodValue::findOrFail($request->old_id);

            $foodValue->title = $request->editFoodValueTitle;
            $foodValue->description = $foodValueDes;
            $foodValue->status = $request->row_status;
            $foodValue->update();

            Toastr::success('FoodValue Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodValue  $foodValue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FoodValue $foodValue)
    {
        try{
            $foodValue->delete();
            Toastr::success('FoodValue Successfully Deleted');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
