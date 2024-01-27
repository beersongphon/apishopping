<?php
  // header('Access-Control-Allow-Origin: *');
  // include("./db_connect.php");
  // $sql = "";
  // $output = array();

  // if(isset($_GET['id'])) {
  //   $output['id'] = $_GET['id'];
  //   $sql .= "SELECT * FROM tb_img_product 
  //     WHERE product_id = '$_GET[id]' 
  //     ORDER BY product_id ASC LIMIT 8";
  //     $result = $conn->query($sql);
  //     $arr = array();
  //     if ($result->num_rows > 0) {
  //       while($row = $result->fetch_assoc()) {
  //         array_push($arr,$row);
  //       }
  //     } 
  //     else {
  //       echo "0 results";
  //     }
  //     $output['data'] = $arr;
  //   }
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
    $content = file_get_contents('php://input');
    $order = json_decode($content, true);
		
    $product_id = $order['id'];

    if(isset($product_id)) {
      $sql .= "SELECT * FROM tb_img_product 
      WHERE product_id = '$product_id' 
      ORDER BY product_id ASC LIMIT 8";
      $result = $conn->query($sql);
      $arr = array();
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($arr,$row);
        }
      }
      $output['data'] = $arr;
    }   
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
