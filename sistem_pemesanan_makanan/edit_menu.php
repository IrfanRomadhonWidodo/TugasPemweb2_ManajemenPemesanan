<?php
require 'class/Menu.php';
$menu = new Menu();

if (isset($_GET['id'])) {
    $menu_id = $_GET['id'];
    $lihat_menu = $menu->lihat_menu($menu_id);
    if (!$lihat_menu) {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Menu</h2>
        <div class="card">
            <div class="card-body">
                <form action="controller_menu.php" method="POST">
                    <div class="form-group">
                        <label for="menu_id">Menu ID</label>
                        <input readonly type="text" class="form-control" id="menu_id" name="menu_id" value="<?= $lihat_menu['menu_id'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Menu</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $lihat_menu['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?= $lihat_menu['price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="Makanan" <?= $lihat_menu['category'] == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                            <option value="Minuman" <?= $lihat_menu['category'] == 'Minuman' ? 'selected' : '' ?>>Minuman</option>
                        </select>
                    </div>
                    <button type="submit" name="edit_menu" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
