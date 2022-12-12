<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class knowledgeController extends Controller
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
            $knowledge = Knowledge::latest()->get();
            return view('backend.knowledge.knowledge', compact('knowledge'));
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
            'knowledgeTitle' => 'required',
            'knowledgeAttachment' => 'required|mimes:pdf,jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);
        if ($request->knowledgeCategory === 'others' && $request->knowledgeOtC !== null) {
            $category = $request->knowledgeOtC;
        } else {
            $category = $request->knowledgeCategory;
        }

        //file type check
        if ($request->knowledgeAttachment->extension() === 'pdf') {
            $file = anyTypeFileUpload($request->knowledgeAttachment, 'knowledge');
        } else {
            $file = imageUploadWithCustomSize($request->knowledgeAttachment, "1200", "800", "knowledge");
        }
        try {
            $knowledge = new Knowledge();
            $knowledge->title = $request->knowledgeTitle;
            $knowledge->title_bn = $request->knowledgeTitle_bn;
            $knowledge->description = $request->knowledgeDes;
            $knowledge->description_bn = $request->knowledgeDes_bn;
            $knowledge->category = $category;
            $knowledge->attachment = $file;
            $knowledge->save();

            Toastr::success('Knowledge Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Knowledge $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Knowledge $knowledge
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Knowledge $knowledge)
    {
        return response()->json(['row_data' => $knowledge], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Knowledge $knowledge
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);
        //file type check
        if ($request->knowledgeEditCategory === 'others' && $request->knowledgeEdidOtC !== null) {
            $category = $request->knowledgeEdidOtC;
        } else {
            $category = $request->knowledgeEditCategory;
        }

        if ($request->old_file === 'change') {
            Storage::delete('public/knowledge/' . Knowledge::findOrFail($request->old_id)->attachment);
            if ($request->editKnowAttachment->extension() === 'pdf') {
                $file = anyTypeFileUpload($request->editKnowAttachment, 'knowledge');
            } else {
                $file = imageUploadWithCustomSize($request->editKnowAttachment, "1200", "800", "knowledge");
            }
        } else {
            $file = $request->old_file;
        }
        try {
            $knowledge = Knowledge::findOrFail($request->old_id);
            $knowledge->title = $request->knowledgeEditTitle;
            $knowledge->title_bn = $request->knowledgeEditTitle_bn;
            $knowledge->description = $request->knowledgeEditDes;
            $knowledge->description_bn = $request->knowledgeEditDes_bn;
            $knowledge->category = $category;
            $knowledge->attachment = $file;
            $knowledge->status = $request->row_status;
            $knowledge->update();

            Toastr::success('Knowledge Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Knowledge $knowledge
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/knowledge/' . Knowledge::findOrFail($id)->attachment);
            Knowledge::Find($id)->delete();
            Toastr::success('Knowledge Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
