<?php
class OrderItems
{
    private $db;

    public function __construct()
    {
        include 'koneksi.php';
    }

    // Menampilkan semua order item
    public function tampil_order_items()
    {
        return $this->db->query("SELECT * FROM order_items");
    }

    // Menambahkan item ke dalam order
    public function tambah_order_item($order_id, $menu_item_id, $quantity)
    {
        // Cek apakah order_id dan menu_item_id sudah ada
        $cek = $this->db->prepare("SELECT COUNT(*) FROM order_items WHERE order_id = ? AND menu_item_id = ?");
        $cek->execute([$order_id, $menu_item_id]);
        if ($cek->fetchColumn() > 0) {
            return "Error: Item sudah ada dalam pesanan ini!";
        }

        // Insert data order item
        $stmt = $this->db->prepare("INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$order_id, $menu_item_id, $quantity]);

        return "Item berhasil ditambahkan ke pesanan!";
    }

    // Menghapus item dari pesanan
    public function hapus_order_item($order_id, $menu_item_id)
    {
        $stmt = $this->db->prepare("DELETE FROM order_items WHERE order_id = ? AND menu_item_id = ?");
        
        if ($stmt->execute([$order_id, $menu_item_id])) {
            return "deleted"; // Berhasil dihapus
        } else {
            $errorInfo = $stmt->errorInfo(); // Ambil informasi error
            return "error: " . $errorInfo[2]; // Kembalikan pesan error dari database
        }
    }
    

    // Melihat detail item dalam order tertentu
    public function lihat_order_item($order_id, $menu_item_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM order_items WHERE order_id = ? AND menu_item_id = ?");
        $stmt->execute([$order_id, $menu_item_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengupdate jumlah item dalam order
    public function edit_order_item($order_id, $menu_item_id, $quantity)
    {
        $stmt = $this->db->prepare("UPDATE order_items SET quantity = ? WHERE order_id = ? AND menu_item_id = ?");
        return $stmt->execute([$quantity, $order_id, $menu_item_id]);
    }
}
?>
