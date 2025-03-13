<?php
require 'class/order.php';
$order = new Order();

// Tambah order baru
if (isset($_POST['tambah_order'])) {
    $orders_id = $_POST['orders_id'];
    $user_id = $_POST['user_id'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $order->tambah_order($orders_id, $user_id, $order_date, $status);
    header('location:index.php');
}

// Edit order
if (isset($_POST['edit_order'])) {
    $orders_id = $_POST['orders_id'];
    $user_id = $_POST['user_id'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $order->edit_order($orders_id, $user_id, $order_date, $status);
    header('location:index.php');
}

// Hapus order
if (isset($_GET['orders_id'])) {
    $orders_id = $_GET['orders_id'];
    $order->hapus_order($orders_id);
    header('location:index.php');
}
?>
