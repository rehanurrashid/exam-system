<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// Functions for Categories
	public function categories($id =Null){
		$this->load->model('admin_model');
		$categories = $this->admin_model->getCat($id);
        if(!empty($categories)){
			$data = $categories;
			$this->load->view('admin/cat',['data'=>$data]);
        }
        else{
            $data = 0;
			$this->load->view('admin/cat',['data'=>$data]);
        }
	}
	public function add_cat(){
			$post = $this->input->post();
			unset($post['submit']);	// function used to unset submit value from	
			$this->load->model('admin_model'); 
			$this->flashMsgCat($this->admin_model->insertCat($post),
								"Category Added Successfully",
								"Category Failed to Add.Please Try Again.");
	}
	public function edit_cat(){
		$id = $this->input->post('cid');
		$post = $this->input->post();

			unset($post['submit']);	// function used to unset submit value from	
			$this->load->model('admin_model'); 
			$this->flashMsgCat($this->admin_model->editCat($id, $post),
								"Category Updated Successfully",
								"Category Failed to Update.Please Try Again.");
	}
	public function delete_cat()
		{
			$id = $this->input->post('cid');
			$this->load->model('admin_model');
			$this->flashMsgCat($this->admin_model->deleteCat($id),
								"Category Deleted Successfully",
								"Category Failed To Delete.Please Try Again.");
		}
	private function flashMsgCat($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/categories');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/categories');
			}
		}

	// Functions for Exercises
	public function exercise($id =Null){
		$this->load->model('admin_model');
		$exercises = $this->admin_model->getExe($id);
		$types = $this->admin_model->getType($id);
		$categories = $this->admin_model->getCat($id);
        if(!empty($exercises)){
			
			$data['exercise'] = $exercises;
			$data['types'] = $types;
			$data['categories'] = $categories;

			$this->load->view('admin/exercise',['data'=>$data]);
        }
        else{
            $data = 0;
			$this->load->view('admin/exercise',['data'=>$data]);
        }
	}

	public function edit_exercise($id =Null){
		$this->load->model('admin_model');	
		$eid = $this->input->post('eid');
		$tid = $this->input->post('tid');
		$exercise = $this->admin_model->getExe($eid);

		$cid = $exercise['cid'];
		$tid = $exercise['tid'];
		
		$type = $this->admin_model->getType($tid);
		$category = $this->admin_model->getCat($cid);
		$questions = $this->admin_model->getRows($eid);
		$words = $this->admin_model->getblanks();
		// print_r($questions);exit;
		if(!empty($exercise)){
			
			$data['exercise'] = $exercise;
			$data['type'] = $type;
			$data['category'] = $category;
			$data['blanks'] = $words;
			$data['questions'] = $questions;
			if(empty($questions)){
				if($tid == 1){
					$data['questions'] = 0;
					$this->load->view('admin/editexercise',['data'=>$data]);
				} 
				else if($tid == 2){
					$data['questions'] = 0;
					$this->load->view('admin/edittfexercise',['data'=>$data]);
				} else if($tid == 3){
					$data['questions'] = 0;
					$this->load->view('admin/editmatchexercise',['data'=>$data]);
				}
				else if($tid == 4){
					$data['questions'] = 0;
					$this->load->view('admin/editarrangeexercise',['data'=>$data]);
				}
				
			}
			else{
				if($tid == 1){
					$data['questions'] = $questions;
					$this->load->view('admin/editexercise',['data'=>$data]);
				} 
				else if($tid == 2){
					$data['questions'] = $questions;
					$this->load->view('admin/edittfexercise',['data'=>$data]);
				}else if($tid == 3){
					$data['questions'] = $questions;
					$this->load->view('admin/editmatchexercise',['data'=>$data]);
				}
				else if($tid == 4){
					$data['questions'] = $questions;
					$this->load->view('admin/editarrangeexercise',['data'=>$data]);
				}
			}
        }
        else{
			if($tid == 1){
				$data = 0;
				$this->load->view('admin/editexercise',['data'=>$data]);
			} 
			else if($tid == 2){
				$data = 0;
				$this->load->view('admin/edittfexercise',['data'=>$data]);
			}else if($tid == 3){
				$data['questions'] = $questions;
				$this->load->view('admin/editmatchexercise',['data'=>$data]);
			}
			else if($tid == 4){
				$data['questions'] = $questions;
				$this->load->view('admin/editarrangeexercise',['data'=>$data]);
			}
        }
	}

	public function insert_exercise(){
		$post = $this->input->post();
		unset($post['submit']);
		$post['created_at'] =  date("Y-m-d H:i:s");
		$this->load->model('admin_model');
		$this->flashMsgExercise($this->admin_model->insertExercise($post),
								"Exercise Added Successfully",
								"Exercise Failed to Add.Please Try Again.");
		
	}
	public function update_exercise(){
		$res = 1;
		$this->flashMsgExercise($res,
								"Exercise Updated Successfully",
								"Exercise Failed to Update.Please Try Again.");
	}
	public function delete_exercise(){
		$post = $this->input->post();
		unset($post['submit']);
		$this->load->model('admin_model');
		$this->flashMsgExercise($this->admin_model->deleteExercise($post),
								"Exercise Deleted Successfully",
								"Exercise Failed to Delete.Please Try Again.");
	}
	private function flashMsgExercise($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/exercise');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/exercise');
			}
		}
	// Functions for Type
	public function type($id =Null){

		$this->load->model('admin_model');
		$exercises = $this->admin_model->getExe($id);
		$types = $this->admin_model->getType($id);
		$categories = $this->admin_model->getCat($id);
        if(!empty($categories)){
			
			$data['exercise'] = $exercises;
			$data['types'] = $types;
			$data['categories'] = $categories;

			$this->load->view('admin/type',['data'=>$data]);
        }
        else{
            $data = 0;
			$this->load->view('admin/type',['data'=>$data]);
        }
	}
	// This function pass the first form values to next form (Next step approach)

	public function next_form($id = Null){
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		$this->load->model('admin_model');
		if($this->form_validation->run('add_exercise_rules')) 
									// setting  validation rules using config file
		{
			$post = $this->input->post();
			$tid = $this->input->post('type');
			$cid = $this->input->post('category');
	
			$this->load->model('admin_model');
			$exelastid = $this->admin_model->getExeLastId($id);
			$qtitle = $this->input->post('qtitle');
			unset($post['submit']);	// function used to unset submit value from
			
			$type = $this->admin_model->getType($tid);
			$category = $this->admin_model->getCat($cid);
			$words = $this->admin_model->getblanks();
			$questions = $this->admin_model->getRows();

			$data['type'] = $type;
			$data['category'] = $category;
			// $data['created_at'] = $post['created_at'];
			$data['qtitle'] = $qtitle;
			$data['exelastid'] = $exelastid ;
			$data['blanks'] = $words;
			$data['questions'] = $questions;
			
			if($tid == 1){
				$this->load->view('admin/exequestion',['data'=>$data]);
			}
			else if($tid == 2){
				$this->load->view('admin/truefalse',['data'=>$data]);
			}else if($tid == 3){
				$this->load->view('admin/matchcolumn',['data'=>$data]);
			}
			else if($tid == 4){
				$this->load->view('admin/arrangesentence',['data'=>$data]);
			}
			
		}
		else
			{
				// echo validation_errors();
				// redirect('admin/type');
			$exercises = $this->admin_model->getExe($id);
			$types = $this->admin_model->getType($id);
			$categories = $this->admin_model->getCat($id);
			$data['exercise'] = $exercises;
			$data['types'] = $types;
			$data['categories'] = $categories;
			$this->load->view('admin/type',['data'=>$data]);			
			}
	}
	// Functions for True False questions
	public function onload_truefalse_que_display(){

		$this->load->model('admin_model');
		$eid=$this->input->post('eid');
		$questions = $this->admin_model->gettfRows($eid);

		if(!empty($questions))
		{
			//$data['word']=$this->Model_Member->checkStatus();
			$data=$questions;
		}
		else
		{
			$data['status']=false;
		}
		echo json_encode($data);
	}

	// This function calls in flashMsgTrueFalse
	public function add_trulefalse_question($info){
		$cid = $info['cid'];
		$tid = $info['tid'];
		$qtitle = $info['qtitle'];
		$eid = $info['exelastid'];
		
		$check = $info['check']; // if set than redirect to edittfexercise else trufalse
		$this->load->model('admin_model');

		$type = $this->admin_model->getType($tid);
		$category = $this->admin_model->getCat($cid);

		$data['type'] = $type;
		$data['category'] = $category;
		$data['qtitle'] = $qtitle;
		$data['exelastid'] = $eid ;

		if($tid == 1){
				$this->load->view('admin/exequestion',['data'=>$data]);
			}
		else if($tid == 2){

				if($check == 2){
					$data['exercise']['qtitle'] = $qtitle;
					$data['exercise']['eid'] = $eid ;
					$this->load->view('admin/edittfexercise',['data'=>$data]);
				}
				else{
					$this->load->view('admin/truefalse',['data'=>$data]);
				}	
		}
		// $this->load->view('admin/truefalse',['data'=>$post]);
	}
	public function store_true_question(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		// setting  validation rules using config file
		if($this->form_validation->run('add_question_rules') && $this->upload->do_upload('image')){

			$post = $this->input->post();
			$post['eid'] = $this->input->post('eid');
			unset($post['submit']); // function used to unset submit value from	
			$data = $this->upload->data();
			$img_path = base_url("upload/". $data['raw_name']. $data['file_ext'] );
			// echo "<pre>",print_r($img_path);exit;
			$post['image'] = $img_path;
			$this->load->model('admin_model');

			$info['tid']= $this->input->post('type');
			$info['cid']= $this->input->post('category');
			$info['exelastid']= $this->input->post('eid');
			$info['qtitle']= $this->input->post('qtitle');
			$info['check']= $this->input->post('check'); // if set redirect to edittfexercise else truefalse
			$this->flashMsgTrueFalse($this->admin_model->inserttfRow($post),
								"Question Added Successfully",
								"Question Failed to Add.Please Try Again.",$info);
			}
			else
			{
				echo "error";
				echo validation_errors();
				// $upload_error = $this->upload->display_errors();
				// $this->load->view('admin/truefalse',compact('upload_error'));	
			}
		}
		public function edit_true_question(){
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			// setting  validation rules using config file
			if($this->form_validation->run('add_question_rules') && $this->upload->do_upload('image')){
	
				$post = $this->input->post();
				$post['eid'] = $this->input->post('eid');
				unset($post['submit']); // function used to unset submit value from	
				$data = $this->upload->data();
				$img_path = base_url("upload/". $data['raw_name']. $data['file_ext'] );
				// echo "<pre>",print_r($img_path);exit;
				$post['image'] = $img_path;
				$this->load->model('admin_model');
	
				$info['tid']= $this->input->post('type');
				$info['cid']= $this->input->post('category');
				$info['exelastid']= $this->input->post('eid');
				$info['qtitle']= $this->input->post('qtitle');
				$info['check']= $this->input->post('check'); // if set redirect to edittfexercise else truefalse
				$id = $this->input->post('id');
				$this->flashMsgTrueFalse($this->admin_model->updatetfRow($id , $post),
									"Question Updated Successfully",
									"Question Failed to Update.Please Try Again.",$info);
				}
				else
				{
					echo "error";
					echo validation_errors();
					// $upload_error = $this->upload->display_errors();
					// $this->load->view('admin/truefalse',compact('upload_error'));	
				}
			}
		public function delete_true_question(){
				
					$this->load->model('admin_model');
		
					$info['tid']= $this->input->post('type');
					$info['cid']= $this->input->post('category');
					$info['exelastid']= $this->input->post('eid');
					$info['qtitle']= $this->input->post('qtitle');
					$info['check']= $this->input->post('check');
					$id = $this->input->post('id');
					$this->flashMsgTrueFalse($this->admin_model->deletetfRow($id),
										"Question Deleted Successfully",
										"Question Failed to Delete.Please Try Again.",$info);
					
				}
		private function flashMsgTrueFalse($Successful, $successMessage,$failMessage,$info)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				// return redirect('admin/add_trulefalse_question/'.$info);
				// $this->load->view('admin/truefalse',['data'=>$info]);
				$this->add_trulefalse_question($info);
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/add_trulefalse_question/'.$info);
				// $this->load->view('admin/truefalse',['data'=>$info]);
				$this->add_trulefalse_question($info);
			}
		}
	// Function for Match the Column Questions
	public function add_match_question($info){
		$cid = $info['cid'];
		$tid = $info['tid'];
		$qtitle = $info['qtitle'];
		$eid = $info['exelastid'];
		
		$check = $info['check']; // if set than redirect to edittfexercise else trufalse
		$this->load->model('admin_model');

		$type = $this->admin_model->getType($tid);
		$category = $this->admin_model->getCat($cid);

		$data['type'] = $type;
		$data['category'] = $category;
		$data['qtitle'] = $qtitle;
		// $data['exelastid'] = $eid ;

		if($tid == 1){
				$this->load->view('admin/exequestion',['data'=>$data]);
			}
		else if($tid == 2){

				if($check == 2){
					$data['exercise']['qtitle'] = $qtitle;
					$data['exercise']['eid'] = $eid ;
					$this->load->view('admin/edittfexercise',['data'=>$data]);
				}
				else{
					$this->load->view('admin/truefalse',['data'=>$data]);
				}	
		} else if($tid == 3){

			if($check == 3){
				$data['exercise']['qtitle'] = $qtitle;
				$data['exercise']['eid'] = $eid ;
				$this->load->view('admin/editmatchexercise',['data'=>$data]);
			}else{
				$data['exelastid'] = $eid;
				$this->load->view('admin/matchcolumn',['data'=>$data]);
			}	
		}
		// $this->load->view('admin/truefalse',['data'=>$post]);
	}
	public function store_match_question(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		// setting  validation rules using config file
		if($this->form_validation->run('add_match_rules') && $this->upload->do_upload('image')){

			$post = $this->input->post();
			$post['eid'] = $this->input->post('eid');
			unset($post['submit']); // function used to unset submit value from	
			$data = $this->upload->data();
			$img_path = base_url("upload/". $data['raw_name']. $data['file_ext'] );
			// echo "<pre>",print_r($img_path);exit;
			$post['image'] = $img_path;
			$this->load->model('admin_model');

			$this->load->helper('string');
			$post['unique_id'] =  random_string('alnum',20);

			$info['tid']= $this->input->post('type');
			$info['cid']= $this->input->post('category');
			$info['exelastid']= $this->input->post('eid');
			$info['qtitle']= $this->input->post('qtitle');
			$info['check']= $this->input->post('check'); // if set redirect to editMatchexercise else matchcolumn
			$this->flashMsgMatch($this->admin_model->insertMatchRow($post),
								"Record Added Successfully",
								"Record Failed to Add.Please Try Again.",$info);
			}
			else
			{
				echo "error";
				echo validation_errors();
				// $upload_error = $this->upload->display_errors();
				// $this->load->view('admin/truefalse',compact('upload_error'));	
			}
		}
		public function onload_match_que_display(){

			$this->load->model('admin_model');
			$eid=$this->input->post('eid');
			$questions = $this->admin_model->getMatchRows($eid);
	
			if(!empty($questions))
			{
				//$data['word']=$this->Model_Member->checkStatus();
				$data=$questions;
			}
			else
			{
				$data['status']=false;
			}
			echo json_encode($data);
		}
		public function edit_match_question(){
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			// setting  validation rules using config file
			if($this->form_validation->run('add_match_rules') && $this->upload->do_upload('image')){
	
				$post = $this->input->post();
				$post['eid'] = $this->input->post('eid');
				unset($post['submit']); // function used to unset submit value from	
				$data = $this->upload->data();
				$img_path = base_url("upload/". $data['raw_name']. $data['file_ext'] );
				// echo "<pre>",print_r($img_path);exit;
				$post['image'] = $img_path;
				$this->load->model('admin_model');
				
				$this->load->helper('string');
				$post['unique_id'] =  random_string('alnum',20);

				$info['tid']= $this->input->post('type');
				$info['cid']= $this->input->post('category');
				$info['exelastid']= $this->input->post('eid');
				$info['qtitle']= $this->input->post('qtitle');
				$info['check']= $this->input->post('check'); // if set redirect to edittfexercise else truefalse
				$id = $this->input->post('mid');
				$this->flashMsgMatch($this->admin_model->updateMatchRow($id , $post),
									"Record Updated Successfully",
									"Record Failed to Update.Please Try Again.",$info);
				}
				else
				{
					echo "error";
					echo validation_errors();
					// $upload_error = $this->upload->display_errors();
					// $this->load->view('admin/truefalse',compact('upload_error'));	
				}
			}
		public function delete_match_question(){
				
				$this->load->model('admin_model');
	
				$info['tid']= $this->input->post('type');
				$info['cid']= $this->input->post('category');
				$info['exelastid']= $this->input->post('eid');
				$info['qtitle']= $this->input->post('qtitle');
				$info['check']= $this->input->post('check');
				$id = $this->input->post('mid');
				$this->flashMsgMatch($this->admin_model->deleteMatchRow($id),
									"Record Deleted Successfully",
									"Record Failed to Delete.Please Try Again.",$info);
				
			}
		private function flashMsgMatch($Successful, $successMessage,$failMessage,$info)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				// return redirect('admin/add_trulefalse_question/'.$info);
				// $this->load->view('admin/truefalse',['data'=>$info]);
				$this->add_match_question($info);
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/add_trulefalse_question/'.$info);
				// $this->load->view('admin/truefalse',['data'=>$info]);
				$this->add_match_question($info);
			}
		}
	// Functions for Fill in the Blanks (Type)
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function insert(){

		$this->load->model('admin_model');
			$question = array();
			$data = array();

			$question['eid']=$this->input->get('eid');
			$question['question']=$this->input->get('question');
			$eid = $question['eid'];
			$questions = $this->admin_model->getRows($eid);
			
			$res=$this->admin_model->insertRow($question);
			if($res)
			{
				//$data['word']=$this->Model_Member->checkStatus();
				$data=$questions;
			}
			else
			{
				$data['status']=false;
			}
			echo json_encode($data);
	}
	public function onload_questions_display(){

			$this->load->model('admin_model');
			$eid=$this->input->post('eid');
			$questions = $this->admin_model->getRows($eid);

			if(!empty($questions))
			{
				//$data['word']=$this->Model_Member->checkStatus();
				$data=$questions;
			}
			else
			{
				$data['status']=false;
			}
			echo json_encode($data);
	}
	public function select($id =Null){
		$this->load->model('admin_model');
		$questions = $this->admin_model->getRows($id);
		$words = $this->admin_model->getblanks();
        if(!empty($questions)){
			$data['res1'] = $questions;
            $data['res2'] = $words;

			$this->load->view('admin/display',['data'=>$data]);
        }
        else{
            echo "There are no questions in the database";
        }
	}
	// Functions for Edit and delete questions.
	public function edit_question(){

			$id=$this->input->get('id');
			$question['question'] =$this->input->get('question');
			$eid =$this->input->get('eid');

			$this->load->model('admin_model');

			$res=$this->admin_model->editRow($id,$question);
			$questions = $this->admin_model->getRows($eid);
			if($res)
			{
				//$data['word']=$this->Model_Member->checkStatus();
				$data=$questions;
			}
			else
			{
				$data['status']=false;
			}
			echo json_encode($data);
	}
	public function delete_question(){

		$id=$this->input->get('id');
		$eid =$this->input->get('eid');

		$this->load->model('admin_model');

		$res=$this->admin_model->deleteRow($id);
		$questions = $this->admin_model->getRows($eid);
		if($res)
		{
			//$data['word']=$this->Model_Member->checkStatus();
			$data=$questions;
		}
		else
		{
			$data['status']=false;
		}
		echo json_encode($data);
}
	// Functions for Blanks
	public function insertBlanks()
		{	
			$this->load->model('admin_model');
			$word = array();
			$data = array();
			$word['id']=$this->input->get('id');
			$word['blankid']=$this->input->get('blankid');
			$word['blankname']=$this->input->get('blankname');
			
			$res=$this->admin_model->insertBlank($word);
			if($res)
			{
				//$data['word']=$this->Model_Member->checkStatus();
				$data['status']=true;
			}
			else
			{
				$data['status']=false;
			}
			echo json_encode($data);
		}
	public function fetchBlanks(){
		$this->load->model('admin_model');
		$words = $this->admin_model->getblanks();
		// echo '<pre>',print_r($words);
	}
	
	private function flashAndRedirect($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/next_form');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/next_form');
			}
		}
}
