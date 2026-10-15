CREATE DATABASE IF NOT EXISTS perpustakaan
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE perpustakaan;

CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun_terbit SMALLINT UNSIGNED NOT NULL,
    stok INT UNSIGNED NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data contoh untuk pengujian (ISBN hanya contoh)
INSERT INTO buku (isbn, judul, penulis, penerbit, tahun_terbit, stok) VALUES
('9780000000001', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 5),
('9780000000002', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980, 3),
('9780000000003', 'Clean Code', 'Robert C. Martin', 'Prentice Hall', 2008, 2);
