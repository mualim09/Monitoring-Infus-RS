<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	public function __construct()
 	{
 		 // header('Access-Control-Allow-Origin: 192.168.4.25/service Vary: Origin');
    // 	header("Access-Control-Allow-Methods: GET, OPTIONS, PUT, DELETE");
 	 	date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->library('session');
 		$this->load->helper("url");
 		$this->load->model('m_web');
 		$this->model = $this->m_web;
 		$this->load->database();
    }

	public function index()
	{	
		$pasien = $this->m_web->Getpasien();
		$this->load->view('header');
		$this->load->view('conten_monitoring',['pasien'=>$pasien]);
		$this->load->view('footer');
	}

	public function pasien()
	{	
		$pasien = $this->m_web->Getpasien();
		$this->load->view('header');
		$this->load->view('conten_pasien',['pasien'=>$pasien]);
		$this->load->view('footer');
	}

	public function add_pasien(){

		$datainput = array(
			"nama"=>$this->input->post('nama'),
			"kamar"=>$this->input->post('kamar'),
			"id_sensor"=>$this->input->post('id_sensor'),
			"id_infus"=>$this->input->post('id_infus')
		);

		$res = $this->db->insert("tbl_pasien",$datainput);
		if($res>=1){
			redirect('web/index');
		}else{
			redirect('web/index');
		}
	}

	public function update_pasien($id_pasien=0){

		$dataupdate = array(
			"nama"=>$this->input->post('nama'),
			"kamar"=>$this->input->post('kamar'),
			"id_sensor"=>$this->input->post('id_sensor'),
			"id_infus"=>$this->input->post('id_infus')
		);
		$where = array('id_pasien'=>$id_pasien);
		$res = $this->db->update("tbl_pasien",$dataupdate,$where);
		if($res>=1){
			redirect('web/index');
		}else{
			redirect('web/index');
		}
	}

	public function delete_pasien($id_pasien=0){
		$where = array('id_pasien'=>$id_pasien);
		$res = $this->db->delete("tbl_pasien",$where);
		if($res>=1){
			redirect('web/index');
		}else{
			redirect('web/index');
		}
	}

	public function perangkat()
	{	
		$perangkat = $this->m_web->Getperangkat();
		$this->load->view('header');
		$this->load->view('conten_perangkat',['perangkat'=>$perangkat]);
		$this->load->view('footer');
	}

	public function add_perangkat(){

		$datainput = array(
			"sn"=>$this->input->post('sn')
		);

		$res = $this->db->insert("tbl_sensing",$datainput);
		if($res>=1){
			redirect('web/perangkat');
		}else{
			redirect('web/perangkat');
		}
	}

	
	public function delete_perangkat($id_sensing=0){
		$where = array('id_sensing'=>$id_sensing);
		$res = $this->db->delete("tbl_sensing",$where);
		if($res>=1){
			redirect('web/perangkat');
		}else{
			redirect('web/perangkat');
		}
	}

		public function infus()
	{	
		$infus = $this->m_web->Getinfus();
		$this->load->view('header');
		$this->load->view('conten_infus',['infus'=>$infus]);
		$this->load->view('footer');
	}

	public function add_infus(){

		$datainput = array(
			"nama_infus"=>$this->input->post('nama_infus'),
			"type_infus"=>$this->input->post('type_infus'),
			"berat_botol"=>$this->input->post('berat_botol')
		);

		$res = $this->db->insert("tbl_infus",$datainput);
		if($res>=1){
			redirect('web/infus');
		}else{
			redirect('web/infus');
		}
	}

	public function update_infus($id_infus=0){

		$dataupdate = array(
			"nama_infus"=>$this->input->post('nama_infus'),
			"type_infus"=>$this->input->post('type_infus'),
			"berat_botol"=>$this->input->post('berat_botol')
		);
		$where = array('id_infus'=>$id_infus);
		$res = $this->db->update("tbl_infus",$dataupdate,$where);
		if($res>=1){
			redirect('web/infus');
		}else{
			redirect('web/infus');
		}
	}

	public function delete_infus($id_infus=0){
		$where = array('id_infus'=>$id_infus);
		$res = $this->db->delete("tbl_infus",$where);
		if($res>=1){
			redirect('web/infus');
		}else{
			redirect('web/infus');
		}
	}

	 function fetch_data(){    
         
           // if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
           $fetch_data = $this->m_web->make_datatables();  
           $data = array(); 
           $no=1; 
           foreach($fetch_data as $row)  
           {      
           		$sub_array = array();
                $sub_array[] = $no++;  
                $sub_array[] = $row->nama;  
                

                if($row->sisa<=0){
                	$sub_array[] = 0;
                }else{
                	$sub_array[] = $row->sisa." g";	
                }
                
                $sub_array[] = $row->nama_infus;
                $sub_array[] = $row->waktu;
                if($row->sisa <=10 ){
                	$sub_array[] = '<center><span class="label label-danger"><i class="fa fa-thermometer-empty"></i> Habis</span></center>';
                }else{
                	$sub_array[] = '<center><span class="label label-success"><i class="fa fa-thermometer-full"></i> Aman</span></center>';
                }
                
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->m_web->get_all_data(),  
                "recordsFiltered"     =>     $this->m_web->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
        //  }else{
        //     redirect('web');
        // }
      }



}
