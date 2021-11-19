<?php

require_once("./db.php");
$portofolio = $conn
    ->query("SELECT deskripsi,penerbit,img from portofolio p where idmhs =1")
    ->fetchAll();

// var_dump($portofolio); die;

?>
<div class="box" id="mid">
    <div id="caption-wrap">
        <h1>PORTOFOLIO</h2>
            <div class="line"></div>
    </div>

    <div id="tab-heading-wrap">
        <a href="#">Kompetisi</a>
    </div>

    <div id="porto-wrap">
        <?php foreach ($portofolio as  $i) { ?>
            <div class="content editable-wrapper" style="position: relative;">
                <button class="b-accent b-delete">❌</button>
                <button class="b-accent b-edit">✏️</button>
                <img src="./img/<?= $i['img'] ?>" alt="gambar3">
                <p class="desc"><?= $i['deskripsi'] ?></p>
                <p class="publisher"><?= $i['penerbit'] ?></p>
            </div>
        <?php } ?>
        <button class="b-accent" onclick="openModalPortofolio()">➕ Tambah Portofolio</button>

    </div>
</div>