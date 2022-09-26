<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class contactController extends Controller
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
        try{
            $contact = Contacts::latest()->get();
            return view('backend.communication.contacts',compact('contact'));
        }
        catch (\Exception $e) {
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'contactAddress' => 'required',
            'contactMail' => 'required',
            'contactNumber' => 'required',
        ]);

        try{
            $contact    = new Contacts();
            $contact->contactNumber = $request->contactNumber;
            $contact->contactAddress = $request->contactAddress;
            $contact->contactMail = $request->contactMail;
            $contact->save();

            Toastr::success('Contacts Successfully Added');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Contacts $contact)
    {
        return response()->json(['row_data' => $contact],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request,[
            'old_id' => 'required',
        ]);


        try{
            $contact = Contacts::findOrFail($request->old_id);

            $contact->contactNumber = $request->editContactNumber;
            $contact->contactAddress = $request->editContactAddress;
            $contact->contactMail = $request->editContactMail;
            $contact->status = $request->row_status;
            $contact->update();

            Toastr::success('Contacts Successfully Update');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contacts $contact)
    {
        try{
            $contact->delete();
            Toastr::success('Contacts Successfully Deleted');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
