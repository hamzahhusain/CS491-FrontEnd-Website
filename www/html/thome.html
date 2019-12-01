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

        // Get the modal
        var addStudentModal = document.getElementById('addStudent');
        var createClassModal = document.getElementById('createClass');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == addStudentModal | event.target == createClassModal ) {
                addStudentModal.style.display = "none";
                createClassModal.style.display = "none";
            }
        }
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
      <div class="dropdown">
        <button class="dropbtn">Options
        </button>
        <div class="dropdown-content">
          <a onclick="document.getElementById('addStudent').style.display='block'">Add Student</a>
          <a onclick="document.getElementById('createClass').style.display='block'">Create Class</a>
          <a >Creat Assignment</a>
          <a >Grade Assignment</a>
        </div>
      </div>

    </div>

    <div id="addStudent" class="modal">
      <div class="imgcontainer">
        <span onclick="document.getElementById('addStudent').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

      <div class="panel comicBorder margin bgOrange center animate">
        <h2>Add Student</h2>
        <hr>

        <form  action="#" onsubmit="return addStudent();" method="POST">
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

  <div id="createClass" class="modal">
    <div class="imgcontainer">
      <span onclick="document.getElementById('createClass').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="panel comicBorder margin bgOrange center animate">
      <h2>Create Class</h2>
      <hr>

      <form  action="#" onsubmit="return addStudent();" method="POST">
        <br>
        <input type="text" placeholder="CLASS NAME" name="className" required><br><br>
        <input type="submit" value="Create Class" name="submit">  </input><br><br>
      </form>
    </div>
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
                <td id="upgradePoints">10<td>
              </tr>
            </table>
          </div>

          <hr>

            <div class="comicText">
              <table>
                <col width=20%>
                <col width=60%>
                <col width=20%>
                <tr>
                  <td><button style="display: inline;" onclick="degradeStat('attackBar')">-</button></td>
                  <td><div class="comicText" style="display: inline;">Attack</div></td>
                  <td><button style="display: inline;" onclick="upgradeStat('attackBar')">+</button></td>
                </tr>
              </table>
              <div id="attackBar" class="myStats" style="background-color:red; width:50%;">50</div>
            </div>

            <div class="comicText">
              <table>
                <col width=20%>
                <col width=60%>
                <col width=20%>
                <tr>
                  <td><button style="display: inline;" onclick="degradeStat('defenseBar')">-</button></td>
                  <td><div class="comicText" style="display: inline;">Defense</div></td>
                  <td><button style="display: inline;" onclick="upgradeStat('defenseBar')">+</button></td>
                </tr>
              </table>
              <div id="defenseBar" class="myStats"  style="background-color:purple; width:50%;">50</div>
            </div>

            <div class="comicText">
              <table>
                <col width=20%>
                <col width=60%>
                <col width=20%>
                <tr>
                  <td><button style="display: inline;" onclick="degradeStat('speedBar')">-</button></td>
                  <td><div class="comicText" style="display: inline;">Speed</div></td>
                  <td><button style="display: inline;" onclick="upgradeStat('speedBar')">+</button></td>
                </tr>
              </table>
              <div id="speedBar" class="myStats" style="background-color:orange; width:50%;">50</div>
            </div>

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
          <h2>Classes</h2>
          <hr>
          <?php include 'getClasses.php'; ?>
        </div>
      </div>


    </div>
  </body>

  </html>
