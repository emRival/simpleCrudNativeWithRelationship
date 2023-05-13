<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e81773e2de.js" crossorigin="anonymous"></script>
    <title>Add Student</title>
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

    <div class="container">

        <h2 class="mt-2">Add Student</h2>

        <div class="card shadow bg-body-tertiary rounded mt-4">
            <div class="card-body">
                <form action="insertStudent.php" method="post">
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control me-2" name="nim" placeholder="Isilah dengan NIM anda" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control me-2" name="firstName" placeholder="First" required>
                        </div>
                        <div class="col">
                            <input class="form-control me-2" name="lastName" placeholder="Last" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <select class="form-select" name="majorId" required>
                                <option value="">-- Pilih Major --</option>
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
                                <option value="status">-- Pilih Status --</option>
                                <option value="ACTIVE">Aktif</option>
                                <option value="GRADUATE">Lulus</option>
                                <option value="RESIGN">Berhenti</option>
                                <option value="DROP">DO</option>
                            </select>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button class="btn btn-outline-success" type="submit">Submit</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>
</body>

</html>