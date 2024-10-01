<?php
require('Koneksi.php');  // Memanggil koneksi ke database
require('Form.php');     // Memanggil class form

// Membuat objek Form
$forminput = new Form("", "Pesan Tiket");

// Menambahkan field untuk User dan Booking
$forminput->addField("nama", "Nama Pemesan", "text");
$forminput->addField("email", "Email", "email");
$forminput->addField("telepon", "Nomor Telepon", "tel");
$forminput->addField("film", "Film", "dropdown", ["Film A", "Film B", "Film C"]); // Nama film sesuai kebutuhan
$forminput->addField("tanggalFilm", "Tanggal Film", "date");
$forminput->addField("waktuFilm", "Waktu Film Tayang", "time");

// Ubah 'kursi' menjadi dropdown dari A1 hingga A10
$kursiOptions = [];
for ($i = 1; $i <= 10; $i++) {
    $kursiOptions[] = 'A' . $i; // Membuat array dari A1 hingga A10
}
$forminput->addField("kursi", "Kursi", "dropdown", $kursiOptions);

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
        !empty($_POST["kursi"])
    ) {
        // Ambil data dari input
        $name = $_POST["nama"];
        $email = $_POST["email"];
        $telepon = $_POST["telepon"];
        $film = $_POST["film"];
        $tanggalFilm = $_POST["tanggalFilm"];
        $waktuFilm = $_POST["waktuFilm"];
        $kursi = $_POST["kursi"];
        $metodePembayaran = isset($_POST["metodePembayaran"]) ? $_POST["metodePembayaran"] : '';
        $catatan = $_POST["catatan"];

        // Query untuk memasukkan data ke database
        $sql = "INSERT INTO pesanan_film (nama_pemesan, email, telepon, film, tanggal_film, waktu_film, kursi, metode_pembayaran, catatan)
                VALUES ('$name', '$email', '$telepon', '$film', '$tanggalFilm', '$waktuFilm', '$kursi', '$metodePembayaran', '$catatan')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Pemesanan berhasil ditambahkan ke database.</p>";

            // Menampilkan detail pemesanan
            echo "<h2>Detail Pemesanan:</h2>";
            echo "<table border='1' width='25%' align='left'>";
            echo "<tr><td>Nama Pemesan</td><td>$name</td></tr>";
            echo "<tr><td>Email</td><td>$email</td></tr>";
            echo "<tr><td>Telepon</td><td>$telepon</td></tr>";
            echo "<tr><td>Film</td><td>$film</td></tr>";
            echo "<tr><td>Tanggal Film</td><td>$tanggalFilm</td></tr>";
            echo "<tr><td>Waktu Film</td><td>$waktuFilm</td></tr>";
            echo "<tr><td>Kursi</td><td>$kursi</td></tr>";
            echo "<tr><td>Metode Pembayaran</td><td>$metodePembayaran</td></tr>";
            echo "<tr><td>Catatan Tambahan</td><td>$catatan</td></tr>";
            echo "</table>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<p style='color: red;'>Silakan isi semua field dengan benar.</p>";
    }
}

