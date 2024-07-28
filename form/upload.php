<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">Upload Esign BSRE</h2>
        <form action="uploadaksi.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
				<label>URL BSRE:</label>
				<input type="text" class="form-control" placeholder="Masukkan URL BSRE" name="base_url" required="required">
			</div>
            <div class="form-group mb-3">
				<label>username :</label>
				<input type="text" class="form-control" placeholder="Masukkan username" name="username" required="required">
			</div>
            <div class="form-group mb-3">
				<label>password :</label>
				<input type="password" class="form-control" placeholder="Masukkan password" name="password" required="required">
			</div>
            <div class="form-group mb-3">
				<label>NIK :</label>
				<input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" required="required">
			</div>
            <div class="form-group mb-3">
				<label>Passphrase :</label>
				<input type="password" class="form-control" placeholder="Masukkan passphrase" name="passphrase" required="required">
			</div>
            <div class="form-group mb-3">
				<label>Jumlah Halaman :</label>
				<input type="text" class="form-control" placeholder="Masukkan Jumlah Halaman" name="halaman" required="required">
			</div>
            <div class="form-group mb-3">
				<label>Link QR :</label>
				<input type="text" class="form-control" placeholder="Masukkan Link QR" name="link" required="required">
			</div>
            <div class="form-group mb-3">
                <label>pdf :</label>
                <input type="file" name="pdf" required="required" accept=".pdf">
                <p style="color: red">Ekstensi yang diperbolehkan .pdf</p>
            </div>
            <input type="submit" name="" value="Simpan" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>