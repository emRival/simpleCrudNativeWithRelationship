<?php

include('koneksi.php');
$ID = $_GET['ID'];
mysqli_query($con, "DELETE FROM faculty WHERE ID = '$ID'");
header("location:addFaculty.php");