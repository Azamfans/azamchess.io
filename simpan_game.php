<?php
include 'koneksi.php';
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $user = $data->username;
    $pemenang = $data->pemenang;
    $langkah = $data->langkah;
    $level = $data->level;

    $stmt = $conn->prepare("INSERT INTO riwayat_permainan (username, pemenang, jumlah_langkah, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $user, $pemenang, $langkah, $level);
    $stmt->execute();
}
?>