<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Foods;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class foodsController extends Controller
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
            $foods = Foods::latest()->get();
            return view('backend.aboutFood.foods', compact('foods'));
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
            'foodsTitle' => 'required',
            'foodsImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
            'foodsDescription' => 'required',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->foodsImage, "1200", "800", "foods");
            $foods = new Foods();
            $foods->title = $request->foodsTitle;
            $foods->image = 'foods/' . $fileName;
            $foods->description = $request->foodsDescription;
            $foods->save();

            Toastr::success('Foods Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Foods $foods
     * @return \Illuminate\Http\Response
     */
    public function show(Foods $foods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Foods $foods
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $foods = Foods::findOrFail($id);
            return response()->json(['row_data' => $foods], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Foods $foods
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            if ($request->old_image === 'change') {
                $fileName = 'foods/' . imageUploadWithCustomSize($request->editFoodsImage, "1200", "800", "foods");
                Storage::delete('public/' . Foods::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $foods = Foods::findOrFail($request->old_id);

            $foods->title = $request->editFoodsTitle;
            $foods->image = $fileName;
            $foods->description = $request->editFoodsDescription;
            $foods->status = $request->row_status;
            $foods->update();

            Toastr::success('Foods Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Foods $foods
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Foods::findOrFail($id)->image);
            Foods::Find($id)->delete();
            Toastr::success('Foods Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
