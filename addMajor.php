<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/e81773e2de.js" crossorigin="anonymous"></script>
  <title>Add Major</title>
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
          <li class="nav-item">
            <a class="nav-link" href="addFaculty.php">ADD FACULTY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="addMajor.php">ADD MAJOR</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

<h2 class="mt-4">Add Major</h2>

    <div class="card shadow bg-body-tertiary rounded mt-4">
      <div class="card-body">
        <form action="insertMajor.php" method="post">
          <div class="row">
            <div class="col">
              <input class="form-control me-2" name="major" placeholder="Name" required>
            </div>
            <div class="col">
              <?php
              include('koneksi.php');
              $query = mysqli_query($con, "SELECT * FROM faculty");
              ?>
              <select class="form-control me-2" name="id_faculty" required>
                <option value="">Select Faculty</option>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <option value="<?php echo $row['ID'] ?>"><?php echo $row['NAME'] ?></option>
                <?php
                }
                ?>
              </select>

            </div>
            <div class="col-md-1">
              <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-plus"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- GET DATA -->
    <?php
    include('koneksi.php');
    $query = mysqli_query($con, "SELECT * FROM major");
    ?>

    <table class="table mt-4">
    <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NAME</th>
      <th scope="col">FACULTY</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td scope="row"><?php echo $row['ID'] ?></td>
            <td><?php echo $row['NAME'] ?></td>
            <td>
              <?php
              include('koneksi.php');
              $faculty_id = $row['FACULTY_ID'];
              $query_faculty = "SELECT NAME FROM faculty WHERE ID='$faculty_id'";
              $result_faculty = mysqli_query($con, $query_faculty);
              $faculty = mysqli_fetch_array($result_faculty);
              echo $faculty['NAME'];
              ?>
            </td>
            <td style="width: 5%">
              <a href="editMajor.php? ID= <?php echo $row['ID'] ?>" class="btn btn-outline-success">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
            </td>

            <td style="width: 5%">
              <a href="deleteMajor.php? ID= <?php echo $row['ID'] ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-trash"></i>
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>