<?php include("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Cisarua</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMK Negeri 1 Cisarua</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="kelola.php">Pendaftaran</a>
        <a class="nav-link" href="tugas crud guru/index.php">data guru</a>
        <a class="nav-link" href="data_upload.php">data upload</a>
        <a class="nav-link" href="logout.php">Logut</a>

      </div>
    </div>
  </div>
</nav>
<div class="container">
    <h2>Data Guru</h2><br>
    <a class="btn btn-primary" href="form-upload.php" role="button">Tambah Data</a>
    <br>

    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Ukuran</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM gambar";
                $query = mysqli_query($db, $sql);
                while($data = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$data['id_gambar']."</td>";
                    echo "<td> <img src='image/".$data['nama']."' width='100' height='100'></td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['ukuran']."</td>";
                    echo "<td>".$data['tipe']."</td>";
                    echo "<td>
                    <a href='form-upload.php?edit=" .$data['id_gambar'] ."' class='btn btn-warning'>edit</a>
                    <a href='upload.php?hapus=" . $data['id_gambar'] . "' class='btn btn-danger'>Delete</a>
                          </td>";
                   echo"</tr>";
                }
                
                ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</div>
</body>
</html>