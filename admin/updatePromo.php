<?php
//memasukkan koneksi database
require("../koneksi.php");
 
//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id_promo']){
	//membuat variabel id berisi post['id']
	$id_promo = $_POST['id_promo'];
	//query standart select where id
	$view = mysqli_query($conn, "SELECT * FROM promo WHERE id_promo ='$id_promo'");
	//jika ada datanya
	if(mysqli_num_rows($view)){
		//fetch data ke dalam veriabel $row_view
		$update = mysqli_fetch_assoc($view);
		//menampilkan data dengan table
        ?>
		    <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id_promo" value="<?php echo $update['id_promo']; ?>">
                <input type="hidden" name="gambarOld" value="<?php echo $update['gambar_promo']; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Promo</label>
                    <input type="text" name="namaPromo" value="<?php echo $update['nama_promo']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Gambar</label>
                        <input type="file" name="gambarPromo" value="<?php echo $update['gambar_promo']; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tanggal Mulai Promo</label>
                        <input type="date" name="postedPromo" value="<?php echo $update['posted_promo']; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tanggal Berakhir Promo</label>
                    <input type="date" name="duePromo" value="<?php echo $update['due_promo']; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="updatePromo" class="btn btn-success">Update Promo</button>
            </form>
		
	<?php }
}
?>