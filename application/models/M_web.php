<?php 
class M_web extends CI_Model {
	public function __construct()
	{
		$this->load->database();
    }

    
    public function Getpasien() {  
      $this->db->select("*");
      $this->db->join('tbl_sensing','tbl_sensing.id_sensing = tbl_pasien.id_sensor');
      $this->db->join('tbl_infus','tbl_infus.id_infus = tbl_pasien.id_infus');
      return $this->db->get("tbl_pasien")->result();
    }

    public function Getperangkat() {  
      $this->db->select("*");
      return $this->db->get("tbl_sensing")->result();
    }

    public function Getinfus() {  
      $this->db->select("*");
      return $this->db->get("tbl_infus")->result();
    }

    public function Getuser(){
    	return $this->db->get('tbl_user')->result();
    }

    var $select_column = array("tbl_pasien.nama", "(tbl_sensing.berat-tbl_infus.berat_botol) as sisa", "tbl_infus.nama_infus","tbl_infus.berat_botol","tbl_sensing.waktu");  
    var $table = "tbl_pasien";  
    var $order_column = array(null,"tbl_pasien.nama", "sisa", "tbl_infus.nama_infus","tbl_sensing.waktu",null);   
    public function make_query()  
    {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_sensing','tbl_sensing.id_sensing = tbl_pasien.id_sensor');
           $this->db->join('tbl_infus','tbl_infus.id_infus = tbl_pasien.id_infus');          
                  
            if($_POST["search"]["value"]){
                $this->db->like("nama", $_POST["search"]["value"]);
                $this->db->or_like("nama_infus", $_POST["search"]["value"]);
                //$this->db->like_or("nama_infus", $_POST["search"]["value"]);
            }else{

            }

           if(isset($_POST["order"]))  
           {  
                
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
               
                $this->db->order_by('sisa', 'ASC');  
                // $this->db->query("SELECT id_corn,tbl_cron.id_cctv, status_koneksi,waktu FROM tbl_cron JOIN tbl_cctv ON tbl_cctv.id_cctv=tbl_cron.id_cctv WHERE id_corn IN (SELECT MAX(id_corn) FROM `tbl_cron` GROUP BY id_cctv)")
           }  
      }  
    public function make_datatables(){  //
           $this->make_query();  
           if($_POST["length"] != -1)  
           {    
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
    public function get_filtered_data()
    { 
        $this->make_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
    }       
    public function get_all_data()  //
    {  
        
            $this->make_query();
            
        return $this->db->count_all_results();  
    }  

}