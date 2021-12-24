<?php
//memasukkan koneksi database
require("../koneksi.php");
 
//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id_admin']){
	//membuat variabel id berisi post['id']
	$id_admin = $_POST['id_admin'];
	//query standart select where id
	$view = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin='$id_admin'");
	//jika ada datanya
	if(mysqli_num_rows($view)){
		//fetch data ke dalam veriabel $row_view
		$update = mysqli_fetch_assoc($view);
		//menampilkan data dengan table
        ?>
		    <form method="post" action="">
                <input type="hidden" name="id_admin" value="<?php echo $update['id_admin']; ?>">
                <input type="hidden" name="roleOld" value="<?php echo $update['role']; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Admin</label>
                    <input type="text" name="nama_admin" value="<?php echo $update['nama_admin']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" value="<?php echo $update['username']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Role</label>
                    <select class="form-select" name="role" aria-label="Default select example">
                      <option value="" disabled selected>...Pilih Role...</option>
                      <option value="Super Admin">Super Admin</option>
                      <option value="Admin">Admin</option>
                      <option value="Staff">Staff</option>
                    </select>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Admin</button>
            </form>
		
	<?php }
}
?>