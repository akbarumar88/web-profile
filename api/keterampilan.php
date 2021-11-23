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
    $kategori = $_POST['kategori'];
    try {
        //code...
        $keterampilan = $conn
            ->query("SELECT  bahasa
                        ,id_html AS id
                        ,stat
                    FROM keterampilan k2 
                    WHERE TRUE AND kategori='$kategori';")
            ->fetchAll();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil get Data Keterampilan ' . $kategori . '.',
            'data' => $keterampilan
        ]);
    } catch (Exception $e) {
        //throw $th;
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Get Data Keterampilan ' . $kategori . '. ' . $e->getMessage(),
            'data' => []
        ]);
    }
} else if ($jenis == "tambah") {
    // Tambah
    $tglAwal = $_POST['tglAwal'];
    $tglAkhir = $_POST['tglAkhir'];
    $tingkat = $_POST['tingkat'];
    $instansi = $_POST['instansi'];
    $deskripsi = $_POST['deskripsi'];

    try {
        $conn
            ->prepare("INSERT INTO riwayat_pendidikan(idmhs,tglawal,tglakhir,tingkat,instansi,deskripsi)
                    VALUES(1,'$tglAwal', '$tglAkhir', '$tingkat', '$instansi', '$deskripsi') ")
            ->execute();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil Tambah Data Keterampilan ' . $kategori . '',
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Tambah Data Keterampilan ' . $kategori . '. ' . $e->getMessage(),
        ]);
        //throw $th;
    }
} else if ($jenis == "ubah") {
    // Ubah
    $id = $_POST['id'];
    $tglAwal = $_POST['tglAwal'];
    $tglAkhir = $_POST['tglAkhir'];
    $tingkat = $_POST['tingkat'];
    $instansi = $_POST['instansi'];
    $deskripsi = $_POST['deskripsi'];

    try {
        $conn
            ->prepare("UPDATE riwayat_pendidikan 
                    SET tglawal='$tglAwal',tglakhir='$tglAkhir',tingkat='$tingkat',instansi='$instansi',deskripsi='$deskripsi'
                    WHERE id=$id ")
            ->execute();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil Ubah Data Keterampilan ' . $kategori . '',
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Ubah Data Keterampilan ' . $kategori . '. ' . $e->getMessage(),
        ]);
        //throw $th;
    }
} else if ($jenis == "hapus") {
    // Ubah
    $id = $_POST['id'];

    try {
        $conn
            ->prepare("DELETE FROM riwayat_pendidikan WHERE id=$id ")
            ->execute();
        echo json_encode([
            'status' => 1,
            'message' => 'Berhasil Hapus Data Keterampilan ' . $kategori . '',
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 0,
            'message' => 'Error saat Hapus Data Keterampilan ' . $kategori . '. ' . $e->getMessage(),
        ]);
        //throw $th;
    }
}
