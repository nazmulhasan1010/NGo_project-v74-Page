<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Category;
use Illuminate\Http\Request;

class videoGalleryController extends Controller
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
            $videos = VideoGallery::latest()->get();
            return view('backend.gallery.videoGallery', compact('videos'));
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
            'videoTitle' => 'required',
            'videoLink' => 'required|regex:??',
        ]);

        try {
            if (preg_match('/(youtube.com|youtu.be)\/(embed)?(\?v=)?(\S+)?/', $request->videoLink)) {
                $videoGallery = new VideoGallery();
                $videoGallery->title = $request->videoTitle;
                $videoGallery->link = $request->videoLink;
                $videoGallery->save();

                Toastr::success('Video Successfully Added');
                return redirect()->back();
            } else {
                Toastr::error('Please enter a valid link');
                return redirect()->back();
            }

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
            $videoGallery = VideoGallery::findOrFail($id);
            return response()->json(['row_data' => $videoGallery], 200);
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
            if ($request->videoEditLink != '') {
                $link = $request->videoEditLink;
            } else {
                $link = $request->old_video;
            }
            if (preg_match('/(youtube.com|youtu.be)\/(embed)?(\?v=)?(\S+)?/', $link)) {
                $videoGallery = VideoGallery::findOrFail($request->old_id);
                $videoGallery->title = $request->editVideoTitle;
                $videoGallery->link = $link;
                $videoGallery->status = $request->row_status;
                $videoGallery->update();

                Toastr::success('Video Successfully Update');
                return redirect()->back();

            } else {
                Toastr::error('Please enter a valid link');
                return redirect()->back();
            }

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
            VideoGallery::Find($id)->delete();
            Toastr::success('Video Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
