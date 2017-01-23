<?php

namespace App\Http\Controllers;

use DB;
use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the jobs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return view('jobs.index', compact('user'));
    }

    /**
     * Store a job.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'hours' => 'required|integer|between:0,168'
        ]);

        $job = new Job($request->all());

        $request->user()->addJob(
            new Job($request->all())
        );

        return back();
    }
}
