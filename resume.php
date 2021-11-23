<?php
require_once("./db.php");
$latar_belakang = "Saya adalah <b><u>seorang mahasiswa</u></b> UPN Veteran Jawa Timur Surabaya. Saya menempuh pendidikan S1 Jurusan Teknik Informatika.";
// $riwayat_magang = $conn
//     ->query("SELECT concat(date_format(tglawal, '%b %Y'), ' - ', date_format(tglakhir, '%b %Y')) as periode, peran, instansi, deskripsi from riwayat_magang rm ;")
//     ->fetchAll();
// var_dump($riwayat_magang);die;

// $riwayat_pendidikan = $conn
//     ->query("SELECT concat(date_format(tglawal, '%Y'), ' - ', date_format(tglakhir, '%Y')) as periode, tingkat, instansi, deskripsi from riwayat_pendidikan rp ;")
//     ->fetchAll();
// var_dump($riwayat_pendidikan);die;
// $keterampilan_web = $conn
//     ->query("SELECT  bahasa
//                 ,id_html AS id
//                 ,mk.stat
//             FROM mhs_keterampilan mk
//             INNER JOIN identitas i ON i.id = mk.idmhs
//             INNER JOIN keterampilan k ON k.id = mk.idketerampilan
//             WHERE mk.idmhs = 1 AND kategori='web'")
//     ->fetchAll();
// var_dump($keterampilan_web);die;

$keterampilan_seluler = $conn
    ->query("SELECT  bahasa
                ,id_html AS id
                ,mk.stat
            FROM mhs_keterampilan mk
            INNER JOIN identitas i ON i.id = mk.idmhs
            INNER JOIN keterampilan k ON k.id = mk.idketerampilan
            WHERE mk.idmhs = 1 AND kategori='seluler'")
    ->fetchAll();
$keterampilan_desktop = $conn
    ->query("SELECT  bahasa
                ,id_html AS id
                ,mk.stat
            FROM mhs_keterampilan mk
            INNER JOIN identitas i ON i.id = mk.idmhs
            INNER JOIN keterampilan k ON k.id = mk.idketerampilan
            WHERE mk.idmhs = 1 AND kategori='desktop'")
    ->fetchAll();
$hobi = $conn
    ->query("SELECT hobi,deskripsi,img from hobi where idmhs = 1;")
    ->fetchAll();
?>

<div class="box" id="left">
    <div id="caption-wrap">
        <h1>RESUME</h2>
            <div class="line"></div>
    </div>

    <p id="background">
        <?= $latar_belakang ?>
    </p>

    <!-- Internship -->
    <div class="section-caption">
        <h3>Magang</h3>
    </div>

    <h3 id="loading-magang">Sedang memuat data magang...</h3>
    <div id="magang-list-wrap">
        <?php /* foreach ($riwayat_magang as $i) { ?>
            <div class="period-wrap editable-wrapper" style="position: relative;">
                <button class="b-accent b-delete">❌</button>
                <button class="b-accent b-edit">✏️</button>
                <h2 id="period"><?= $i['periode'] ?></h1>
                    <h3 class="period-title"><?= $i['peran'] ?></h3>
                    <p class="period-subtitle"><?= $i['instansi'] ?></p>
                    <p class="period-description"><?= $i['deskripsi'] ?></p>
            </div>
        <?php } */ ?>
    </div>
    <button class="b-accent" onclick="openModalMagang()">➕ Tambah Riwayat Magang</button>
    <!-- Edukasi -->

    <div class="section-caption">
        <h3>Edukasi</h3>
    </div>

    <h3 id="loading-pendidikan">Sedang memuat data pendidikan...</h3>
    <div id="pendidikan-list-wrap">
        <?php /*foreach ($riwayat_pendidikan as $i) { ?>
            <div class="period-wrap editable-wrapper" id="#period1" style="position: relative;">
                <button class="b-accent b-delete">❌</button>
                <button class="b-accent b-edit">✏️</button>
                <h2 id="period"><?= $i['periode'] ?></h1>
                    <h3 class="period-title"><?= $i['tingkat'] ?></h3>
                    <p class="period-subtitle">di <?= $i['instansi'] ?></p>
                    <p class="period-description"><?= $i['deskripsi'] ?></p>
            </div>
        <?php } */ ?>
    </div>
    <button class="b-accent" onclick="openModalPendidikan()">➕ Tambah Riwayat Pendidikan</button>

    <!-- Development Skill -->

    <div class="section-caption">
        <h3>Keterampilan Pengembangan Web</h3>
    </div>

    <?php foreach ($keterampilan_web as $i) { ?>
        <div class="stat-wrap editable-wrapper" style="position: relative;">
            <button class="b-accent b-delete">❌</button>
            <button class="b-accent b-edit">✏️</button>
            <p class="title"><?= $i['bahasa'] ?></p>
            <div class="stat-value-wrap">
                <div class="stat-value" id="<?= $i['id'] ?>"></div>
            </div>
        </div>
    <?php } ?>
    <button class="b-accent" onclick="openModalKeterampilan('web')">➕ Tambah Keterampilan Web</button>

    <div class="section-caption">
        <h3>Keterampilan Pengembangan Seluler</h3>
    </div>

    <?php foreach ($keterampilan_seluler as $i) { ?>
        <div class="stat-wrap editable-wrapper" style="position: relative;">
            <button class="b-accent b-delete">❌</button>
            <button class="b-accent b-edit">✏️</button>
            <p class="title"><?= $i['bahasa'] ?></p>
            <div class="stat-value-wrap">
                <div class="stat-value" id="<?= $i['id'] ?>"></div>
            </div>
        </div>
    <?php } ?>
    <button class="b-accent" onclick="openModalKeterampilan('seluler')">➕ Tambah Keterampilan Seluler</button>

    <div class="section-caption">
        <h3>Keterampilan Pengembangan Desktop</h3>
    </div>
    <button class="b-edit" style="position: static;">Edit Gan</button>

    <?php foreach ($keterampilan_desktop as $i) { ?>
        <div class="stat-wrap editable-wrapper" style="position: relative;">
            <button class="b-accent b-delete">❌</button>
            <button class="b-accent b-edit">✏️</button>
            <p class="title"><?= $i['bahasa'] ?></p>
            <div class="stat-value-wrap">
                <div class="stat-value" id="<?= $i['id'] ?>"></div>
            </div>
        </div>
    <?php } ?>
    <button class="b-accent" onclick="openModalKeterampilan('desktop')">➕ Tambah Keterampilan Desktop</button>

    <!-- Hobi -->

    <div class="section-caption">
        <h3>Hobi</h3>
    </div>

    <?php foreach ($hobi as $i) { ?>
        <div class="hobby-section-wrap editable-wrapper" style="position: relative;">
            <button class="b-accent b-delete">❌</button>
            <button class="b-accent b-edit">✏️</button>
            <img src="./img/<?= $i['img'] ?>" alt="Home">
            <p class="title"><?= $i['hobi'] ?></p>
            <p class="description">
                <?= $i['deskripsi'] ?>
            </p>
        </div>
    <?php } ?>
    <button class="b-accent" onclick="openModalHobi()">➕ Tambah Hobi</button>
</div>