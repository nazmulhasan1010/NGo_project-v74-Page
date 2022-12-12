<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imageGalleryController extends Controller
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
            $imgGallery = ImageGallery::latest()->get();
            return view('backend.gallery.imageGallery', compact('imgGallery'));
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
            'imgTitle' => 'required',
            'albumImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->albumImage, "1200", "800", "album");
            $albumImage = new ImageGallery();
            $albumImage->title = $request->imgTitle;
            $albumImage->title_bn = $request->imgTitle_bn;
            $albumImage->image = 'album/' . $fileName;
            $albumImage->save();

            Toastr::success('Image Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $imageGallery = ImageGallery::findOrFail($id);
            return response()->json(['row_data' => $imageGallery], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);
        try {
            if ($request->old_image === 'change') {
                $fileName = 'album/' . imageUploadWithCustomSize($request->editImage, "1200", "800", "album");
                Storage::delete('public/' . ImageGallery::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $imageGallery = ImageGallery::findOrFail($request->old_id);
            $imageGallery->title = $request->editAlbumTitle;
            $imageGallery->title_bn = $request->editAlbumTitle_bn;
            $imageGallery->image = $fileName;
            $imageGallery->status = $request->row_status;
            $imageGallery->update();

            Toastr::success('Album Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . ImageGallery::findOrFail($id)->image);
            ImageGallery::Find($id)->delete();
            Toastr::success('Image Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
