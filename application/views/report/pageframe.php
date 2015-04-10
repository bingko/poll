<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Loading Excel....</title>
</head>

<body>
<?php
		$file_name = $this->uri->segment(3);
		$filepath = 'excel/'.$file_name.'.xls';
		if(file_exists($filepath)){
		    //redirect('home/index');
		}else{
		    $excel_load = $this->report_model->excel_load($file_name);
			if(count($excel_load)==0){
				$input_array = array(
					'qh_id' => $file_name,
					'file_name' => $file_name
				);
				$this->db->insert('excel_load',$input_array);	
				// echo "123456789";
				// echo $Vdata = file_get_contents('https://www.google.co.th/');
				//echo file_put_contents("test.txt","Hello World. Testing!");		
			}	

		
		}
		//$Vdata = @file_get_contents(base_url().'index.php/report/excel_rawdata_table/'.$file_name);
		//file_put_contents('excel/'.$file_name.'.xls', $Vdata);
		
		
		$url  = base_url().'index.php/report/excel_rawdata_table/'.$file_name; //สร้างตาราง
		$path = 'excel/'.$file_name.'.xls'; //กำหนดDirectory ไฟล์excel
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		//curl_setopt($ch,CURLOPT_TIMEOUT,3000);
		$data = curl_exec($ch); //สร้างไฟล์excel
		curl_close($ch);
		file_put_contents($path,$data);
		// อัพเดจฐานข้อมูล //
		$input = array(
			'excel_time_id' => 1,
			'excel_time_stamp' => date('H:i:s')
		);
		$this->db->where('excel_time_id',$input['excel_time_id']);
		$this->db->update('excel_time',$input);
?>
</body>
</html>

