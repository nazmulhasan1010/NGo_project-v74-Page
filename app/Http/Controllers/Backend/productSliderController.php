<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductSlider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $slider = ProductSlider::get();
        return view('backend.products.slider', compact('slider'));
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
        try {
            $fileName = imageUploadWithCustomSize($request->productSliderImage, "1200", "700", "product_slider");
            $slider = new ProductSlider();
            $slider->title = $request->sliderTitle;
            $slider->title_bn = $request->sliderTitle_bn;
            $slider->description = $request->sliderDescription;
            $slider->description_bn = $request->sliderDescription_bn;
            $slider->image = 'product_slider/' . $fileName;
            $slider->save();

            Toastr::success('Slider Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $category = ProductSlider::findOrFail($id);
            return response()->json(['row_data' => $category], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);
        try {
            if ($request->old_image === 'change') {
                $fileName = 'product_slider/' . imageUploadWithCustomSize($request->editSliderImage, "1200", "800", "product_slider");
                Storage::delete('public/' . ProductSlider::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            $slider = ProductSlider::FindOrFail($request->old_id);
            $slider->title = $request->editSliderTitle;
            $slider->title_bn = $request->editSliderTitle_bn;
            $slider->description = $request->editSliderDescription;
            $slider->description_bn = $request->editSliderDescription_bn;
            $slider->image = $fileName;
            $slider->status = $request->row_status;
            $slider->update();
            Toastr::success('Slider Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . ProductSlider::findOrFail($id)->image);
            ProductSlider::Find($id)->delete();
            Toastr::success('Slider deleted successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
