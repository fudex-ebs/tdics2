<?php

namespace App\Services;

use Auth;
use App\Quiz;
use App\Answer;
use App\GroupReport;
use App\Services\DiscQuestionService;

class QuizService
{
	protected $DiscQuestionService;

  public function __construct(DiscQuestionService $DiscQuestionService) {
      $this->DiscQuestionService = $DiscQuestionService;
  }

	public function storePcQuiz($DataArray){

        $quiz = Quiz::create([
           'slug' => uniqid(),
           'user_id' => Auth::user()->id
        ]);

        $questions = $this->DiscQuestionService->getPersonalQuestions();

        foreach ($questions as $counter => $question) {
        	Answer::create([
	           'most' => $DataArray[$question->id.'-most'],
	           'least' => $DataArray[$question->id.'-least'],
	           'quiz_id' => $quiz->id,
	           'disc_question_id' => $question->id
	        ]);
        }
        return $quiz;

	}

  public function get_quiz_by_slug($slug){
    $quiz = Quiz::whereslug($slug)->get()->first();
    return $quiz;
  }

  public function create_group_report(){
    $group_report = GroupReport::create([
           'slug' => uniqid(),
           'owner_id' => Auth::user()->id
        ]);
    return $group_report;
  }



}
