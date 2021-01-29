<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// Function For Categories
	function getCat($id = null){
		if($id){
			$query = $this->db->get_where('categories',array('cid' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('categories');
			return $query->result_array();
		}
	}
	public function insertCat($data =array()){
		
		$insert = $this->db->insert('categories',$data);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function editCat($id,$category)
	{
		return $this->db
				->where('cid',$id)
				->update('categories',$category); //return number of row affected either 0 or 1 (true or false)
	}
	public function deleteCat($id)
	{
		return $this->db
					->delete('categories',['cid' => $id]);
					 //rows affected
	}

	//Functions For Exercises

	function getExeLastId($id = null){
		
		$last_row = $this->db->select('eid')->order_by('eid',"desc")->limit(1)->get('exercises')->row();
		if(empty($last_row)){
			return '1';
		}else{
			return $last_row->eid+1;
		}
	}
	function getExe($id = null){
		if($id){
			$query = $this->db->get_where('exercises',array('eid' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('exercises');
			return $query->result_array();
		}
	}
	function insertExercise($data = array()){
		$insert = $this->db->insert('exercises',$data);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	function deleteExercise($data ){
		$eid = $data['eid'];
		return $this->db->delete('exercises', array('eid' => $eid));
	}
	// Function for True False questions
	function inserttfRow($data =array()){
		$post['eid'] = $data['eid'];
		$post['question'] = $data['question'];
		$post['image'] = $data['image'];
		$post['answer'] = $data['answer'];
		$insert = $this->db->insert('question',$post);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	function gettfRows($id = null){

		if($id){
			$query = $this->db->select('*')->order_by('id',"asc")->where('eid',$id)->get('question');
			return $query->result_array();
		}
		else
		{
			$query = $this->db->get('question');
			return $query->result_array();
		}
	}
	public function updatetfRow($id,$data)
	{
		$post['eid'] = $data['eid'];
		$post['question'] = $data['question'];
		$post['image'] = $data['image'];
		$post['answer'] = $data['answer'];
		return $this->db
				->where('id',$id)
				->update('question',$post); //return number of row affected either 0 or 1 (true or false)
	}
	function deletetfRow($id){
		return $this->db->delete('question', array('id' => $id));
	}
	//Functions For Types

	function getType($id = null){
	if($id){
		$query = $this->db->get_where('types',array('tid' => $id));
		return $query->row_array();
	}
	else
	{
		$query = $this->db->get('types');
		return $query->result_array();
	}
}
	// Function for Match the Column questions
	function insertMatchRow($data =array()){
		$post['eid'] = $data['eid'];
		$post['unique_id'] = $data['unique_id'];
		$post['imgname'] = $data['imgname'];
		$post['image'] = $data['image'];
		$insert = $this->db->insert('matchcolumn',$post);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	function getMatchRows($id = null){

		if($id){
			$query = $this->db->select('*')->order_by('mid',"asc")->where('eid',$id)->get('matchcolumn');
			return $query->result_array();
		}
		else
		{
			$query = $this->db->get('matchcolumn');
			return $query->result_array();
		}
	}
	public function updateMatchRow($id,$data)
	{
		$post['eid'] = $data['eid'];
		$post['unique_id'] = $data['unique_id'];
		$post['imgname'] = $data['imgname'];
		$post['image'] = $data['image'];
		return $this->db
				->where('mid',$id)
				->update('matchcolumn',$post); //return number of row affected either 0 or 1 (true or false)
	}
	function deleteMatchRow($id){
		return $this->db->delete('matchcolumn', array('mid' => $id));
	}
	// Functions Related to Insert, edit and fetch  questions
	function insertRow($data =array()){
		$insert = $this->db->insert('question',$data);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	function getRows($id = null){

		if($id){
			// return $last_row=$this->db->select('question')->order_by('id',"asc")->limit(1)->get('question');
			$query =$this->db->select('*')->order_by('id',"asc")->where('eid',$id)->get('question');
			return $query->result_array();
		}
		else
		{
			$query = $this->db->get('question');
			return $query->result_array();
		}
	}
	public function editRow($id,$question)
	{
		return $this->db
				->where('id',$id)
				->update('question',$question); //return number of row affected either 0 or 1 (true or false)
		
	}
	public function deleteRow($id)
	{
		return $this->db->delete('question', array('id' => $id)); //return number of row affected either 0 or 1 (true or false)
	}
	// Functions relaeted to blanks
	function insertBlank($data =array()){

		$id = $data['id'] ;
		$blankid = $data['blankid'] ;
		$blankname = $data['blankname'];
		$check = $this->db->get_where('blankwords',array('blankid' => $blankid, 'blankname' => $blankname, 'id' => $id))->row();
		// rowCount($check );
		if($check){
			return false;
		}
		else
		{
			$sql = $this->db->insert('blankwords', $data);
			if($sql){
				return true;
			}
			else{
				return false;
			}
		}
		
	}
	function getblanks(){
		$query = $this->db->get('blankwords');
		return	$query->result_array();
	}
	function checkblanks($data =array()){
		$id0 = $data['blankid0'] ;
		$blankname0 = $data['blankname0'];

		$id1 = $data['blankid1'] ;
		$blankname1 = $data['blankname1'];

		$id2 = $data['blankid2'] ;
		$blankname2 = $data['blankname2'];
		if(!empty($id0) && !empty($id1) && !empty($id2)){
			$check0 = $this->db	->select('*')
								->where('blankid',$id0)
								->where('blankname',$blankname0)
								->get('blankwords')
								->row();
			$check1 = $this->db	->select('*')
								->where('blankid',$id1)
								->where('blankname',$blankname1)
								->get('blankwords')
								->row();					
			$check2 = $this->db	->select('*')
								->where('blankid',$id2)
								->where('blankname',$blankname2)
								->get('blankwords')
								->row();
			if($check0 == true && $check1 == true && $check2 == true){
				return true;
			}
			else
			{
				return false;
			}
		}
		else 
		if(!empty($id0) && !empty($id1)){
			$check0 = $this->db	->select('*')
								->where('blankid',$id0)
								->where('blankname',$blankname0)
								->get('blankwords')
								->row();
			$check1 = $this->db	->select('*')
								->where('blankid',$id1)
								->where('blankname',$blankname1)
								->get('blankwords')
								->row();					
			
			if($check0 == true && $check1 == true){
				return true;
			}
			else
			{
				return false;
			}
		}
		else {
			$check = $this->db	->select('*')
								->where('blankid',$id0)
								->where('blankname',$blankname0)
								->get('blankwords')
								->row();
			if($check){
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}