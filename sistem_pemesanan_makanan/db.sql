-- Membuat database
CREATE DATABASE pemesanan_makanan;
USE pemesanan_makanan;

-- Tabel menu_items
CREATE TABLE menu_items (
    menu_id VARCHAR(5) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    category VARCHAR(50) NOT NULL
);

-- Tabel orders
CREATE TABLE orders (
    orders_id VARCHAR(5) PRIMARY KEY,
    user_id VARCHAR(5) NOT NULL,
    order_date DATETIME,
    status VARCHAR(20) NOT NULL
);

-- Tabel order_items dengan ON DELETE CASCADE
CREATE TABLE order_items (
    order_id VARCHAR(5) NOT NULL,
    menu_item_id VARCHAR(5) NOT NULL,
    quantity INT NOT NULL CHECK (quantity > 0),
    PRIMARY KEY (order_id, menu_item_id),
    FOREIGN KEY (order_id) REFERENCES orders(orders_id) ON DELETE CASCADE,
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(menu_id) ON DELETE CASCADE
);



-- Insert data dummy ke dalam tabel menu_items
INSERT INTO menu_items (menu_id, name, price, category) VALUES
('M001', 'Nasi Goreng Spesial', 25000, 'Makanan'),
('M002', 'Mie Ayam Bakso', 20000, 'Makanan'),
('M003', 'Ayam Geprek', 22000, 'Makanan'),
('M004', 'Es Teh Manis', 5000, 'Minuman'),
('M005', 'Jus Alpukat', 15000, 'Minuman');

-- Insert data dummy ke dalam tabel orders
INSERT INTO orders (orders_id, user_id, order_date, status) VALUES
('O001', 'U001', '2025-03-12 12:30:00', 'Selesai'),
('O002', 'U002', '2025-03-12 13:00:00', 'Diproses'),
('O003', 'U003', '2025-03-12 14:15:00', 'Dibatalkan');

-- Insert data dummy ke dalam tabel order_items
INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES
('O001', 'M001', 2),
('O001', 'M004', 1),
('O002', 'M002', 1),
('O002', 'M005', 1),
('O003', 'M003', 1),
('O003', 'M004', 2);


