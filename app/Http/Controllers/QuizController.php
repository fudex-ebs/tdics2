<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuizService;
use App\Services\DiscQuestionService;
use Auth;

class QuizController extends Controller
{
    protected $QuizService,$DiscQuestionService;

    public function __construct(QuizService  $QuizService,DiscQuestionService $DiscQuestionService) {
        $this->QuizService  = $QuizService;
        $this->DiscQuestionService = $DiscQuestionService;
    }
    // return a personal form view
    public function createPcQuiz(){
        if(Auth::user()->has_quiz()){
            return redirect('/account');
        }
        if(Auth::user()->role == "individual"){
            $questions = $this->DiscQuestionService->getPersonalQuestions();
        }else{
            $questions = $this->DiscQuestionService->getRoleQuestions();
        }
//        $questions = $this->DiscQuestionService->getPersonalQuestions();
        return view('quiz.create',['questions'=>$questions]);
    }

    //  get quiz and questions
    public function storePcQuiz(Request $request){
        $quiz = $this->QuizService->storePcQuiz($request->except('_token'));
        return redirect()->route('pc_exam.report', ['slug' => $quiz->slug]);
    }

    //  report
    public function report($slug){
        $quiz = $this->QuizService->get_quiz_by_slug($slug);
        return view('quiz.report',['quiz'=>$quiz]);
    }




}
