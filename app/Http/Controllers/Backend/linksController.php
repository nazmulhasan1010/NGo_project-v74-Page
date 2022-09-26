<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Links;
use Illuminate\Http\Request;

class linksController extends Controller
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
            $links = Links::latest()->get();
            return view('backend.communication.links',compact('links'));
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

        try{
            $links    = new Links();
            $links->facebookLinks = $request->facebookLink;
            $links->youtubeLinks = $request->youtubeLink;
            $links->twitterLinks = $request->twitterLinks;
            $links->linkedInLinks = $request->linkedInLink;
            $links->save();

            Toastr::success('Successfully Added');
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
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function show(Links $links)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $links = Links::findOrFail($id);
            return response()->json(['row_data' => $links], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {

        $this->validate($request,[
            'old_id' => 'required',
        ]);

        try{
            $links = Links::findOrFail($request->old_id);
            $links->facebookLinks = $request->facebookLinkEdit;
            $links->youtubeLinks = $request->youtubeLinkEdit;
            $links->twitterLinks = $request->twitterLinksEdit;
            $links->linkedInLinks = $request->linkedInLinkEdit;
            $links->status = $request->row_status;
            $links->update();

            Toastr::success('Successfully Update');
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
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Links::Find($id)->delete();
            Toastr::success('Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
