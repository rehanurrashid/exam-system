<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

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
		$id = $data['blankid'] ;
		$name = $data['blankname'];
		$check = $this->db->get_where('blankwords',array('blankid' => $id, 'blankname' => $name))->row();
		// rowCount($check );
		if($check){
			return true;
		}
		else
		{
			return false;
		}
	}
	
}