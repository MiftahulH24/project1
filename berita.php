<?php
if(isset($_POST['simpan'])){
	if(isset($_GET['edit'])){
		//UBAH
		mysqli_query($conn, "UPDATE berita SET tgl='$_POST[tgl]', judul='$_POST[judul]', isi='$_POST[isi]' WHERE id='$_GET[edit]'");
		
		if(!empty($_FILES['file']['tmp_name'])){
			move_uploaded_file($_FILES['file']['tmp_name'],"./image/file_".$_GET['edit'].".png");
		}
		echo "
		<script>
			alert('Sukses Ubah');
			document.location='?berita';
		</script>
		";
	}
	else{
		//SIMPAN
		mysqli_query($conn, "INSERT berita SET tgl='$_POST[tgl]', judul='$_POST[judul]', isi='$_POST[isi]'");
		
		$last_id=$conn->insert_id;
		if(!empty($_FILES['file']['tmp_name'])){
			move_uploaded_file($_FILES['file']['tmp_name'],"./image/file_".$last_id.".png");
		}
		
		echo "
		<script>
			alert('Sukses Simpan');
			document.location='?berita';
		</script>
		";
	}
}

if(isset($_GET['hapus'])){
	//HAPUS
	mysqli_query($conn, "DELETE FROM berita WHERE id='$_GET[hapus]'");
	
	echo "
	<script>
		alert('Sukses Hapus');
		document.location='?berita';
	</script>
	";
}
if(isset($_GET['edit'])){
	$edit=mysqli_fetch_array(mysqli_query($conn, "SELECT*FROM berita WHERE id='$_GET[edit]'"));
	$isi_tgl=$edit['tgl'];
	$isi_judul=$edit['judul'];
	$isi_isi=$edit['isi'];
}
else{
	$isi_tgl='';
	$isi_judul='';
	$isi_isi='';
}
?>

<div class="row">
    <div class="col-sm-8">
      <h2>Share Your Information</h2>
      <div class="card" style="padding:5px">
		<h4>Input Berita</h4>
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<td>No</td>
				<td>Tgl</td>
				<td>Judul</td>
				<td>Isi</td>
				<td>Foto</td>
				<td>Aksi</td>
			</tr>
			<?php
			//TAMPIL
			$n=1;
			$data=mysqli_query($conn, "SELECT*FROM berita");
			while($read=mysqli_fetch_array($data)){
				echo "
				<tr>
					<td>".$n++."</td>
					<td>$read[tgl]</td>
					<td>$read[judul]</td>
					<td>$read[isi]</td>
					<td><img src='image/file_$read[id].png' width='50px' class='card'></td>
					<td>
						<a href='?berita&edit=$read[id]'class='btn btn-warning btn-sm'>Edit</a>
						<a href='?berita&hapus=$read[id]'class='btn btn-danger btn-sm'>Hapus</a>
					</td>
				</tr>
				";
			}
			?>
		</table>
		</div>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-4">
		<div class="card" style="padding:5px">
		<h4>Input Berita</h4>
		<form method="post" enctype="multipart/form-data">
			Tgl:<input type="date" class="form-control" name="tgl" value="<?php echo $isi_tgl; ?>">
			<br>
			Judul:<input type="text" class="form-control" name="judul" value="<?php echo $isi_judul; ?>">
			<br>
			Isi:<textarea class="form-control" name="isi"><?php echo $isi_isi; ?></textarea>
			<br>
			Foto:<input type="file" class="form-control" name="file">
			<br>
			<input type="submit" class="btn btn-info btn-sm" name="simpan" value="Simpan">
		</form>
		</div>
    </div>
  </div>