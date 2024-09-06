<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Default user XAMPP
$password = ""; // Kosongkan jika tidak ada password
$dbname = "library_db";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Mengenkripsi password

// Menyimpan data ke tabel members
$sql = "INSERT INTO members (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful. You can now <a href='login.html'>login</a>.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
