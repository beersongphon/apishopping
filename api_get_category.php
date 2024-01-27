<?php
  // header('Access-Control-Allow-Origin: *');
  // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  // include('./db_connect.php');

  // $sql = "SELECT* FROM tb_category";

  // $result = $conn->query($sql);
  // $arr_data = array();
  // if ($result->num_rows > 0) {
  //   // output data of each row
  //   while($row = $result->fetch_assoc()) {
  //   array_push($arr_data,$row);
  //   }
  // } else {
  //   echo "0 results";
  // }
  // echo json_encode($arr_data);
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
    $sql .= "SELECT * FROM tb_category";
    $content = file_get_contents('php://input');
    $category = json_decode($content, true);
		
    $category_id = $category['txtSearch'];

    if(strlen($category_id)>0){
        $sql .= " WHERE category_id = '$category_id'";
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
