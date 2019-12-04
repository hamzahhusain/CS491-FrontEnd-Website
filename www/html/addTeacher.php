<?php
  session_start();

  if(!isset($_SESSION["username"])) {
    session_destroy();
    header("Location: login.html");
    exit;
  }

  $url = 'https://web.njit.edu/~gm247/CS491/create_teacher.php';

  $fields = [
      'password' => $_SESSION["password"],
      'username' => $_SESSION["username"],
      'teacherusername' => $_POST["username"],
      'teacherpassword' => $_POST["password"],
      'firstname' => $_POST["firstName"],
      'lastname' => $_POST["lastName"],
      'school' => $_POST["school"],
      'playerrank' => $_POST["rank"],
      'heroName' => $_POST["heroName"],
  ];
  foreach ($fields as $key) {
    echo $key;
  }
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

        header("Location: thome.html");
        break;
      default:
        echo 'Unexpected HTTP code: ', $http_code, "\n";
    }
?>
