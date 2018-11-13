<?php

namespace App\Services;

use App\DiscQuestion;

class DiscQuestionService
{
	// return all personal quiestions
	public function getPersonalQuestions(){
		$questions = DiscQuestion::where('type','personal_coaching')->get()->all();
		return $questions;
	}

	public function create_pc_question($dataArray){
		$data = array_merge([
			 'slug' => uniqid(),
			 'type' => 'personal_coaching'
		], $dataArray);
		$question = DiscQuestion::create($data);
		return $question;
	}

	public function create_ra_question($dataArray){
		$data = array_merge([
			 'slug' => uniqid(),
			 'type' => 'role_assessment'
		], $dataArray);
		$question = DiscQuestion::create($data);
		return $question;
	}

	



}
