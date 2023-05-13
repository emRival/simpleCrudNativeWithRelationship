<?php

include "koneksi.php";
$ID = $_POST['ID'];
$NIM = $_POST['nim'];
$FIRST_NAME = $_POST['fisrtName'];
$LAST_NAME = $_POST['lastName'];
$MAJOR_ID = $_POST['majorId'];
$STATUS = $_POST['status'];

mysqli_query($con, "UPDATE `student` SET `NIM` = '$NIM', `FIRST_NAME` = '$FIRST_NAME', `LAST_NAME` = '$LAST_NAME', `MAJOR_ID` = '$MAJOR_ID', `STATUS` = '$STATUS' WHERE `student`.`ID` = '$ID'");
header("location:index.php");
