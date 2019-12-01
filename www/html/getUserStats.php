<?php
session_start();

$url = 'https://web.njit.edu/~gm247/CS491/get_user_stats.php';

$fields = [
    'password' => $_SESSION["password"],
    'username' => $_SESSION["username"],
    'user'     => $_SESSION["username"],
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

      echo "<ul>";

      foreach($arr as $key => $value) {
          echo "<li>" . $key . " " . $value . "</li>";
      }

      echo "</ul>";

      break;
    default:
      echo 'Unexpected HTTP code: ', $http_code, "\n";
  }
}
?>
