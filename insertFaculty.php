<?php

$NAME = $_POST['faculty'];
include "koneksi.php";
mysqli_query($con, "INSERT INTO `faculty` (`NAME`) VALUES ('$NAME')");
header("location:addFaculty.php");