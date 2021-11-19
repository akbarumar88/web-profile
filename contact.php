<?php

require_once("./db.php");
$profil = $conn
    ->query("SELECT i.id, nama, email, concat(kota, ', ', provinsi) as lokasi  from identitas i 
            inner join provinsi p2 on p2.id = i.idprovinsi 
            inner join kota k2 on k2.id = i.idkota 
            where i.id=1")
    ->fetch();
// var_dump($profil);die;
$nama_lengkap = $profil['nama'];
$email = $profil['email'];
$lokasi = $profil['lokasi'];

$sosmed = $conn
    ->query("SELECT url, nama as alt, username, img from mhs_sosmed ms 
            inner join sosmed s on s.id= ms.idsosmed WHERE idmhs=1")
    ->fetchAll();

// die(var_dump($sosmed));
?>
<div class="box" id="right">
    <div id="caption-wrap">
        <h1>CONTACT</h1>
        <div class="line"></div>
    </div>

    <p>Jangan ragu untuk menghubungi saya tentang apa pun.</p>

    <div class="section-caption">
        <h3>Mari Bersosialisasi</h3>
    </div>

    <div id="socmed-list-wrap">
        <?php foreach ($sosmed as $sos) { ?>
            <a target="_blank" href="<?= $sos['url'] . '/' . $sos['username']  ?>"><img src="img/<?= $sos['img'] ?>" alt="<?= $sos['alt'] ?>"></a>
        <?php } ?>
    </div>

    <div class="section-caption">
        <h3>Kirimi Saya Pesan</h3>
    </div>

    <div id="send-message-wrap">
        <img src="./img/profil.jpg" alt="foto-profil" id="pp" width="100px" style="display: block;;margin: auto;">
        <h1 style="margin-top: 16px;"><?= $nama_lengkap ?></h1>
        <p style="margin: 4px 0;"><a href="mailto:<?= $email ?>"><i><?= $email ?></i></a></p>
        <p>- <?= $lokasi ?></p>
    </div>

    <form id="form-wrap" action="">
        <div class="form-element">
            <p>Nama<span>*</span></p>
            <input type="text" />
        </div>

        <div class="form-element">
            <p>Email<span>*</span></p>
            <input type="email" />
        </div>

        <div class="form-element">
            <p>Subjek<span>*</span></p>
            <input type="text" />
        </div>

        <div class="form-element">
            <p>Pesan<span>*</span></p>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" href="#" id="b-send">Kirim</button>
    </form>
</div>