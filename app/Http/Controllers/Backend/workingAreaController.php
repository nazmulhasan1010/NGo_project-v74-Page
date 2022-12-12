<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Workingarea;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class workingAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        try {
            $areas = Workingarea::latest()->get();
            return view('backend.about.workingArea', compact('areas'));
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
            'areaTitle' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->image, "1200", "800", "workingArea");
            $workingArea = new Workingarea();
            $workingArea->area = $request->areaTitle;
            $workingArea->area_bn = $request->areaTitle_bn;
            $workingArea->description = $request->description;
            $workingArea->description_bn = $request->description_bn;
            $workingArea->image = 'workingArea/' . $fileName;
            $workingArea->save();

            Toastr::success('Working Area Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SubCategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SubCategory $subcategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $about = Workingarea::findOrFail($id);
            return response()->json(['row_data' => $about], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubCategory $subcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            if ($request->old_image === 'change') {
                $fileName = 'workingArea/' . imageUploadWithCustomSize($request->editImage, "1200", "800", "workingArea");
                Storage::delete('public/' . Workingarea::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $workingArea = Workingarea::findOrFail($request->old_id);
            $workingArea->area = $request->editAreaTitle;
            $workingArea->area_bn = $request->editAreaTitle_bn;
            $workingArea->description = $request->editAreaDescription;
            $workingArea->description_bn = $request->editAreaDescription_bn;
            $workingArea->image = $fileName;
            $workingArea->status = $request->row_status;
            $workingArea->update();

            Toastr::success('Working Area Updated Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SubCategory $subcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Workingarea::findOrFail($id)->image);
            Workingarea::findOrFail($id)->delete();
            Toastr::success('Working area Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
