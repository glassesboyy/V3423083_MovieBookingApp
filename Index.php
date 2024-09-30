<?php
require('Form.php'); // Pastikan file Form.php di-load

// Membuat objek Form
$forminput = new Form("", "Input User dan Booking");

// Menambahkan field untuk User dan Booking
$forminput->addField("nama", "Nama Pemesan", "text");
$forminput->addField("email", "Email", "email");
$forminput->addField("telepon", "Nomor Telepon", "tel");
$forminput->addField("film", "Film", "dropdown", ["Film A", "Film B", "Film C"]); // Ganti dengan nama film yang sesuai
$forminput->addField("tanggalFilm", "Tanggal Film", "date");
$forminput->addField("waktuFilm", "Waktu Film Tayang", "time");

// Ubah 'jumlahTiket' untuk tidak menerima nilai negatif
$forminput->addField("jumlahTiket", "Jumlah Tiket", "number", [], ['min' => 0]); // Menambahkan min 0

// Ubah 'kursi' menjadi dropdown dari A1 hingga A10
$kursiOptions = [];
for ($i = 1; $i <= 10; $i++) {
    $kursiOptions[] = 'A' . $i; // Membuat array dari A1 hingga A10
}
$forminput->addField("kursi", "Kursi", "dropdown", $kursiOptions); // Menggunakan array untuk dropdown

$forminput->addField("metodePembayaran", "Metode Pembayaran", "radio", ["Transfer Bank", "Cash"]);
$forminput->addField("catatan", "Catatan Tambahan", "textarea");

// Menampilkan form
$forminput->displayForm();

// Proses data setelah form disubmit
if (isset($_POST['tombol'])) {
    // Validasi bahwa semua field terisi
    if (
        !empty($_POST["nama"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["telepon"]) &&
        !empty($_POST["film"]) &&
        !empty($_POST["tanggalFilm"]) &&
        !empty($_POST["waktuFilm"]) &&
        !empty($_POST["jumlahTiket"]) &&
        $_POST["jumlahTiket"] >= 0 && // Memastikan jumlah tiket tidak negatif
        !empty($_POST["kursi"]) // Pastikan kursi tidak kosong
    ) {
        // Ambil data dari input
        $name = $_POST["nama"];
        $email = $_POST["email"];
        $telepon = $_POST["telepon"];
        $film = $_POST["film"];
        $tanggalFilm = $_POST["tanggalFilm"];
        $waktuFilm = $_POST["waktuFilm"];
        $jumlahTiket = $_POST["jumlahTiket"];
        $kursi = $_POST["kursi"]; // Ambil nilai dari dropdown kursi
        $metodePembayaran = isset($_POST["metodePembayaran"]) ? $_POST["metodePembayaran"] : '';
        $catatan = $_POST["catatan"];

        // Tampilkan hasil
        echo "<h3>Detail Pemesanan:</h3>";
        echo "Nama Pemesan: $name<br>";
        echo "Email: $email<br>";
        echo "Nomor Telepon: $telepon<br>";
        echo "Film: $film<br>";
        echo "Tanggal Film: $tanggalFilm<br>";
        echo "Waktu Film Tayang: $waktuFilm<br>";
        echo "Jumlah Tiket: $jumlahTiket<br>";
        echo "Kursi: $kursi<br>"; // Tampilkan nomor kursi yang dipilih
        echo "Metode Pembayaran: $metodePembayaran<br>";
        echo "Catatan Tambahan: $catatan<br>";
    } else {
        echo "<p style='color: red;'>Silakan isi semua field dengan benar. Pastikan jumlah tiket tidak negatif.</p>";
    }
}
