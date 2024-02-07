<?php 

$con = mysqli_connect('localhost', 'root', '', 'employe');

  if (isset($_POST['simpan'])) {

    $Foto_new = $_FILES['foto']['name'];
    $Foto_new2 = $_FILES['fotoKtp']['name'];


   
if($Foto_new && $Foto_new2 != "") {
$ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
$x = explode('.', $Foto_new); //memisahkan nama file dengan ekstensi yang diupload
$x2 = explode('.', $Foto_new2);
$ekstensi = strtolower(end($x));
$ekstensi2 = strtolower(end($x2));
$file_tmp = $_FILES['foto']['tmp_name'];   
$file_tmp2 = $_FILES['fotoKtp']['tmp_name'];
$angka_acak     = rand(1,999);
$angka_acak2     = rand(1,999);
$nama_gambar_baru = $angka_acak.'-'.$Foto_new; //menggabungkan angka acak dengan nama file sebenarnya
$nama_gambar_baru2 = $angka_acak.'-'.$Foto_new2;
  if(in_array($ekstensi, $ekstensi_diperbolehkan) && in_array($ekstensi2, $ekstensi_diperbolehkan) === true)  {     
          move_uploaded_file($file_tmp, 'foto1/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
          move_uploaded_file($file_tmp2, 'foto2/'.$nama_gambar_baru2);
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)

            $sql = "INSERT INTO `gambar` (`foto1`, `foto2`) VALUES ('$nama_gambar_baru','$nama_gambar_baru2')";

            $result = mysqli_query($con, $sql);

            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                     " - ".mysqli_error($con));
            } else {
              //tampil alert dan akan redirect ke halaman index.php
              //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
            }

      } else {     
       //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
          echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='index.php';</script>";
      }
} else {
$sql = "INSERT INTO `pegawai`(`nik`, `nama`) VALUES ('empty.png','empty.png')";

            $result = mysqli_query($con, $sql);
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                     " - ".mysqli_error($con));
            } else {
              //tampil alert dan akan redirect ke halaman index.php
              //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
            }
}

    }
    
    
  

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>GAMBAR</title>
 </head>
 <body>
	 <form method="POST" action="" enctype="multipart/form-data">
	 	              <div class="row">
                    <div class="form-group col">
                      <label>Foto 1 :</label>
                      <input type="file" name="foto" id="foto" placeholder="Masukkan Foto" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Foto 2 :</label>
                      <input type="file" name="fotoKtp" id="fotoKtp" placeholder="Masukkan Foto KTP" class="form-control" required>
                    </div>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-success mb-5 float-right" name="simpan">Submit</button>
	 </form>
 </body>
 </html>