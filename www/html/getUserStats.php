<?php
  session_start();

  if(!isset($_SESSION["username"]) ) {
    session_destroy();
    header("Location: login.html");
    exit;
  }

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
        echo "<li>Name: " . $arr->firstName . " " . $arr->lastName . "</li>";
        echo "<li>Hero Name: " . $arr->heroName . "</li>";
        echo "<li> School: " . $arr->school . "</li>";
        echo "<li>BIO: " . $arr->bio . "</li>";
        echo "<li>Rank: " . $arr->playerRank . "</li>";
        echo "<li class=\"hide\"id=\"userType2\">" . $arr->userType2 . "</li>";
        echo "<li class=\"hide\"id=\"skillPoints\">" . $arr->skillPoints . "</li>";
        echo "<li class=\"hide\"id=\"attack\">" . $arr->attack . "</li>";
        echo "<li class=\"hide\"id=\"speed\">" . $arr->speed . "</li>";
        echo "<li class=\"hide\"id=\"defense\">" . $arr->defense . "</li>";
        echo "<li class=\"hide\" id=\"stamina\">" . $arr->stamina . "</li>";
        echo "</ul>";
        break;
      default:
        echo 'Unexpected HTTP code: ', $http_code, "\n";
    }
  }
?>
