<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SuccessStories;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class successStoriesController extends Controller
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
            $successStories = SuccessStories::latest()->get();
            return view('backend.successStories.successStories', compact('successStories'));
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
            'successStoriesDescription' => 'required',
            'successStoriesImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
            'successStoriesTitle' => 'required',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->successStoriesImage, "1200", "800", "successStories");
            $successStories = new SuccessStories();
            $successStories->title = $request->successStoriesTitle;
            $successStories->image = 'successStories/' . $fileName;
            $successStories->description = $request->successStoriesDescription;
            $successStories->save();

            Toastr::success('A Success Stories Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SuccessStories $successStories
     * @return \Illuminate\Http\Response
     */
    public function show(SuccessStories $successStories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SuccessStories $successStories
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $successStories = SuccessStories::findOrFail($id);
            return response()->json(['row_data' => $successStories], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SuccessStories $successStories
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);


        try {
            if ($request->old_image === 'change') {
                $fileName = 'successStories/' . imageUploadWithCustomSize($request->editSuccessStoriesImage, "1200", "800", "successStories");
                Storage::delete('public/' . SuccessStories::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $foods = SuccessStories::findOrFail($request->old_id);

            $foods->title = $request->editSuccessStoriesTitle;
            $foods->image = $fileName;
            $foods->description = $request->editSuccessStoriesDescription;
            $foods->status = $request->row_status;
            $foods->update();

            Toastr::success('Story Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SuccessStories $successStories
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . SuccessStories::findOrFail($id)->image);
            SuccessStories::Find($id)->delete();
            Toastr::success('Story Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
