<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Student</h1>
    <form method="POST" action="proses_add.php">
        <label>NIM:</label>
        <input type="text" name="NIM" required>
        <br><br>
        <label>First Name:</label>
        <input type="text" name="FIRST_NAME" required>
        <br><br>
        <label>Last Name:</label>
        <input type="text" name="LAST_NAME">
        <br><br>
        <label>Major ID:</label>
        <select name="MAJOR_ID" required>
            <option value="">-- Pilih Jurusan --</option>
            <?php
                include 'koneksi.php';
                $query = mysqli_query($conn, "SELECT * FROM major");
                while($data = mysqli_fetch_array($query)){
            ?>
            <option value="<?php echo $data['ID'] ?>"><?php echo $data['NAME'] ?></option>
            <?php
                }
            ?>
        </select>
        <br><br>
        <label>Status:</label>
        <select name="STATUS" required>
            <option value="">-- Pilih Status --</option>
            <option value="ACTIVE">Aktif</option>
            <option value="GRADUATE">Lulus</option>
            <option value="RESIGN">Berhenti</option>
            <option value="DROP">DO</option>
        </select>
        <br><br>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
