<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class partnerController extends Controller
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
            $partners = Partner::latest()->get();
            return view('backend.partner.partner', compact('partners'));
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
            'companyName' => 'required',
            'companyLogo' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->companyLogo, "1200", "800", "partners");

            $partner = new Partner();
            $partner->companyName = $request->companyName;
            $partner->companyLogo = 'partners/' . $fileName;
            $partner->website = $request->companyWebsite;
            $partner->save();

            Toastr::success('Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $partners = Partner::findOrFail($id);
            return response()->json(['row_data' => $partners], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);
        // return $request->all();

        try {
            if ($request->old_image === 'change') {
                $fileName = 'partners/' . imageUploadWithCustomSize($request->editCompanyLogo, "1200", "800", "partners");
                Storage::delete('public/' . Partner::findOrFail($request->old_id)->companyLogo);
            } else {
                $fileName = $request->old_image;
            }
            $partners = Partner::findOrFail($request->old_id);

            $partners->companyName = $request->companyNameEdit;
            $partners->companyLogo = $fileName;
            $partners->status = $request->row_status;
            $partners->website = $request->editCompanyWebsite;
            $partners->update();

            Toastr::success('Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Partner::findOrFail($id)->companyLogo);
            Partner::Find($id)->delete();
            Toastr::success('Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
