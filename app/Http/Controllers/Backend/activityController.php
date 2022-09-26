<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class activityController extends Controller
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
            $activity = Activity::latest()->get();
            return view('backend.activity.activity', compact('activity'));
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
            'activityTitle' => 'required',
            'activityImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
            'activityProject' => 'required',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->activityImage, "1200", "800", "activity");
            $activity = new Activity();
            $activity->title = $request->activityTitle;
            $activity->description = $request->activityProject;
            $activity->image = 'activity/' . $fileName;
            $activity->save();

            Toastr::success('A New Activity Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $activity = Activity::findOrFail($id);
            return response()->json(['row_data' => $activity], 200);
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Activity $activity
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
                $fileName = 'activity/' . imageUploadWithCustomSize($request->activityEditImage, "1200", "800", "activity");
                Storage::delete('public/' . Activity::findOrFail($request->old_id)->image);
            } else {
                $fileName = $request->old_image;
            }
            if ($request->activityEditProject === null) {
                $projectDes = $request->oldActivityEditProject;
            } else {
                $projectDes = $request->activityEditProject;
            }
            $activity = Activity::findOrFail($request->old_id);

            $activity->title = $request->activityEditTitle;
            $activity->description = $projectDes;
            $activity->image = $fileName;
            $activity->status = $request->row_status;
            $activity->update();

            Toastr::success('Project Activity Successfully Update');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Storage::delete('public/' . Activity::findOrFail($id)->image);
            Activity::Find($id)->delete();
            Toastr::success('Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
