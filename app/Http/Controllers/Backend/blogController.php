<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class blogController extends Controller
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
            $blog = Blog::latest()->get();
            return view('backend.newsBlog.blog',compact('blog'));
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
            'blogTitle' => 'required',
            'blogImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->blogImage, "1200", "800", "blog");
            $blog = new Blog();
            $blog->title = $request->blogTitle;
            $blog->title_bn = $request->blogTitle_bn;
            $blog->description = $request->blogDescription;
            $blog->description_bn = $request->blogDescription_bn;
            $blog->image = 'blog/' . $fileName;
            $blog->save();

            Toastr::success('Blog Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            return response()->json(['row_data' => $blog], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);
        try {
            if ($request->old_image === 'change') {
                $fileName = 'blog/' . imageUploadWithCustomSize($request->editBlogImage, "1200", "800", "blog");
                Storage::delete('public/' . Blog::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $blog = Blog::findOrFail($request->old_id);
            $blog->title = $request->editBlogTitle;
            $blog->title_bn = $request->editBlogTitle_bn;
            $blog->description = $request->editBlogDescription;
            $blog->description_bn = $request->editBlogDescription_bn;
            $blog->image = $fileName;
            $blog->status = $request->row_status;
            $blog->update();


            Toastr::success('Blog Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Blog::findOrFail($id)->image);
            Blog::Find($id)->delete();
            Toastr::success('Blog Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
