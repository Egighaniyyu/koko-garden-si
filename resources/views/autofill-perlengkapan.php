<?php

// Create connection
$conn = new mysqli('localhost', 'root', '', 'db_koko-garden');

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
$id_perlengkapan = $_GET['id_perlengkapan'];
// echo $id_perlengkapan;

$sql = "SELECT * FROM tb_perlengkapan WHERE id_perlengkapan='$id_perlengkapan'";
$result = mysqli_query($conn, $sql);

$arr = mysqli_fetch_array($result);

$data = array('nama' => $arr['nama_perlengkapan'], 'harga' => $arr['harga']);




echo json_encode($data);

// echo print_r($nama);

// echo $nama['nama_tanaman'];

// echo $sql;
