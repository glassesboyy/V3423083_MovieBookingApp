CREATE TABLE IF NOT EXISTS pesanan_film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telepon VARCHAR(15) NOT NULL,
    film VARCHAR(100) NOT NULL,
    tanggal_film DATE NOT NULL,
    waktu_film TIME NOT NULL,
    kursi VARCHAR(5) NOT NULL,
    metode_pembayaran ENUM('Transfer Bank', 'Cash') NOT NULL,
    catatan TEXT
);