<?php

// Create connection
$conn = new mysqli('localhost', 'root', '', 'db_koko-garden');

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
$id_tanaman = $_GET['id_tanaman'];
// echo $id_tanaman;

$sql = "SELECT * FROM tb_tanaman WHERE id_tanaman='$id_tanaman'";
$result = mysqli_query($conn, $sql);

$arr = mysqli_fetch_array($result);

$data = array('nama' => $arr['nama_tanaman'], 'harga' => $arr['harga']);

echo json_encode($data);

// echo print_r($nama);

// echo $nama['nama_tanaman'];

// echo $sql;
