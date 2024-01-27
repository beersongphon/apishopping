<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = file_get_contents('php://input');
    $order = json_decode($content, true);
		
    $sql .= "SELECT COUNT(*) AS user_id FROM tb_user";
    $result = $conn->query($sql);
    $arr = array();
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
    }
    $output = $row;
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
