<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\ProductCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       $category = ProductCategory::get();
       return view('backend.products.productCategory',compact('category'));
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
        try {
            $fileName = imageUploadWithCustomSize($request->productCategoryImage, "1200", "800", "categories");
            $category = new ProductCategory();
            $category->title = $request->categoryTitle;
            $category->title_bn = $request->categoryTitle_bn;
            $category->image = 'categories/'.$fileName;
            $category->save();

            Toastr::success('Category Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $category = ProductCategory::findOrFail($id);
            return response()->json(['row_data' => $category], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);
        try {
            if ($request->old_image === 'change') {
                $fileName = 'categories/' . imageUploadWithCustomSize($request->editCategoryImage, "1200", "800", "categories");
                Storage::delete('public/' . ProductCategory::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $category = ProductCategory::findOrFail($request->old_id);

            $category->title = $request->categoryTitleEdit;
            $category->title_bn = $request->categoryTitle_bnEdit;
            $category->image = $fileName;
            $category->status = $request->row_status;
            $category->update();

            Toastr::success('Category Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . ProductCategory::findOrFail($id)->image);
            ProductCategory::Find($id)->delete();
            Toastr::success('Category deleted successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
