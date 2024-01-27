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
		
    $order_id = $order['order_id'];
    $sql .= "SELECT * FROM tb_order WHERE order_id = '$order_id'";
    $result = $conn->query($sql);
    $arr = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($arr, array(
          'order_id' => $row['order_id'],
          'order_total' => $row['order_total']
        ));
      }
    }
    $output = $arr;
  }
  echo json_encode($output);
  $conn->close();
?>
