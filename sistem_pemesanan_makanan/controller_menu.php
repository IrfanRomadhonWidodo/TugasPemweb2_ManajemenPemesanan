<?php
require 'class/menu.php';
$menu = new Menu();

// Tambah menu baru
if (isset($_POST['tambah_menu'])) {
    $menu_id = $_POST['menu_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $menu->tambah_menu($menu_id, $name, $price, $category);
    header('location:index.php');
}

// Edit menu
if (isset($_POST['edit_menu'])) {
    $menu_id = $_POST['menu_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $menu->edit_menu($menu_id, $name, $price, $category);
    header('location:index.php');
}

// Hapus menu
if (isset($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
    $menu->hapus_menu($menu_id);
    header('location:index.php');
}
?>
