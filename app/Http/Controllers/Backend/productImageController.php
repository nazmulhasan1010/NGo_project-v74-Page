<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productImageController extends Controller
{
    function getProductImage(Request $request)
    {
        $product_id = $request->input('product_id');
        return getProductImage($product_id);
    }
     function deleteImage(Request $request){
        $id = $request->input('image_id');
         Storage::delete('public/' . ProductImage::Find($id)->image);
         ProductImage::Find($id)->delete();
         return 1;
     }

     //product image add
      function productImageAdd(Request $request){
          $product_id = $request->product_id;
          if (count($request->productImageAdd) > 1) {
              $allImage = array();
              foreach ($request->productImageAdd as $image) {
                  $fileName = imageUploadWithCustomSize($image, "400", "400", "product");

                  $new_data = array('product_id' => $product_id, 'image' => 'product/' . $fileName);
                  array_push($allImage, $new_data);
              }
              ProductImage::insert($allImage);
          } else {
              $fileName = imageUploadWithCustomSize($request->productImageAdd[0], "400", "400", "product");
              $productImage = new ProductImage();
              $productImage->product_id = $product_id;
              $productImage->image = 'product/' . $fileName;
              $productImage->save();
          }
          Toastr::success('Images Successfully Added');
          return redirect()->back();
      }
}
