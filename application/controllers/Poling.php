<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poling extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alat_model'); 
        set_time_limit(1800);          
    }

    public function index(){
          $data['title'] = 'Laporan CIF Ganda';  
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $data['CONFINS'] = $this->Alat_model->getDataCIF();
          $this->load->view('poling/index', $data);
        //   $this->load->view('templates/footer');
      }
  	public function fetchData()
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

      $dataku = array(
        'cust_no'=>$cek2,
        'cust_name'=>$cek1,
        'ket'=>$hsl,
      );
//print_r($dataku);
    $create = $this->Alat_model->create($dataku);

			$result['data'][$i]= array(
                $cek1,
                $cek3,
                $cek4,
                $cek5,
                $cek2,
                $hsl,       
			);
		} // /foreach
    echo json_encode($result);
	}	

    }