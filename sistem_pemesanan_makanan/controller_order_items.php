<?php
require 'class/order_items.php';
$orderItems = new OrderItems();

// Tambah item ke dalam order
if (isset($_POST['tambah_order_item'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];

    $orderItems->tambah_order_item($order_id, $menu_item_id, $quantity);
    header('location:index.php');
}

// Edit jumlah item dalam order
if (isset($_POST['edit_order_item'])) {
    $order_id = $_POST['order_id'];
    $menu_item_id = $_POST['menu_item_id'];
    $quantity = $_POST['quantity'];

    $orderItems->edit_order_item($order_id, $menu_item_id, $quantity);
    header('location:index.php');
}

// Hapus item dari order
if (isset($_GET['order_id']) && isset($_GET['menu_item_id'])) {
    $order_id = $_GET['order_id'];
    $menu_item_id = $_GET['menu_item_id'];

    $orderItems->hapus_order_item($order_id, $menu_item_id);
    header('location:index.php');
}
?>
