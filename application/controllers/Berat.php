<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alat_model');    
        set_time_limit(1800);
    }
    public function index(){
          $data['title'] = 'VALIDASI';
        
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          
          $data['CONFINS'] = $this->Alat_model->getDataCabang();
          $this->load->view('berat/index', $data);
        //   $this->load->view('templates/footer');
      }

      public function fetchDataP()
      {
        $result = array('data' => array());
    
        $hapus = $this->Alat_model->hapus();
    
        $data= $this->Alat_model->getDataCIF();
    
    
      for($i=0;$i<count($data);$i++){
        $hsl='';
    
        $cek1 = $data[$i]['CUST_NAME'];
        $cek2 = $data[$i]['CUST_NO'];
        $cek3 = $data[$i]['ID_NO'];
        $cek4 = $data[$i]['BIRTH_DT'];
        $cek5 = $data[$i]['MOTHER_MAIDEN_NAME'];
    
        for($j=0;$j<count($data);$j++){
          $htg=0;
          if($i!=$j){
            if($data[$i]['CUST_NAME']==$data[$j]['CUST_NAME']){
              $htg += 1;
            }if($data[$i]['ID_NO']==$data[$j]['ID_NO']){
              $htg += 1;
            }if($data[$i]['BIRTH_DT']==$data[$j]['BIRTH_DT']){
              $htg += 1;
            }if($data[$i]['MOTHER_MAIDEN_NAME']==$data[$j]['MOTHER_MAIDEN_NAME']){
              $htg += 1;
            }if($data[$i]['CUST_NO']==$data[$j]['CUST_NO']){
              $htg = 0;
            }
            if($htg>1){
              $hsl=1;
               break;
            }else{
              $hsl=0;
            }
          }
        }
        
        $sq = $this->db->query("SELECT * FROM CIF_Data_P where ket = 1")->row_array();

          $dataku = array(
            'cust_no'=>$cek2,
            'cust_name'=>$cek1,
            'ket'=>$hsl,
          );
        $create = $this->Alat_model->create($dataku);
      }
    }


  	public function fetchData()
	{
    $this->fetchDataP();
    $result = array('data' => array());

		$data = $this->Alat_model->getData();  
      
		foreach ($data as $key => $value) {
               
            $cek1 = $value['CUST_NAME'];
            $cek2 = $value['CUST_NO'];
            $cek3 = $value['OFFICE_NAME'];
            $cek4 = $value['EMP_NAME'];
            $cek5 = $value['GO_LIVE_DT'];
            $cek6 = $value['AGRMNT_NO'];
            //$cek7 = $value['ket'];

			$result['data'][$key] = array(
        $cek1,
        $cek2,
        $cek3,
        $cek4,
        $cek5,
        $cek6,
       // $cek7,
                // $hasil2,
                // $hasil3,
                // $hasil4,

                
			);
		} // /foreach
		echo json_encode($result);

	}	

    

    }
