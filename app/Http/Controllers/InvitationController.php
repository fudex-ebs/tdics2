<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\GroupReport;
use Auth;
use Illuminate\Http\Request;
use App\Services\InvitationService;

class InvitationController extends Controller
{
    protected $InvitationService;

    public function __construct(InvitationService $InvitationService) {
        $this->InvitationService  = $InvitationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store(Request $request,GroupReport $groupReport)
    {
        if( $groupReport->has_invited($request->get('email')) ){
          return redirect()->back()->with('status','you already have invited this email to this group');
        }
        $invitation = $this->InvitationService->create_invitation($request->all(),$groupReport);
        return redirect()->back()->with('status','invitation created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
