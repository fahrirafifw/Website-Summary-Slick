<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		$this->load->model('Alat_model');
	}
	public function index()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('searchpersonal/index', $data);
        $this->load->view('templates/footer');
	}
	public function index1()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('approvalpersonal/index', $data);
        $this->load->view('templates/footer');
	}
	public function approvalcompany()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('approvalcompany/index', $data);
        $this->load->view('templates/footer');
	}
	public function searchslikpersonal()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('searchpersonal/index', $data);
        $this->load->view('templates/footer');
	}
	public function searchslikcompany()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('searchcompany/index', $data);
        $this->load->view('templates/footer');
	}
	public function datatable()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('datatable/index', $data);
        $this->load->view('templates/footer');
	}
	public function upload()
	{
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('uploadslik/index', $data);
        $this->load->view('templates/footer');
	}
	
	public function submit_data() {
		$jenisidcard = $this->input->post('jenisidcard');
		$nomorktp = $this->input->post('nomorktp');
		$ttl = $this->input->post('ttl');
		$name = $this->input->post('name');
		$alasan = $this->input->post('alasan');
	
		// Validate the form data here
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('jenisidcard', 'jenisidcard', 'required');
		$this->form_validation->set_rules('nomorktp', 'nomorktp', 'required|min_length[16]|numeric');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('alanper', 'alanper', 'required');
		$this->form_validation->set_rules('ttl', 'ttl', 'required');
	
		if ($this->form_validation->run() === FALSE) {
		  // If validation fails, return to the form and show error messages
		  $this->session->set_flashdata('jenisidcard_error', form_error('jenisidcard'));
		  $this->session->set_flashdata('nomorktp_error', form_error('nomorktp'));
		  $this->session->set_flashdata('name_error', form_error('name'));
		  $this->session->set_flashdata('nomorktp_error', form_error('nomorktp'));
		  $this->session->set_flashdata('ttl_error', form_error('ttl'));
		  $this->session->set_flashdata('failed', 'Data failed to submit!');
		  redirect('dashboard/searchslikpersonal');
		} else {
		  // If validation is successful, process the form data (e.g. insert into database)
		  // ...
	
		  // After processing the form, redirect to a success page
		  $this->session->set_flashdata('success', 'Data berhasil di submit!');
		  redirect('dashboard/searchslikpersonal');
		}
	  }
	  public function submit_data_company() {
		$jenisidcard = $this->input->post('jenisidcard');
		$nomorktp = $this->input->post('nomorktp');
		$ttl = $this->input->post('ttl');
		$name = $this->input->post('name');
		$alasan = $this->input->post('alasan');
	
		// Validate the form data here
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jenisidcard', 'jenisidcard', 'required');
		$this->form_validation->set_rules('nomorktp', 'nomorktp', 'required|min_length[16]|numeric');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('alanper', 'alanper', 'required');
	
		if ($this->form_validation->run() === FALSE) {
		  // If validation fails, return to the form and show error messages
		  $this->session->set_flashdata('jenisidcard_error', form_error('jenisidcard'));
		  $this->session->set_flashdata('nomorktp_error', form_error('nomorktp'));
		  $this->session->set_flashdata('name_error', form_error('name'));
		  $this->session->set_flashdata('nomorktp_error', form_error('nomorktp'));
		  $this->session->set_flashdata('alanper_error', form_error('alanper'));
		  $this->session->set_flashdata('failed', 'Data gagal di submit!');
		  redirect('dashboard/searchslikcompany');
		} else {
		  // If validation is successful, process the form data (e.g. insert into database)
		  // ...
	
		  // After processing the form, redirect to a success page
		  $this->session->set_flashdata('success', 'Data berhasil di submit!');
		  redirect('dashboard/searchslikcompany');
		}
	  }
	public function convert_to_json()
	{
		if (isset($_FILES['pdf_file'])) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '2048';

			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('pdf_file')) {
				$error = array('error' => $this->upload->display_errors());
				redirect('dashboard/upload', $error);

			} else {
				$data = array('upload_data' => $this->upload->data());
				$pdf_file = $data['upload_data']['full_path'];
				$pdf_filename = 'pdf_' . time() . '.txt';
				$text_file = './uploads/' . $pdf_filename;
				$parser = new Smalot\PdfParser\Parser();
				$pdf = $parser->parseFile($pdf_file);
				$text = $pdf->getText();

				$lines = explode("\n", $text);
				$data = array();
				foreach ($lines as $line) {
					$data[] = $text;
					$text = explode(" ", $line);
				}
				$json = json_encode($data, JSON_PRETTY_PRINT);
				$decoded = json_decode($json, true);
				$group_data = array();
				$new_data = [];
				foreach ($decoded as $data) {
					if ($data[0] === "Tanggal" && $data[1] === "Akad" && $data[2] === "Awal") {
						$new_data[] = [
							"Judul" => $data[0] . " " . $data[1] . " " . $data[2],
							"TanggalAkadAwal" => $data[3] . " " . $data[4] . " " . $data[5],
						];
					}
					else if ($data[0] === "Tanggal" && $data[1] === "Jatuh" && $data[2] === "Tempo"){
						$new_data[] = [
							"Judul" => $data[0] . " " . $data[1] . " " . $data[2],
							"TanggalJatuhTempo" => $data[3] . " " . $data[4] . " " . $data[5],
						];
					}
					else if($data[0] === "Akad" && $data[3] === "Plafon"&& $data[4] === "Awal"){
						$new_data[] = [
							"Judul" => $data[3] . " " . $data[4] ,
							"PlafonAwal" => $data[6],
						];
					}
					else if($data[0] === "Suku"){
						$new_data[] = [
							"Judul" => $data[0] . " " . $data[1] ,
							"SukuBunga" => $data[2],
							"TipeBunga" => $data[6] . " " . $data[7] . " " . $data[8],
						];
					}else if($data[0] === "Baki"){
						$new_data[] = [
							"Judul" => $data[0] . " " . $data[1] ,
							"BakiDebet" => $data[2],
						];

					}
				}
				$group_data[] = array("group_data" => $new_data);
				$new_data = array();
				$new_json = json_encode($group_data);
				$json = json_encode($group_data, JSON_PRETTY_PRINT);
				// $search = "Kualitas";
				// $start = strpos($text, $search) + strlen($search);
				// $end = strpos($text, "\n", $start);
				// $result = substr($text, $start, $end - $start);

				// // // Trim the result and convert it to an array
				// $result = trim($result);
				// $result = explode(" - ", $result);

				// Convert the array to a JSON object
				// $result = json_encode($result);

				// Write the JSON data to a file
				file_put_contents('./uploads/pdf.json', $json);
		  
				header('Content-Type: application/.json');
				header('Content-Disposition: attachment; filename="data.json"');
		  
				echo ($json);
				redirect('dashboard/index');
				
			}
		} else {
			redirect('dashboard/index');
		}
		
	}
	
	public function excel() {
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		

	
		// Create a new PHPExcel object
		$object = new PHPExcel();

		$object->getProperties()->setCreator("user");
		$object->getProperties()->setLastModifiedBy("user");
		$object->getProperties()->setTitle("Summary Slik");

	
		// Set active sheet
		$object->setActiveSheetIndex(0);
		$sheet = $object->getActiveSheet();
	
		// Get data from json file
		$data = json_decode(file_get_contents('Callback_ps.json'), true);
	
		// Set column headers
		$object->getActiveSheet()->setCellValue('A1', 'Debitur Id');
		$object->getActiveSheet()->setCellValue('B1', 'Kolektibilitas');
		$object->getActiveSheet()->setCellValue('C1', 'LjkKet');
		$object->getActiveSheet()->setCellValue('D1', 'JenisPenggunaanKet');
		$object->getActiveSheet()->setCellValue('E1', 'PlafonAwal');
		$object->getActiveSheet()->setCellValue('F1', 'BakiDebet');
		$object->getActiveSheet()->setCellValue('G1', 'SukuBunga');
		$object->getActiveSheet()->setCellValue('H1', 'TanggalAwalKredit');
		$object->getActiveSheet()->setCellValue('I1', 'TanggalJatuhTempo');
		$object->getActiveSheet()->setCellValue('J1', 'JumlahHariTunggakan');
		$object->getActiveSheet()->setCellValue('K1', 'TunggakanPokok');
		$object->getActiveSheet()->setCellValue('L1', 'TunggakanBunga');
		$object->getActiveSheet()->setCellValue('M1', 'Denda');
		$object->getActiveSheet()->setCellValue('N1', 'Angsuran');
		$object->getActiveSheet()->setCellValue('O1', 'KondisiKet');
		$object->getActiveSheet()->setCellValue('P1', 'JenisSukuBungaKet');
	
		$sumplafonawal = 0;
		$sumbakidebet = 0;
		$row = 2;	
		$lastRow = $row; 		
		foreach ($data["Data"]["Slik"]["Detail"]["FasilitasKredit"] as $dat) {
			$date1 = new DateTime($dat["TanggalAwalKredit"]);
			$date2 = new DateTime($dat["TanggalJatuhTempo"]);
			$plafonawal1= $dat["PlafonAwal"];
			$plafonawal = array_column($data['Data']['Slik']['Detail']['FasilitasKredit'], 'PlafonAwal');
			$bakidebet = array_column($data['Data']['Slik']['Detail']['FasilitasKredit'], 'BakiDebet');
			$JenisSukuBunga= $dat["JenisSukuBunga"];
			$sukubunga= $dat["SukuBunga"];
			$sukubunga = $sukubunga/1200;
			$interval = $date1->diff($date2);
			$month = $interval->m + ($interval->y * 12);
			if ($JenisSukuBunga == 1) {
				$result = ($plafonawal1/$month);
			} else if ($JenisSukuBunga == 2) {
				$result = $sukubunga * -$plafonawal1 * pow((1+$sukubunga),$month) / (1 - pow((1+$sukubunga),$month));
			} else {
				$result = ($plafonawal1/$month);
			}
			$sumplafonawal = array_reduce($plafonawal, function($carry, $item) {
				return $carry + $item;
			}, 0);
		
			$sumbakidebet = array_reduce($bakidebet, function($carry, $item) {
				return $carry + $item;
			}, 0);
			$object->getActiveSheet()->setCellValue('A'.$row,$dat['DebiturId']);
			$object->getActiveSheet()->setCellValue('B'.$row,$dat['KolektibilitasKet']);
			$object->getActiveSheet()->setCellValue('C'.$row,$dat['LjkKet']);
			$object->getActiveSheet()->setCellValue('D'.$row,$dat['JenisPenggunaanKet']);
			$object->getActiveSheet()->setCellValue('E'.$row,$dat['PlafonAwal']);
			$object->getActiveSheet()->setCellValue('F'.$row,$dat['BakiDebet']);
			$object->getActiveSheet()->setCellValue('G'.$row,$dat['SukuBunga']);
			$object->getActiveSheet()->setCellValue('H'.$row,$dat['TanggalAwalKredit']);
			$object->getActiveSheet()->setCellValue('I'.$row,$dat['TanggalJatuhTempo']);
			$object->getActiveSheet()->setCellValue('J'.$row,$dat['JumlahHariTunggakan']);
			$object->getActiveSheet()->setCellValue('K'.$row,$dat['TunggakanPokok']);
			$object->getActiveSheet()->setCellValue('L'.$row,$dat['TunggakanBunga']);
			$object->getActiveSheet()->setCellValue('M'.$row,$dat['Denda']);
			$object->getActiveSheet()->setCellValue('N'.$row, number_format($result, 2, '.', ''));
			$object->getActiveSheet()->setCellValue('O'.$row,$dat['KondisiKet']);
			$object->getActiveSheet()->setCellValue('P'.$row,$dat['JenisSukuBungaKet']);

			$row++;
			$lastRow = $row; 
		}
		$object->getActiveSheet()->setCellValue('E'.$lastRow, number_format($sumplafonawal, 2, '.', ''));
		$object->getActiveSheet()->setCellValue('F'.$lastRow, number_format($sumbakidebet, 2, '.', ''));
		$filename="Summary_slik".'.xlsx';

		$object->getActiveSheet()->setTitle("Summary Slik");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$write=PHPExcel_IOFactory::createwriter($object,'Excel2007');
		$write->save('php://output');
	}

	

  
}

