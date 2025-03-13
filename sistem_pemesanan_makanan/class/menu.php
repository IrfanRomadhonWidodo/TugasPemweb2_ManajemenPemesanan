<?php
class Menu
{
    private $db;

    public function __construct()
    {
        include 'koneksi.php';
    }

    // Menampilkan semua menu
    public function tampil_menu()
    {
        return $this->db->query("SELECT * FROM menu_items");
    }

    // Menambahkan menu baru
    public function tambah_menu($menu_id, $name, $price, $category)
    {
        // Cek apakah menu_id sudah ada
        $cek = $this->db->prepare("SELECT COUNT(*) FROM menu_items WHERE menu_id = ?");
        $cek->execute([$menu_id]);
        if ($cek->fetchColumn() > 0) {
            return "Error: ID menu sudah digunakan!";
        }

        // Insert data menu baru
        $stmt = $this->db->prepare("INSERT INTO menu_items (menu_id, name, price, category) VALUES (?, ?, ?, ?)");
        $stmt->execute([$menu_id, $name, $price, $category]);

        return "Menu berhasil ditambahkan!";
    }


    public function hapus_menu($menu_id)
{
    $stmt = $this->db->prepare("DELETE FROM menu_items WHERE menu_id = ?");
    return $stmt->execute([$menu_id]);
}


    // Melihat detail menu berdasarkan ID
    public function lihat_menu($menu_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM menu_items WHERE menu_id = ?");
        $stmt->execute([$menu_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengedit menu berdasarkan ID
    public function edit_menu($menu_id, $name, $price, $category)
    {
        $stmt = $this->db->prepare("UPDATE menu_items SET name = ?, price = ?, category = ? WHERE menu_id = ?");
        return $stmt->execute([$name, $price, $category, $menu_id]);
    }
    
}
?>
