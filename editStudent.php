<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e81773e2de.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Data Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addFaculty.php">Add Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addMajor.php">Add Major</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include('koneksi.php');
    $ID = $_GET['ID'];
    $query = mysqli_query($con, "SELECT * FROM student WHERE ID = '$ID'");
    $row = mysqli_fetch_array($query);
    ?>

    <div class="container">

        <h2 class="mt-2">Edit Student</h2>

        <div class="card shadow bg-body-tertiary rounded mt-4">
            <div class="card-body">
                <form action="updateDataStudent.php" method="post">
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control me-2" name="nim" value="<?php echo $row['NIM'] ?>" placeholder="Masukan NIM ?" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control me-2" name="firstName" placeholder="First" value="<?php echo $row['FIRST_NAME'] ?>" required>
                        </div>
                        <div class="col">
                            <input class="form-control me-2" name="lastName" placeholder="Last" value="<?php echo $row['LAST_NAME'] ?>" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <select class="form-select" name="majorId" required>
                                <option value="<?php echo $row['MAJOR_ID'] ?>"><?php
                            include('koneksi.php');
                            $major_id = $row['MAJOR_ID'];
                            $query_major = "SELECT NAME FROM major WHERE ID='$major_id'";
                            $result_major = mysqli_query($con, $query_major);
                            $old_major = mysqli_fetch_array($result_major);
                            echo $old_major['NAME'];
                            ?></option>
                                <?php
                                include 'koneksi.php';
                                $query = mysqli_query($con, "SELECT * FROM major");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $data['ID'] ?>"><?php echo $data['NAME'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="status" required>
                                <option value="<?php echo $row['STATUS'] ?>"><?php echo $row['STATUS'] ?></option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="GRADUATE">GRADUATE</option>
                                <option value="RESIGN">RESIGN</option>
                                <option value="DROP">DROP</option>
                            </select>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button class="btn btn-outline-success" type="submit">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
                    </div>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>
</body>

</html>