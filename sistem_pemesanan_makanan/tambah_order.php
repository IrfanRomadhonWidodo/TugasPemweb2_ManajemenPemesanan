<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-info">Tambah Order</h2>
        
        <div class="card bg-secondary text-light">
            <div class="card-body">
                <form action="controller_order.php" method="POST">
                    <div class="mb-3">
                        <label for="orders_id" class="form-label">Order ID</label>
                        <input type="text" class="form-control" id="orders_id" name="orders_id" placeholder="Masukkan ID Order" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Masukkan ID User" required>
                    </div>
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Tanggal & Waktu Order</label>
                        <input type="datetime-local" class="form-control" id="order_date" name="order_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <button type="submit" name="tambah_order" class="btn btn-info">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
        <div id="peringatan-tambah" class="alert alert-warning d-inline-block mt-2 px-3 py-2 shadow-sm rounded">
        ⚠ <strong>Peringatan:</strong> Jika ingin menambah data order perhatikan <b>Order ID</b> dan <b>User ID</b>.
    </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
