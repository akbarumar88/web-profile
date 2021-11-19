<?php

require_once('../db.php');

// echo json_encode([
//     'status' => 2,
//     'message' => 'Tes Params',
//     'sent' => (file_get_contents("php://input"))
// ]);
// return;

$jenis = $_POST['jenis'];
if ($jenis == "get") {
    try {
        //code...
        $riwayat_magang = $conn
            ->query("SELECT id, concat(date_format(tglawal, '%b %Y'), ' - ', date_format(tglakhir, '%b %Y')) as periode, tglawal, tglakhir, peran, instansi, deskripsi from riwayat_magang rm ;")
            ->fetchAll();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil get Data Magang.',
            'data' => $riwayat_magang
        ]);
    } catch (Exception $e) {
        //throw $th;
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Get Data Magang. ' . $e->getMessage(),
            'data' => []
        ]);
    }
} else if ($jenis == "tambah") {
    // Tambah
    $tglAwal = $_POST['tglAwal'];
    $tglAkhir = $_POST['tglAkhir'];
    $peran = $_POST['peran'];
    $instansi = $_POST['instansi'];
    $deskripsi = $_POST['deskripsi'];

    try {
        $conn
            ->prepare("INSERT INTO riwayat_magang(idmhs,tglawal,tglakhir,peran,instansi,deskripsi)
                    VALUES(1,'$tglAwal', '$tglAkhir', '$peran', '$instansi', '$deskripsi') ")
            ->execute();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil Tambah Data Magang',
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Tambah Data Magang. ' . $e->getMessage(),
        ]);
        //throw $th;
    }
} else if ($jenis == "ubah") {
    // Ubah
    $id = $_POST['id'];
    $tglAwal = $_POST['tglAwal'];
    $tglAkhir = $_POST['tglAkhir'];
    $peran = $_POST['peran'];
    $instansi = $_POST['instansi'];
    $deskripsi = $_POST['deskripsi'];

    try {
        $conn
            ->prepare("UPDATE riwayat_magang 
                    SET tglawal='$tglAwal',tglakhir='$tglAkhir',peran='$peran',instansi='$instansi',deskripsi='$deskripsi'
                    WHERE id=$id ")
            ->execute();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil Ubah Data Magang',
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Ubah Data Magang. ' . $e->getMessage(),
        ]);
        //throw $th;
    }
}
