<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FoodDemand;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class foodDemandController extends Controller
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
            $foodDemand = FoodDemand::latest()->get();
            return view('backend.aboutFood.demand', compact('foodDemand'));
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
            'foodDemandTitle' => 'required',
            'foodDemandDescription' => 'required',
        ]);

        try {
            $foodDemand = new FoodDemand();
            $foodDemand->title = $request->foodDemandTitle;
            $foodDemand->description = $request->foodDemandDescription;
            $foodDemand->save();

            Toastr::success('Food Demand Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FoodDemand $foodDemand
     * @return \Illuminate\Http\Response
     */
    public function show(FoodDemand $foodDemand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FoodDemand $foodDemand
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(FoodDemand $foodDemand)
    {
        return response()->json(['row_data' => $foodDemand], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodDemand $foodDemand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);


        try {
            $foodDemand = FoodDemand::findOrFail($request->old_id);
            $foodDemand->title = $request->editFoodDemandTitle;
            $foodDemand->description = $request->editFoodDemandDescription;
            $foodDemand->status = $request->row_status;
            $foodDemand->update();

            Toastr::success('FoodDemand Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FoodDemand $foodDemand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FoodDemand $foodDemand)
    {
        try {
            $foodDemand->delete();
            Toastr::success('FoodDemand Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
