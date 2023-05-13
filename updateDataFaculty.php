<?php

include "koneksi.php";
$ID = $_POST['ID'];
$NAME = $_POST['faculty'];

mysqli_query($con, "UPDATE `faculty` SET `NAME` = '$NAME' WHERE `faculty`.`ID` = '$ID'");
header("location:addFaculty.php");
