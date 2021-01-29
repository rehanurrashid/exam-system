<?php 

$config = [
	
			'add_exercise_rules' =>	[
										[
											'field' => 'type',
											'label' => 'Type',
											'rules' => 'required',
										],
										[
											'field' => 'category',
											'label' => 'Category',
											'rules' => 'required',
										],
										[
											'field' => 'qtitle',
											'label' => 'Question Title',
											'rules' => 'required',
										]
									],
			'add_question_rules' =>	[
											[
												'field' => 'question',
												'label' => 'Question',
												'rules' => 'required',
											],
											[
												'field' => 'answer',
												'label' => 'Answer',
												'rules' => 'required',
											]
										],
			'add_match_rules' =>	[
											[
												'field' => 'imgname',
												'label' => 'Image Name',
												'rules' => 'required',
											]
										]			
];