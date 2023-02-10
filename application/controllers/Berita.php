<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alat_model');    
        
    }
    public function index(){
          $data['title'] = 'VALIDASI';
        
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          
          $data['CONFINS'] = $this->Alat_model->getData();
          $this->load->view('cv/index', $data);
      }

  	public function fetchDataCV()
	{
        $result = array('data' => array());
		$data = $this->Alat_model->getDataCV();  
        $hapus = $this->Alat_model->hapus2();

  for($i=0;$i<count($data);$i++){
    $hsl='';

    $cek1 = $data[$i]['CUST_NAME'];
    $cek2 = $data[$i]['CUST_NO'];
    $cek3 = $data[$i]['NPWP'];
    $cek4 = $data[$i]['SUSUNAN_PENGURUS'];

    for($j=0;$j<count($data);$j++){
      $htg=0;
      if($i!=$j){
        if($data[$i]['CUST_NAME']==$data[$j]['CUST_NAME']){
          $htg += 1;
        }if($data[$i]['NPWP']==$data[$j]['NPWP']){
          $htg += 1;
        }if($data[$i]['SUSUNAN_PENGURUS']==$data[$j]['SUSUNAN_PENGURUS']){
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
            $dataku = array(
                'cust_name'=> $cek1,
                'ket'=>$hsl,
            );
            $create = $this->Alat_model->create2($dataku);  
           
			$result['data'][$i] = array(
                $cek2,
                $cek1,
                $cek3,
                $cek4,
                $hsl,     
			);
		} 
		echo json_encode($result);

	}	

}
