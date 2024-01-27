<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = file_get_contents('php://input');
    $report = json_decode($content, true);

    if(isset($report['order_date_from']) && isset($report['order_date_to'])) {
    //   $order_date_from = $report['order_date_from'];
    //   $order_date_to = $report['order_date_to'];
    $total = 0;
      $order_date_from = date("Y-m-d", strtotime($report['order_date_from']));
      $order_date_to = date("Y-m-d", strtotime($report['order_date_to']));
      $sql .= "SELECT 
      tb_order.order_id, 
      tb_order.order_date, 
      tb_order.order_name, 
      tb_order.order_tel, 
      tb_status.status_name,
      tb_order.order_total
      FROM tb_order 
      LEFT JOIN
      tb_user
      ON
      tb_order.user_id = tb_user.user_id 
      LEFT JOIN
      tb_status
      ON
      tb_order.status_id = tb_status.status_id 
      WHERE tb_order.status_id = '2'
      AND tb_order.order_date BETWEEN '$order_date_from' AND '$order_date_to'";      
      $result = $conn->query($sql);
      $arr = array();
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($arr,$row);
          $total += $row["order_total"];
        }
      $output['status'] = "success";
      $output['data'] = $arr;
      $output['total'] = $total;
      }
    } else {
      $output['status'] = "error";
    }
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
