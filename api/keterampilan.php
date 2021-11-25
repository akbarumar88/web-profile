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
    $kategori = $_POST['kategori'];
    $bahasa = $_POST['bahasa'];
    $stat = $_POST['stat'];
    $idhtml = strtolower($bahasa);

    try {
        $conn
            ->prepare("INSERT INTO keterampilan(kategori,bahasa,stat,id_html)
                    VALUES('$kategori','$bahasa', $stat, '$idhtml') ")
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
    $kategori = $_POST['kategori'];
    $tglAwal = $_POST['bahasa'];
    $tglAkhir = $_POST['stat'];
    $idhtml = strtolower($bahasa);

    try {
        $conn
            ->prepare("UPDATE keterampilan 
                    SET bahasa='$bahasa', stat=$stat, id_html='$idhtml'
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
