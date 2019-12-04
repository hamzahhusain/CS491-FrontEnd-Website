<?php
  session_start();

  if(!isset($_SESSION["username"])) {
    session_destroy();
    header("Location: login.html");
    exit;
  }

  $user_to_add = $_POST["user_to_add"];
  $class_id = $_POST["class_id"];
  $username = $_SESSION["username"];
  $password = $_SESSION["password"];

  $url = 'https://web.njit.edu/~gm247/CS491/add_student_to_class.php';

  $fields = [
      'password' => $password,
      'username' => $username,
      'user_to_add' => $user_to_add,
      'class_id' => $class_id,
  ];

  $fields_string = http_build_query($fields);

  $ch = curl_init();

  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);

  if (!curl_errno($ch)) {
    switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
      case 200:

        $arr = json_decode($result);

        break;
      default:
        echo 'Unexpected HTTP code: ', $http_code, "\n";
    }
  }
?>
