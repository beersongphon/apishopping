<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  
  include("./db_connect.php");

  $output = array(
    "status" => "error"
  );

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = file_get_contents('php://input');
    $user = json_decode($content, true);

    $user_firstname = $user['user_firstname'];
    $user_lastname = $user['user_lastname'];
    $user_address = $user['user_address'];
    $user_tel = $user['user_tel'];
    $user_email = $user['user_email'];
    $user_sex = $user['user_sex'];
    $user_username = $user['user_username'];
    $user_password = md5($user["user_password"]);

    $sql = "SELECT * FROM tb_user WHERE user_email = '$user_email' OR user_username = '$user_username'";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) {
      $output['message'] = "ไม่สามารถลงทะเบียนได้ เนื่องจาก email หรือ username นี้มีผู้ใช้งานแล้ว";
    } else {
      $sql = "INSERT INTO tb_user (user_firstname, user_lastname, user_address, user_tel, user_email, user_sex, user_username, user_password, permission_id)
      VALUES ('$user_firstname', '$user_lastname', '$user_address', '$user_tel', '$user_email', '$user_sex', '$user_username', '$user_password', '3')";
      $result = $conn->query($sql);
      if ($result) {
        $output['status'] = "success";
        $output['message'] = "บันทึกข้อมูลสำเร็จ";
      } else {
        $output['message'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
      }
    }
  } else {
	$output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>