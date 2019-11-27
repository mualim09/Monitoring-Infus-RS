<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->database();
 		$this->load->helper('url');
  	}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function sensing()
	{
		$data = array(
			
			'sn' =>$this->input->get('sn'),
			'berat' =>$this->input->get('berat'),
			'waktu' => date('Y-m-d H:i:s')
		 );
		$cek = $this->db->query("SELECT * FROM tbl_sensing WHERE sn='".$this->input->get('sn')."' ");
		if($cek->num_rows()<1){
			$this->db->insert("tbl_sensing",$data);
		}else{
			$where = array('id_sensing'=>$cek->row()->id_sensing);
			$this->db->update("tbl_sensing",$data,$where);
		}
	}
}
