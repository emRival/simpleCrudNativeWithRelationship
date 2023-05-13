<?php

include "koneksi.php";
$ID = $_POST['ID'];
$NAME = $_POST['major'];
$FACULTY_ID = $_POST['id_faculty'];

mysqli_query($con, "UPDATE `major` SET `NAME` = '$NAME', `FACULTY_ID` = '$FACULTY_ID' WHERE `major`.`ID` = '$ID'");
header("location:addMajor.php");
