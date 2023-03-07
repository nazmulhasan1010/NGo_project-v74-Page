<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
//        return $request->all();
        $product_id = random_int(100000, 999999);
        $this->validate($request, [
            'productTitle' => 'required',
            'productTitle_bn' => 'required',
            'productDes' => 'required',
            'productDes_bn' => 'required',
            'productCategory' => 'required',
            'stock' => 'required',
            'productPrice' => 'required',
            'ownerCompanyLogo' => 'image|mimes:jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);

        if($request->productImage) {
            if (count($request->productImage) > 1) {
                $allImage = array();
                foreach ($request->productImage as $image) {
                    $fileName = imageUploadWithCustomSize($image, "400", "400", "product");

                    $new_data = array('product_id' => $product_id, 'image' => 'product/' . $fileName);
                    $allImage[] = $new_data;
                }
                ProductImage::insert($allImage);
            } else {
                $fileName = imageUploadWithCustomSize($request->productImage[0], "400", "400", "product");
                $productImage = new ProductImage();
                $productImage->product_id = $product_id;
                $productImage->image = 'product/' . $fileName;
                $productImage->save();
            }
        }

        try {
            $product = new Product();
            $product->product_id = $product_id;
            $product->title = $request->productTitle;
            $product->title_bn = $request->productTitle_bn;
            $product->description = $request->productDes;
            $product->description_bn = $request->productDes_bn;
            $product->category = $request->productCategory;
            $product->stock = $request->stock;
            $product->return = $request->returnDays;
            $product->warranty = $request->warranty;
            $product->additional_info = $request->additionalInfo;
            $product->owner = $request->productOwner;
            $product->price = $request->productPrice;
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
     * @param Product $category
     * @return void
     */
    public function show(Product $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
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
     * @param Request $request
     * @param $cat
     * @return RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'row_id' => 'required',
        ]);
        try {
            $product = Product::findOrFail($request->row_id);
            $product->title = $request->editProductTitle;
            $product->title_bn = $request->editProductTitle_bn;
            if ($request->editProductDes !== null) {
                $product->description = $request->editProductDes;
            }
            if ($request->editProductDes_bn !== null) {
                $product->description_bn = $request->editProductDes_bn;
            }
            $product->category = $request->editProductCategory;
            $product->stock = $request->editStock;
            $product->return = $request->editReturnDays;
            $product->warranty = $request->editWarranty;
            $product->additional_info = $request->editAdditionalInfo;
            $product->owner = $request->editProductOwner;
            $product->price = $request->editProductPrice;
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
     * @param Product $category
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $product_id = Product::where('id', '=', $id)->get()[0]->product_id;
            $images = ProductImage::where('product_id', '=', $product_id)->get();
            foreach ($images as $image) {
                Storage::delete('public/' . $image->image);
            }
            Product::Find($id)->delete();
            ProductImage::where('product_id', '=', $product_id)->delete();
            Toastr::success('Product Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

}
