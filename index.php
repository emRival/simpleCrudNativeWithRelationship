<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e81773e2de.js" crossorigin="anonymous"></script>
    <title>Data Mahasiswa</title>
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
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addFaculty.php">ADD FACULTY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addMajor.php">ADD MAJOR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <a href="addStudent.php" class="btn btn-success mt-4 mb-3"><i class="fa-solid fa-plus"></i> Add Student</a>
        <table class="table">

            <!-- GET DATA -->
            <?php
            include('koneksi.php');
            $query = mysqli_query($con, "SELECT * FROM student");
            ?>

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAME</th>
                    <th scope="col">MAJOR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['ID'] ?></th>
                        <td><?php echo $row['NIM'] ?></td>
                        <td><?php echo $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] ?></td>
                        <td>
                            <?php
                            include('koneksi.php');
                            $major_id = $row['MAJOR_ID'];
                            $query_major = "SELECT NAME FROM major WHERE ID='$major_id'";
                            $result_major = mysqli_query($con, $query_major);
                            $major = mysqli_fetch_array($result_major);
                            echo $major['NAME'];
                            ?>
                        </td>

                        <td><?php echo ($row['STATUS'] !== null) ? $row['STATUS'] : '-' ?></td>
                        <td style="width: 5%">
              <a href="editStudent.php? ID= <?php echo $row['ID'] ?>" class="btn btn-outline-success">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
            </td>

            <td style="width: 5%">
              <a href="deleteStudent.php? ID= <?php echo $row['ID'] ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-trash"></i>
              </a>
            </td>
                    </tr>
                    
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>