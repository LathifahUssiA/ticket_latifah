<?php
$host = "localhost";
$user = "root" ;
$pass = "";
$db = "tiket_lathifah";

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    // koneksi berhasil
    // echo "koneksi berhasil";
}