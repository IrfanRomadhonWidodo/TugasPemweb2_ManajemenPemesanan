<?php
class Order
{
    private $db;

    public function __construct()
    {
        include 'koneksi.php';
    }

    // Menampilkan semua pesanan
    public function tampil_orders()
    {
        return $this->db->query("SELECT * FROM orders");
    }

    // Menambahkan pesanan baru
    public function tambah_order($orders_id, $user_id, $order_date, $status)
    {
        // Cek apakah orders_id sudah ada
        $cek = $this->db->prepare("SELECT COUNT(*) FROM orders WHERE orders_id = ?");
        $cek->execute([$orders_id]);
        if ($cek->fetchColumn() > 0) {
            return "Error: ID order sudah digunakan!";
        }

        // Insert data order baru
        $stmt = $this->db->prepare("INSERT INTO orders (orders_id, user_id, order_date, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$orders_id, $user_id, $order_date, $status]);

        return "Order berhasil ditambahkan!";
    }

    // Menghapus pesanan berdasarkan ID
    public function hapus_order($orders_id)
    {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE orders_id = ?");
        return $stmt->execute([$orders_id]);
    }

    // Melihat detail pesanan berdasarkan ID
    public function lihat_order($orders_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE orders_id = ?");
        $stmt->execute([$orders_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengedit pesanan berdasarkan ID
    public function edit_order($orders_id, $user_id, $order_date, $status)
    {
        $stmt = $this->db->prepare("UPDATE orders SET user_id = ?, order_date = ?, status = ? WHERE orders_id = ?");
        return $stmt->execute([$user_id, $order_date, $status, $orders_id]);
    }
}
?>
