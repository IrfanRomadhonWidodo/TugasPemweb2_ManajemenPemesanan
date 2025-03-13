<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-info">Tambah Menu</h2>
        
        <div class="card bg-secondary text-light">
            <div class="card-body">
                <form action="controller_menu.php" method="POST">
                    <div class="mb-3">
                        <label for="menu_id" class="form-label">Menu ID</label>
                        <input type="text" class="form-control" id="menu_id" name="menu_id" placeholder="Masukkan ID Menu" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Menu" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                    <button type="submit" name="tambah_menu" class="btn btn-info">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
        <div id="peringatan-tambah" class="alert alert-warning d-inline-block mt-2 px-3 py-2 shadow-sm rounded">
        ⚠ <strong>Peringatan:</strong> Jika ingin menambah data makanan perhatikan<b>Menu ID</b>.
    </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
