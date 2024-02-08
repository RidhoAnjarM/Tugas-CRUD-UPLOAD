<?php
include "config.php";
if(isset($_POST['save']))
    if($_POST['save']=='add'){
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $path = "image/".$nama_file;
        if(move_uploaded_file($tmp_file, $path)){
            $query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES('".$nama_file."','".$ukuran_file."', '".$tipe_file."')";
            $sql = mysqli_query($db,$query);
            if($sql){
                header("location: data_upload.php");
           
        }else{
            echo "Maaf,Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='from-upload.php'>Kembali Ke From</a>";
    }
}else{
    echo "maaf,gambar gagal untuk di upload.";
    echo "maaf<br><a href='from-upload.php'>Kembali Ke Form</a>";
} 
}else if ($_POST['save']=='edit'){
      $id = $_POST['id_gambar'];

      $nama_file = $_FILES['gambar']['name'];
      $ukuran_file = $_FILES['gambar']['size'];
      $tipe_file = $_FILES['gambar']['type'];
      $tmp_file = $_FILES['gambar']['tmp_name'];

      $path = "image/" . $nama_file;
        
      $sql = "UPDATE gambar SET nama='" .$nama_file . "', ukuran='" . $ukuran_file . "', tipe='" . $tipe_file . "' WHERE id_gambar='$id'";
      $query = mysqli_query($db, $sql);

      if ($query){
        header('location: data_upload.php?status=sukses');
      }else{
        header('location: data_upload.php?status=gagal');
      }

    }

  
if(isset($_GET['hapus'])){


    $id_gambar=$_GET['hapus'];


    $sql="DELETE FROM gambar WHERE id_gambar ='$id_gambar';";
    $query= mysqli_query($db,$sql);


    if( $query ){
        header('location:data_upload.php?status=sukses');
    }else{
        header('location:data_upload.php?status=gagal');
    }
}
?>
