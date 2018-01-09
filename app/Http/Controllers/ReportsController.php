<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    /**
     * ReportsController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('store');
    }

    public function index()
    {
        $reports= Report::with(['user', 'event', 'reported_user'])->where('read', 0)->get();
        $total_reports_count= Report::all()->count();

        return view('admin.reports.index', compact('reports', 'total_reports_count'));
    }

    public function store(Request $request)
    {
        Report::create($request->all());

        return redirect()->back()->with('success', 'Report successfully submitted. We will do our best to serve you even better.');
    }

    public function markAsRead(Request $request)
    {
        $report = Report::find($request->id);
        $report->read= 1;

        if($report->save())
            return back()->with('success', 'Report Marked as Read!');

        return back()->with('error', 'There was an error trying to mark as read that report. Please try again.');
    }
}
