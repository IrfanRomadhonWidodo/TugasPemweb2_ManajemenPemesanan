<?php
require 'class/menu.php';
require 'class/order.php';
require 'class/order_items.php';

$menu = new Menu();
$order = new Order();
$orderItems = new OrderItems();

$tampil_orders = $order->tampil_orders();
$tampil_order_items = $orderItems->tampil_order_items();
$tampil_menu = $menu->tampil_menu(); 

$no = 1;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Orders, Order Items & Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-info">Data Menu</h2>
        <a class="btn btn-info mb-3" href="tambah_menu.php">Tambah Menu</a>
        <div class="table-responsive">
            <table class="table table-dark table-hover" id="menuTable">
                <thead class="table-info text-dark">
                    <tr>
                        <th>No</th>
                        <th>Menu ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tampil_menu as $menuItem) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($menuItem['menu_id']) ?></td>
                            <td><?= htmlspecialchars($menuItem['name']) ?></td>
                            <td><?= htmlspecialchars($menuItem['price']) ?></td>
                            <td><?= htmlspecialchars($menuItem['category']) ?></td>
                            <td>
                                <a href="edit_menu.php?menu_id=<?= $menuItem['menu_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="controller_menu.php?menu_id=<?= $menuItem['menu_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <h2 class="text-center mt-5 mb-4 pt-5 text-info">Data Orders</h2>
        <a class="btn btn-info mb-3" href="tambah_order.php">Tambah Order</a>
        <div class="table-responsive">
            <table class="table table-dark table-hover" id="ordersTable">
                <thead class="table-info text-dark">
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($tampil_orders as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($value['orders_id']) ?></td>
                            <td><?= htmlspecialchars($value['user_id']) ?></td>
                            <td><?= htmlspecialchars($value['order_date']) ?></td>
                            <td><?= htmlspecialchars($value['status']) ?></td>
                            <td>
                                <a href="edit_order.php?id=<?= $value['orders_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="controller_order.php?orders_id=<?= $value['orders_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <h2 class="text-center mt-5 mb-4 pt-5 text-info">Data Order Items</h2>
        <a class="btn btn-info mb-3" href="tambah_order_item.php">Tambah Order Item</a>
        <div class="table-responsive">
            <table class="table table-dark table-hover" id="orderItemsTable">
                <thead class="table-info text-dark">
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Menu Item ID</th>
                        <th>Quantity</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tampil_order_items as $orderItems) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($orderItems['order_id']) ?></td>
                            <td><?= htmlspecialchars($orderItems['menu_item_id']) ?></td>
                            <td><?= htmlspecialchars($orderItems['quantity']) ?></td>
                            <td>
                                <a href="edit_order_item.php?order_id=<?= $orderItems['order_id'] ?>&menu_item_id=<?= $orderItems['menu_item_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="controller_order_items.php?order_id=<?= $orderItems['order_id'] ?>&menu_item_id=<?= $orderItems['menu_item_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#menuTable').DataTable();
            $('#ordersTable').DataTable();
            $('#orderItemsTable').DataTable();
        });
    </script>
</body>

<footer class="text-center mt-5 py-3 text-light bg-secondary">
    <p class="mb-1">Developed with by <strong>Irfan Romadhon Widodo</strong></p>
    <p class="mb-0">Informatics Engineer | Universitas Jenderal Soedirman</p>
    <p class="small">© <?= date('Y') ?> All Rights Reserved.</p>
</footer>

</html>
