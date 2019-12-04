<?php
  session_start();

  if(!isset($_SESSION["username"])) {
    session_destroy();
    header("Location: login.html");
    exit;
  }

  $username = "teacher";
  $password = "password";
  $class_id = 21;

  $url = 'https://web.njit.edu/~gm247/CS491/get_students_from_class.php';

  $fields = [
      'password' => $password,
      'username' => $username,
      'class_id' => $class_id,
  ];

  $fields_string = http_build_query($fields);

  $ch = curl_init();

  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);
  echo $result;
  if (!curl_errno($ch)) {
    switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
      case 200:

        $status = 0;
        $userType = 0;

        $arr = json_decode($result);
      foreach ($arr as $key => $value) {
        echo $key;
      }

        break;
      default:
        echo 'Unexpected HTTP code: ', $http_code, "\n";
    }
  }
?>
