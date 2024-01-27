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
  $sql .= "SELECT * FROM tb_category";
  $content = file_get_contents('php://input');
  $category = json_decode($content, true);

  $category_id = $category['category_id'];
 
  if (strlen($category_id) > 0) {
    $sql .= " WHERE category_id = '$category_id'";
  }
  $result = $conn->query($sql);
  $arr = array();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $output = $row;
  }
} else {
  $output['message'] = "REQUEST_METHOD Error";
}
echo json_encode($output);
$conn->close();
?>
