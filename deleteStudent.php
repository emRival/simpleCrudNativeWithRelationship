<?php

include('koneksi.php');
$ID = $_GET['ID'];
mysqli_query($con, "DELETE FROM student WHERE ID = '$ID'");
header("location:index.php");