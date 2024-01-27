<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql .= "SELECT * FROM tb_brand";
    $content = file_get_contents('php://input');
    $brand = json_decode($content, true);
		
    $brand_id = $brand['txtSearch'];

    if(strlen($brand_id)>0){
        $sql .= " WHERE brand_id = '$brand_id'";
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
