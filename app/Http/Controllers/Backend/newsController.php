<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class newsController extends Controller
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
            $news = News::latest()->get();
            return view('backend.newsBlog.news',compact('news'));
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
        $this->validate($request, [
            'newsTitle' => 'required',
            'newsImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->newsImage, "1200", "800", "news");
            $news = new News();
            $news->title = $request->newsTitle;
            $news->title_bn = $request->newsTitle_bn;
            $news->description = $request->newsDescription;
            $news->description_bn = $request->newsDescription_bn;
            $news->image = 'news/' . $fileName;
            $news->save();

            Toastr::success('News Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $news = News::findOrFail($id);
            return response()->json(['row_data' => $news], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            if ($request->old_image === 'change') {
                $fileName = 'news/' . imageUploadWithCustomSize($request->editNewsImage, "1200", "800", "news");
                Storage::delete('public/' . News::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }

            $news = News::findOrFail($request->old_id);

            $news->title = $request->editNewsTitle;
            $news->title_bn = $request->editNewsTitle_bn;
            $news->description = $request->editNewsDescription;
            $news->description_bn = $request->editNewsDescription_bn;
            $news->image = $fileName;
            $news->status = $request->row_status;
            $news->update();


            Toastr::success('News Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . News::findOrFail($id)->image);
            News::Find($id)->delete();
            Toastr::success('News Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
