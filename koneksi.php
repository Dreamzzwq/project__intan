<?php
$servername = "localhost";
$username = "root";
$password = "rizkynolimit";
$dbname = "honey";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil!";

// Buat tabel users
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_users) === TRUE) {
    echo "Tabel users berhasil dibuat.";
} else {
    echo "Error membuat tabel users: " . $conn->error;
}

// Buat tabel comments
$sql_comments = "CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if ($conn->query($sql_comments) === TRUE) {
    echo "Tabel comments berhasil dibuat.";
} else {
    echo "Error membuat tabel comments: " . $conn->error;
}

// Form registrasi
echo '<form action="register.php" method="POST">
    <input type="text" name="name" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Daftar</button>
</form>';

// Form login
echo '<form action="login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>';

$conn->close();
?>