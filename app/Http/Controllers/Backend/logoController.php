<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Logo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class logoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index()
    {
        try {
            $logo = Logo::latest()->get();
            return view('backend.logo.logo', compact('logo'));
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
        $this->validate($request, [
            'logoStatus' => 'required',
            'logoImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);
        try {
            $imageName = time() . '.' . $request->logoImage->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('logo')) {
                Storage::disk('public')->makeDirectory('logo');
            }
            $img = Image::make($request->logoImage)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();
            Storage::disk('public')->put('logo' . '/' . $imageName, $img);


            $logo = new Logo();
            $logo->image = 'logo/' . $imageName;
            $logo->logo_status = $request->logoStatus;
            $logo->save();

            Toastr::success('Logo Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Logo $logo
     * @return void
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Logo $logo
     * @return JsonResponse
     */
    public function edit(Logo $logo)
    {
        return response()->json(['row_data' => $logo], 200);
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
            'old_id' => 'required',
        ]);

        try {
            if ($request->old_image === 'change') {
                $imageName = time() . '.' . $request->editLogo->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('logo')) {
                    Storage::disk('public')->makeDirectory('logo');
                }
                $img = Image::make($request->editLogo)->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();
                Storage::disk('public')->put('logo' . '/' . $imageName, $img);
                Storage::delete('public/' . Logo::findOrFail($request->old_id)->image);
                $fileName = 'logo/'.$imageName;
            } else {
                $fileName = $request->old_image;
            }
            $logo = Logo::findOrFail($request->old_id);
            $logo->image = $fileName;
            $logo->logo_status = $request->editLogoStatus;
            $logo->status = $request->row_status;
            $logo->update();

            Toastr::success('Logo Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Logo::findOrFail($id)->image);
            Logo::Find($id)->delete();
            Toastr::success('Logo Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
