<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
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
            $products = Product::latest()->get();
            return view('backend.products.products', compact('products'));
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
            'productTitle' => 'required',
            'productImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->productImage, "1200", "800", "product");
            $product = new Product();
            $product->title = $request->productTitle;
            $product->description = $request->productDescription;
            $product->image = 'product/' . $fileName;
            $product->save();

            Toastr::success('Product Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $category
     * @return \Illuminate\Http\Response
     */
    public function show(Product $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json(['row_data' => $product], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            if ($request->old_image === 'change') {
                $fileName = 'product/' . imageUploadWithCustomSize($request->editProductImage, "1200", "800", "product");
                Storage::delete('public/' . Product::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }

            $product = Product::findOrFail($request->old_id);

            $product->title = $request->editProductTitle;
            $product->description = $request->editProductDescription;
            $product->image = $fileName;
            $product->status = $request->row_status;
            $product->update();


            Toastr::success('Product Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Product::findOrFail($id)->image);
            Product::Find($id)->delete();
            Toastr::success('Product Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
