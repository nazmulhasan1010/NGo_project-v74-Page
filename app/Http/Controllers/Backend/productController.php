<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
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

        if (count($request->productImage) > 1) {
            $allImage = array();
            foreach ($request->productImage as $image) {
                $fileName = imageUploadWithCustomSize($image, "400", "400", "product");

                $new_data = array('product_id' => $product_id, 'image' => 'product/' . $fileName);
                array_push($allImage, $new_data);
            }
            ProductImage::insert($allImage);
        } else {
            $fileName = imageUploadWithCustomSize($request->productImage[0], "400", "400", "product");
            $productImage = new ProductImage();
            $productImage->product_id = $product_id;
            $productImage->image = 'product/' . $fileName;
            $productImage->save();
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
            $product->owner_company = $request->ownerCompany;
            $product->owner_name = $request->ownerName;
            if (isset($request->ownerCompanyLogo)) {
                $logoFileName = imageUploadWithCustomSize($request->ownerCompanyLogo, "400", "400", "ownerCompanyLogo");
                $product->owner_company_logo = 'ownerCompanyLogo/' . $logoFileName;
            }
            $product->owner_email = $request->ownerMail;
            $product->owner_contact = $request->ownerContact;
            $product->owner_address = $request->ownerAddress;
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
            $product->owner_company = $request->editOwnerCompany;
            $product->owner_name = $request->editOwnerName;
            if (isset($request->editOwnerCompanyLogo)) {
                $logoFileName = imageUploadWithCustomSize($request->editOwnerCompanyLogo, "400", "400", "ownerCompanyLogo");
                $product->owner_company_logo = 'ownerCompanyLogo/' . $logoFileName;
                Storage::delete('public/' . Product::findOrFail($request->row_id)->owner_company_logo);
            }
            $product->owner_email = $request->editOwnerMail;
            $product->owner_contact = $request->editOwnerContact;
            $product->owner_address = $request->editOwnerAddress;
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
     * @param \App\Models\Product $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $product_id = Product::where('id', '=', $id)->get()[0]->product_id;
            $images = ProductImage::where('product_id', '=', $product_id)->get();
            foreach ($images as $image) {
                Storage::delete('public/' . $image->image);
            }
            Storage::delete('public/' . Product::findOrFail($id)->owner_company_logo);
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
