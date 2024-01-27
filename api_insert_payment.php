<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  date_default_timezone_set("Asia/Bangkok");

  include("db_connect.php");
	
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $folderPath = "pay/";
    $content = file_get_contents('php://input');	  
    $payment = json_decode($content, true);
    
    $image_parts = explode(";base64,", $payment['image']);      
    $image_type_aux = explode("image/", $image_parts[0]); 
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);      
    $file = $folderPath . uniqid() . '.'.$image_type;
            
    $order_id = $payment['order_id'];
    $pay_date = date("Y-m-d");
    $pay_total = $payment['pay_total'];
    $pay_tel = $payment['pay_tel'];

     
    if(file_put_contents($file, $image_base64)){
      $sql = "INSERT INTO tb_payment (order_id, pay_date, pay_total, pay_slip, pay_tel) VALUES 
      ('$order_id', 
      '$pay_date', 
      '$pay_total', 
      '".substr($file,7)."',
      '$pay_tel')";
      $result = $conn->query($sql);
      if ($result) {
        echo json_encode(['status'=>'success','message'=>'บันทึกข้อมูลสำเร็จ']);
      } else {
        echo json_encode(['status'=>'error','message'=>'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
      }		    
    }      
  } else {
    echo json_encode(['status'=>'error','message'=>'REQUEST_METHOD ผิดพลาด']);
  }
  $conn->close();
?>