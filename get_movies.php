<?php
include 'koneksi.php';

$query = isset($_GET['q']) ? $_GET['q'] : '';

$stmt = $conn->prepare("SELECT id, nama_film FROM film WHERE nama_film LIKE ? LIMIT 10");
$searchTerm = "%$query%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = [
        "id" => $row['id'],
        "nama_film" => $row['nama_film']
    ];
} 


echo json_encode($movies);


?>
