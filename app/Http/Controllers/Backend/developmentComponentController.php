<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Category;
use Illuminate\Http\Request;

class developmentComponentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            $components = Component::latest()->get();
            return view('backend.about.component', compact('components'));
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
            'componentTitle' => 'required',
            'componentDescription' => 'required',
        ]);

        try {
            $category = new Component();
            $category->title = $request->componentTitle;
            $category->description = $request->componentDescription;
            $category->save();

            Toastr::success('Development component Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        try {
            $components = Component::findOrFail($id);
            return response()->json(['row_data' => $components], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'editComponentTitle' => 'required',
            'editComponentDescription' => 'required',
            'row_status' => 'required',
        ]);

        try {
            $component = Component::findOrFail($request->old_id);

            $component->title = $request->editComponentTitle;
            $component->description = $request->editComponentDescription;
            $component->status = $request->row_status;
            $component->update();

            Toastr::success('Development component Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Component::FindOrFail($id)->delete();
            Toastr::success('Development component Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::worning($e->getMessage());
            return redirect()->back();
        }
    }
}
