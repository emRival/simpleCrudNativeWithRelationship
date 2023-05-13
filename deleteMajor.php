<?php

include('koneksi.php');
$ID = $_GET['ID'];
mysqli_query($con, "DELETE FROM major WHERE ID = '$ID'");
header("location:addMajor.php");