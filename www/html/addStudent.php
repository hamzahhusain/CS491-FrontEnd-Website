<?php
session_start();

$box = $_POST['box'];
foreach ($box as $x) {
    echo $x;
}

?>
