<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ucp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$ucp = $_POST['ucp'];
$verify_code = $_POST['verifycode'];

// Cek UCP di database
$ucp_query = "SELECT * FROM playerucp WHERE ucp = '$ucp'";
$ucp_result = $conn->query($ucp_query);

if ($ucp_result->num_rows > 0) {
    // Cek Verification Code di database
    $code_query = "SELECT * FROM playerucp WHERE verifycode = '$verify_code'";
    $code_result = $conn->query($code_query);

    if ($code_result->num_rows > 0) {
        echo "Registration successful!";
        // Proses lebih lanjut bisa ditambahkan di sini, seperti menyimpan session atau mengarahkan user
    } else {
        echo "Verification code not found!";
    }
} else {
    echo "UCP not found!";
}

$conn->close();
?>