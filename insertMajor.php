<?php

$MAJOR = $_POST['major'];
$FACULTY_ID = $_POST['id_faculty'];
include "koneksi.php";
mysqli_query($con, "INSERT INTO `major` (`NAME`, `FACULTY_ID`) VALUES ('$MAJOR', '$FACULTY_ID')");
header("location:addMajor.php");