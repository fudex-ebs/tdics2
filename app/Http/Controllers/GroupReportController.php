<?php

namespace App\Http\Controllers;

use App\GroupReport;
use Illuminate\Http\Request;
use App\Services\GroupService;
use Auth;
class GroupReportController extends Controller
{
    protected $GroupService;

    public function __construct(GroupService $GroupService) {
        $this->GroupService  = $GroupService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $groups = Auth::user()->group_reports;
      return view('account.individual.group.index',['groups' => $groups]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = $this->GroupService->create_group_report($request->all());
        return redirect()->route('group.show',['group' => $group]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupReport  $groupReport
     * @return \Illuminate\Http\Response
     */
    public function show(GroupReport $groupReport)
    {
        return view('account.individual.group.show',['group' => $groupReport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupReport  $groupReport
     * @return \Illuminate\Http\Response
     */
    public function report(GroupReport $groupReport)
    {
        return view('account.individual.group.report',['group' => $groupReport]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupReport  $groupReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupReport $groupReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupReport  $groupReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupReport $groupReport)
    {
        //
    }
}
