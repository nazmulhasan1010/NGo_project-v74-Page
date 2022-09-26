<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class beneficiaryLocationsController extends Controller
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
            $beneficiary = Beneficiary::latest()->get();
            return view('backend.beneficiaryLocations.beneficiaryLocations', compact('beneficiary'));
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
            'beneficiaryTitle' => 'required',
            'beneficiaryContact' => 'required',
            'beneficiaryLocation' => 'required',
        ]);

        try {
            $mapLink = $request->beneficiaryLocation;
            $match_ ='/<iframe\s*src="https:\/\/www\.google\.com\/maps\/embed\?[^"]+"*\s*[^>]+>*<\/iframe>/';
            if (preg_match($match_, $mapLink)) {
                $beneficiary = new Beneficiary();
                $beneficiary->title = $request->beneficiaryTitle;
                $beneficiary->contact = $request->beneficiaryContact;
                $beneficiary->address = $request->beneficiaryAddress;
                $beneficiary->mapLink = $mapLink;
                $beneficiary->save();

                Toastr::success('Beneficiary Successfully Added');
                return redirect()->back();
            } else {
                Toastr::error('Please enter a valid link');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Beneficiary $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Beneficiary $beneficiary
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $beneficiary = Beneficiary::findOrFail($id);
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
     * @param \App\Models\Beneficiary $beneficiary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            $beneficiary = Beneficiary::findOrFail($request->old_id);

            $beneficiary->title = $request->beneficiaryEditTitle;
            $beneficiary->contact = $request->beneficiaryEditContact;
            $beneficiary->address = $request->beneficiaryEditAddress;
            $beneficiary->mapLink = $request->beneficiaryEditLocation;
            $beneficiary->status = $request->row_status;
            $beneficiary->update();

            Toastr::success('Beneficiary Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Beneficiary $beneficiary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Beneficiary::Find($id)->delete();
            Toastr::success('Beneficiary Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
