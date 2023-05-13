<?php

$NIM = $_POST['nim'];
$FIRST_NAME = $_POST['firstName'];
$LAST_NAME = $_POST['lastName'];
$MAJOR_ID = $_POST['majorId'];
$STATUS = $_POST['status'];
include "koneksi.php";
mysqli_query($con, "INSERT INTO `student` (`NIM`, `FIRST_NAME`,`LAST_NAME`,`MAJOR_ID`,`STATUS`) VALUES ('$NIM', '$FIRST_NAME','$LAST_NAME','$MAJOR_ID','$STATUS')");
header("location:index.php");