<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql .= "SELECT img_pro_id, img_product, product_id FROM tb_img_product";
    $content = file_get_contents('php://input');
    $image = json_decode($content, true);
		
    $product_id = $image['product_id'];

    if(strlen($product_id)>0){
        $sql .= " WHERE product_id = '$product_id'";
    }
    $result = $conn->query($sql);
    $arr = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($arr,$row);
      }
    }
    $output = $arr;
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
