<?php
  header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

  include("db_connect.php");

  $output = array(
    "status" => "error"
  );

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = file_get_contents('php://input');
    $user = json_decode($content, true);

    $Username = $user['username'];
    $Password = md5($user["password"]);

    //  check duplicate email
    $sql = "SELECT * FROM tb_user WHERE user_username = '$Username' AND user_password = '$Password'";

    $result = $conn->query($sql);
    if (isset($result) && ($result->num_rows > 0)) {
      $row = $result->fetch_assoc();
      $output['status'] = "success";
      $output['message'] = "Welcome " . $row['user_firstname'] . " " . $row['user_lastname'];
      $output['data'] = $row;
    } else {
      $output['message'] = "Invalid email or password";
    }
  } else {
    $output['message'] = "REQUEST_METHOD Error";
  }
  echo json_encode($output);
  $conn->close();
?>