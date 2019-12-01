<?php
  session_start();

  if(!isset($_SESSION["username"]) ) {
    session_destroy();
    header("Location: login.html");
    exit;
  }
?>

<!DOCTYPE html>
  <html>

  <head>
    <title>Capstone Heros</title>
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script>

      var totalSkillPoints = 10;
      var totalSpentPoints = 0;

      $(document).ready(function(){

       });

      function addStudent() {
        alert("Save Complete")
        event.preventDefault();

        $.ajax({
          type: 'POST',
          url: "addStudent.php",
          data: $('#form').serialize(),
          dataType: "text",
          success: function(resultData) {
            alert("Save Complete")
          }
        });
      }

      function upgradeStat(elementId) {
        if (totalSkillPoints > 0){
          if (parseInt(document.getElementById(elementId).style.width) + 1 < 100) {
            totalSkillPoints -= 1;
            document.getElementById("upgradePoints").innerHTML = totalSkillPoints;
            var statValue = parseInt(document.getElementById(elementId).style.width) + 1;
            document.getElementById(elementId).style.width = statValue + "%";
            document.getElementById(elementId).innerText = statValue;
          }
        }
      }

      function degradeStat(elementId) {
          if (parseInt(document.getElementById(elementId).style.width) > 0) {
            totalSkillPoints += 1;
            document.getElementById("upgradePoints").innerHTML = totalSkillPoints;
            var statValue = parseInt(document.getElementById(elementId).style.width) - 1;
            document.getElementById(elementId).style.width = statValue + "%";
            document.getElementById(elementId).innerText = statValue;
          }
      }

    </script>
  </head>

  <body>

    <div class="header comicBorder">
      <h1><?php echo "Welcome " . $_SESSION["username"]; ?></h1>
    </div>

    <div class="topnav comicBorder">
      <a href="#">Home</a>
      <a href="#">Scoreboard</a>
      <a href="logout.php">Log Out</a>
    </div>

    <div class="row">
      <div class="column">

        <div class="comicBorder margin hero">
        </div>

        <div class="panel comicBorder margin bgBlue">
          <h2>My Stats</h2>
          <div>
            <table>
              <tr>
                <td>Skill Points: </td>
                <td id="upgradePoints">10</td>
              </tr>
            </table>
          </div>

          <hr>
<?php
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

$result = json_decode(curl_exec($ch));
function echoStats($statName,$color){
	global $result;
	$statNum = $result->$statName;
	echo '<div class="comicText"> <table> <col width=20%> <col width=60%><col width=20%><tr>';
	echo '<td><button style="display: inline;" onclick="degradeStat('."'".$statName."Bar"."'".')">-</button></td>';
	echo '<td><div class="comicText" style="display: inline;">Attack</div></td>';
	echo '<td><button style="display: inline;" onclick="upgradeStat('."'".$statName."Bar"."'".')">+</button></td>';
	echo "</tr> </table>";
	echo '<div id="'.$statName.'Bar" class="myStats" style="background-color:'.$color.'; width: '.$statNum.'%;">'.$statNum.'</div> </div>';
}

echoStats("attack","red");
echoStats("defense","purple");
echoStats("speed","orange");
echoStats("stamina","orange");
?>

            <button id="submit" style="margin:15 0 0 0">Submit</button>
        </div>

        <div class="panel comicBorder margin bgGreen">
          <h2>User Info</h2>

          <hr>

          <div class="getInfo">
            <?php include 'getUserStats.php'; ?>
          </div>

        </div>
      </div>

      <div class="column">
        <div class="panel comicBorder margin bgOrange">
          <h2>Add Student</h2>

          <hr>

          <form action="#" onsubmit="return addStudent();" method="POST">
            <br>
            <input type="text" placeholder="USERNAME" name="username" required><br><br>
            <input type="password" placeholder="PASSWORD" name="password" required><br><br>
            <input type="text" placeholder="FIRST NAME" name="firstName" required><br><br>
            <input type="text" placeholder="LAST NAME" name="lastName" required><br><br>
            <input type="text" placeholder="SCHOOL" name="school" required><br><br>
            <input type="text" placeholder="HERONAME" name="heroName" required><br><br>
            <input type="text" placeholder="RANK" name="rank" text="0" hidden required><br><br>
            <input type="submit" value="Add Student" name="submit">  </input><br><br>
          </form>
        </div>
      </div>
    </div>
  </body>

  </html>
