<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Entrepreneurs;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class entrepreneursController extends Controller
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
            $beneficiary = Entrepreneurs::latest()->get();
            return view('backend.entrepreneurs.entrepreneurs', compact('beneficiary'));
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
            'ownerName' => 'required',
            'ownerContact' => 'required',
        ]);

        try {
            $entrepreneurs = new Entrepreneurs();
            $entrepreneurs->owner_company = $request->ownerCompany;
            $entrepreneurs->owner_name = $request->ownerName;
            if (isset($request->ownerCompanyLogo)) {
                $logoFileName = imageUploadWithCustomSize($request->ownerCompanyLogo, "400", "400", "ownerCompanyLogo");
                $entrepreneurs->owner_company_logo = 'ownerCompanyLogo/' . $logoFileName;
            }
            $entrepreneurs->owner_email = $request->ownerMail;
            $entrepreneurs->owner_contact = $request->ownerContact;
            $entrepreneurs->owner_address = $request->ownerAddress;
            if (isset($request->beneficiaryLocation)) {
                $match_ = '/<iframe\s*src="https:\/\/www\.google\.com\/maps\/embed\?[^"]+"*\s*[^>]+>*<\/iframe>/';
                if (preg_match($match_, $request->beneficiaryLocation)) {
                    $mapLink = $request->beneficiaryLocation;
                } else {
                    $mapLink = null;
                }
                $entrepreneurs->mapLink = $mapLink;
            }
            $entrepreneurs->save();

            Toastr::success('Entrepreneurs Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Entrepreneurs $beneficiary
     * @return \Illuminate\Http\Response
     */
    public
    function show(Entrepreneurs $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Entrepreneurs $beneficiary
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function edit($id)
    {
        try {
            $beneficiary = Entrepreneurs::findOrFail($id);
            return response()->json(['row_data' => $beneficiary], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entrepreneurs $beneficiary
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function update(Request $request, $cat)
    {
        $this->validate($request, [
            'row_id' => 'required',
        ]);

        try {
            $entrepreneurs = Entrepreneurs::findOrFail($request->row_id);
            $entrepreneurs->owner_company = $request->editOwnerCompany;
            $entrepreneurs->owner_name = $request->editOwnerName;
            if (isset($request->editOwnerCompanyLogo)) {
                $logoFileName = imageUploadWithCustomSize($request->editOwnerCompanyLogo, "400", "400", "ownerCompanyLogo");
                $entrepreneurs->owner_company_logo = 'ownerCompanyLogo/' . $logoFileName;
                Storage::delete('public/' . Entrepreneurs::findOrFail($request->row_id)->owner_company_logo);
            }
            $entrepreneurs->owner_email = $request->editOwnerMail;
            $entrepreneurs->owner_contact = $request->editOwnerContact;
            $entrepreneurs->owner_address = $request->editOwnerAddress;
            if (isset($request->editBeneficiaryLocation)) {
                $match_ = '/<iframe\s*src="https:\/\/www\.google\.com\/maps\/embed\?[^"]+"*\s*[^>]+>*<\/iframe>/';
                if (preg_match($match_, $request->editBeneficiaryLocation)) {
                    $mapLink = $request->editBeneficiaryLocation;
                } else {
                    $mapLink = null;
                }
                $entrepreneurs->mapLink = $mapLink;
            }
            $entrepreneurs->status = $request->row_status;
            $entrepreneurs->update();

            Toastr::success('Entrepreneurs Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Entrepreneurs $beneficiary
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function destroy($id)
    {
        try {
            Storage::delete('public/' . Entrepreneurs::findOrFail($id)->owner_company_logo);
            Entrepreneurs::Find($id)->delete();
            Toastr::success('Entrepreneurs Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
