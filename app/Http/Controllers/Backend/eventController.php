<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eventController extends Controller
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
            $event = Event::latest()->get();
            return view('backend.upcomingEvents.events',compact('event'));
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
        $this->validate($request, [
            'eventTitle' => 'required',
            'eventImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->eventImage, "1200", "800", "event");
            $event = new Event();
            $event->title = $request->eventTitle;
            $event->title_bn = $request->eventTitle_bn;
            $event->description = $request->eventDescription;
            $event->description_bn = $request->eventDescription_bn;
            $event->start = $request->eventStart;
            $event->end = $request->eventEnd;
            $event->place = $request->eventPlace;
            $event->image = 'event/' . $fileName;
            $event->save();

            Toastr::success('Event Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $event = Event::findOrFail($id);
            return response()->json(['row_data' => $event], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $cat)
    {
        $this->validate($request, [
            'old_id' => 'required',
        ]);

        try {
            if ($request->old_image === 'change') {
                $fileName = 'event/' . imageUploadWithCustomSize($request->editEventImage, "1200", "800", "event");
                Storage::delete('public/' . Event::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }

            $event = Event::findOrFail($request->old_id);
            $event->title = $request->editEventTitle;
            $event->title_bn = $request->editEventTitle_bn;
            $event->description = $request->editEventDescription;
            $event->description_bn = $request->editEventDescription_bn;
            $event->status = $request->row_status;
            $event->start = $request->editEventStart;
            $event->end = $request->editEventEnd;
            $event->place = $request->editEventPlace;
            $event->image = $fileName;
            $event->update();


            Toastr::success('Event Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Event::findOrFail($id)->image);
            Event::Find($id)->delete();
            Toastr::success('Event Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
