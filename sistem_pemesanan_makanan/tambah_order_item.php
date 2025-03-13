<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order Item</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-info">Tambah Order Item</h2>

        <div class="card bg-secondary text-light">
            <div class="card-body">
                <form action="controller_order_items.php" method="POST">
                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order ID</label>
                        <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Masukkan Order ID" required>
                    </div>
                    <div class="mb-3">
                        <label for="menu_item_id" class="form-label">Menu ID</label>
                        <input type="text" class="form-control" id="menu_item_id" name="menu_item_id" placeholder="Masukkan Menu ID" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Jumlah" required>
                    </div>
                    <button type="submit" name="tambah_order_item" class="btn btn-info">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
        <div id="peringatan-tambah" class="alert alert-warning d-inline-block mt-2 px-3 py-2 shadow-sm rounded">
            ⚠ <strong>Peringatan:</strong> Jika ingin menambah order item, perhatikan <b>Order ID</b> dan <b>Menu ID</b>.
        </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
