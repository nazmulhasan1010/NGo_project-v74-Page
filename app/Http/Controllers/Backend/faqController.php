<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class faqController extends Controller
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
            $faq = FAQ::latest()->get();
            return view('backend.FAQ.faq',compact('faq'));
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        try{
            $faq    = new FAQ();
            $faq->questions = $request->question;
            $faq->answers = $request->answer;
            $faq->save();

            Toastr::success('FAQ Successfully Added');
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
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(FAQ $faq)
    {
        return response()->json(['row_data' => $faq],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request,[
            'editQuestion' => 'required',
            'editAnswer' => 'required',
        ]);


        try{
            $faq = FAQ::findOrFail($request->old_id);

            $faq->questions = $request->editQuestion;
            $faq->answers = $request->editAnswer;
            $faq->status = $request->row_status;
            $faq->update();

            Toastr::success('FAQ Successfully Update');
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
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $faq = FAQ::findOrFail($id)->delete();
            Toastr::success('FAQ Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
