<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e81773e2de.js" crossorigin="anonymous"></script>
    <title>Edit Faculty</title>
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
                        <a class="nav-link " aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="addFaculty.php">ADD FACULTY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addMajor.php">ADD MAJOR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include('koneksi.php');
    $ID = $_GET['ID'];
    $query = mysqli_query($con, "SELECT * FROM faculty WHERE ID = '$ID'");
    $row = mysqli_fetch_array($query);
    ?>

    <div class="container">

    <h2 class="mt-4">Edit Faculty</h2>

        <div class="card shadow bg-body-tertiary rounded mt-4">
            <div class="card-body">
                <form class="d-flex" action="updateDataFaculty.php" method="post">
                    <input class="form-control me-2" name="faculty" placeholder="Masukan Nama Fakultas ?" value="<?php echo $row['NAME'] ?>" required>
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-plus"></i></button>
                    <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>