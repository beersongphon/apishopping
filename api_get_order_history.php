<?php
  // header('Access-Control-Allow-Origin: *');
  // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  // include("./db_connect.php");

  // $sql = "";
  // $output = array();

  // if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //   $sql .= "SELECT * FROM tb_order 
  //       LEFT JOIN
  //       tb_status
  //       ON
  //       tb_order.status_id = tb_status.status_id
  //       WHERE tb_order.status_id = '2'";
  //   $content = file_get_contents('php://input');
  //   $order = json_decode($content, true);
		
  //   $user_id = $order['user_id'];
  //   if(strlen($user_id)>0){
  //       $sql .= " AND user_id = '$user_id'";
  //   }
  //   $result = $conn->query($sql);
  //   $arr = array();
  //   if ($result->num_rows > 0) {
  //     while($row = $result->fetch_assoc()) {
  //       array_push($arr,$row);
  //     }
  //   }
  //   $output = $arr;
  // }
  // echo json_encode($output);
  // $conn->close();
?>

<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql .= "SELECT * FROM tb_order 
        LEFT JOIN
        tb_status
        ON
        tb_order.status_id = tb_status.status_id
        WHERE tb_order.status_id = '2'";
    $content = file_get_contents('php://input');
    $order = json_decode($content, true);
		
    $user_id = $order['user_id'];
    if(strlen($user_id)>0){
        $sql .= " AND tb_order.user_id = '$user_id'";
    }
    $result = $conn->query($sql);
    $arr_data = array();
    if ($result->num_rows > 0) {
      // output data of each row
      while($row1 = $result->fetch_assoc()) {
        $sqls = "SELECT * FROM tb_order_detail 
        INNER JOIN tb_product
        ON tb_product.product_id = tb_order_detail.product_id 
        WHERE tb_order_detail.order_id = '$row1[order_id]'";
        $result2 = $conn->query($sqls);
        $arr_image = array();
        if ($result2->num_rows > 0) {
          while($row2 = $result2->fetch_assoc()) {
            array_push($arr_image, $row2);      
          }     
        }
        $jsonRow = array(
          "order_id"=> $row1["order_id"],
          "user_id"=> $row1["user_id"],
          "order_name"=> $row1["order_name"],
          "order_address"=> $row1["order_address"],
          "order_tel"=> $row1["order_tel"],
          "order_email"=> $row1["order_email"],
          "order_date"=> $row1["order_date"],
          "order_total"=> $row1["order_total"],
          "status_id"=> $row1["status_id"],
          "status_name"=> $row1["status_name"],
          "data"=> $arr_image,
        );
        array_push($arr_data, $jsonRow);      
      }
    } 
    $output = $arr_data;
  }
  echo json_encode($output);
  $conn->close();
?>
