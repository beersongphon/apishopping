<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include("db_connect.php");

$sql = "";
$output = array(
  "status" => "error"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql .= "SELECT * FROM tb_brand";
  $content = file_get_contents('php://input');
  $brand = json_decode($content, true);

  $brand_id = $brand['brand_id'];
 
  if (strlen($brand_id) > 0) {
    $sql .= " WHERE brand_id = '$brand_id'";
  }
  $result = $conn->query($sql);
  $arr = array();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $output['status'] = "success";
    $output['data'] = $row;
  } else {
    $output['data'] = $arr;
  }
} else {
  $output['message'] = "REQUEST_METHOD Error";
}
echo json_encode($output);
$conn->close();
?>
