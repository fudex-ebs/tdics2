<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiscQuestion;
use App\Services\DiscQuestionService;


class DiscQuestionController extends Controller
{
    protected $DiscQuestionService;

    public function __construct(DiscQuestionService $DiscQuestionService) {
        $this->DiscQuestionService  = $DiscQuestionService;
    }
    public function ra_index(){
    	$disc_questions = DiscQuestion::where('type','role_assessment')->get();
    	return view('admin.dics_questions.ra_index',['disc_questions'=>$disc_questions]);
    }

    public function pc_index(){
        $disc_questions = DiscQuestion::where('type','personal_coaching')->get();
        return view('admin.dics_questions.pc_index',['disc_questions'=>$disc_questions]);
    }
    // store disc role assessment  questions
    public function store_ra_questions(Request $request){

      $ra_question = $this->DiscQuestionService->create_ra_question($request->all());
      return redirect()->route('ra_question.index');
    }
    // store disc personal coaching questions
    public function store_pc_questions(Request $request){
        $pc_question = $this->DiscQuestionService->create_pc_question($request->all());
        return redirect()->route('pc_question.index');
    }

    public function edit_pc_question(DiscQuestion $DiscQuestion){
        return view('admin.dics_questions.pc_edit',['DiscQuestion'=>$DiscQuestion]);
    }
    public function update_pc_question(Request $request,DiscQuestion $DiscQuestion){
        $DiscQuestion->update($request->all());
        return redirect()->back()->with('status','question updated');
    }
    public function edit_ra_question(DiscQuestion $DiscQuestion){
        return view('admin.dics_questions.ra_edit',['DiscQuestion'=>$DiscQuestion]);
    }
    public function update_ra_question(Request $request,DiscQuestion $DiscQuestion){
        $DiscQuestion->update($request->all());
        return redirect()->back()->with('status','question updated');
    }


    // store disc personal coaching questions
    public function delete(DiscQuestion $DiscQuestion){
        $DiscQuestion->delete();
        return redirect()->back()->with('status','question has been deleted');
    }

}
