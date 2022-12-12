<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Privacy;
use Illuminate\Http\Request;

class privacyController extends Controller
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
            $privacy = Privacy::latest()->get();
            return view('backend.termsPolicy.policy', compact('privacy'));
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
            'privacy' => 'required',
        ]);

        try {
            $privacy = new Privacy();
            $privacy->privacy = $request->privacy;
            $privacy->privacy_bn = $request->privacy_bn;
            $privacy->save();

            Toastr::success('Privacy Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Privacy $privacy
     * @return \Illuminate\Http\Response
     */
    public function show(Privacy $privacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Privacy $privacy
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $privacy = Privacy::findOrFail($id);
            return response()->json(['row_data' => $privacy], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Privacy $privacy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            $privacy = Privacy::findOrFail($request->old_id);

            if ($request->editPrivacy){
                $privacy->privacy = $request->editPrivacy;
            }
            if ($request->editPrivacy_bn){
                $privacy->privacy_bn = $request->editPrivacy_bn;
            }
            $privacy->status = $request->row_status;
            $privacy->update();

            Toastr::success('privacy Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Privacy $privacy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Privacy::Find($id)->delete();
            Toastr::success('Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
