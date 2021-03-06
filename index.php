<!-- Dibuat Oleh Akbar Umar -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Curriculum Vitae</title>
    <style>
        body {
            position: relative;
        }

        /* Customize Scrollbar */
        .box::-webkit-scrollbar {
            width: 4px;
        }

        .box::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 20px;
            visibility: hidden;
        }

        .box:hover::-webkit-scrollbar-thumb {
            visibility: visible;
        }

        .box::-webkit-scrollbar-track {
            background: transparent;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <!-- Modal Riwayat Magang -->
    <div class="modal" id="modal-magang">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Riwayat Magang</h3>
                <button class="b-close">❌</button>
            </div>
            <div class="modal-body">
                <form id="form-wrap" style="margin-top:0">
                    <input type="hidden" name="id">
                    <div class="form-element">
                        <p>Tanggal Awal<span>*</span></p>
                        <input type="date" style="width:100%" name="tglawal" />
                        <p class="error" style="display:none">Harap isi tanggal awal</p>
                    </div>

                    <div class="form-element">
                        <p>Tanggal Akhir<span>*</span></p>
                        <input type="date" style="width:100%" name="tglakhir" />
                        <p class="error" style="display:none">Harap isi tanggal akhir</p>
                    </div>

                    <div class="form-element">
                        <p>Peran<span>*</span></p>
                        <input type="text" style="width:100%" name="peran" />
                        <p class="error" style="display:none">Harap isi peran</p>
                    </div>

                    <div class="form-element">
                        <p>Instansi<span>*</span></p>
                        <input type="text" style="width:100%" name="instansi" />
                        <p class="error" style="display:none">Harap isi Instansi</p>
                    </div>

                    <div class="form-element">
                        <p>Deskripsi<span>*</span></p>
                        <textarea name="deskripsi" id="" cols="30" rows="10" style="width:100%"></textarea>
                        <p class="error" style="display:none">Harap isi deskripsi</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="b-accent" id="simpan-magang" onclick="simpanMagang(event)" style="display: flex;align-items: center;">
                    Simpan
                    <img class="loading-simpan" src="img/loading-buffering.gif" alt="loading" width="20px" height="20px" style="margin-left: 8px;">
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Riwayat Pendidikan -->
    <div class="modal" id="modal-pendidikan">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Riwayat Pendidikan</h3>
                <button class="b-close">❌</button>
            </div>
            <div class="modal-body">
                <form id="form-wrap" style="margin-top:0">
                    <input type="hidden" name="id">
                    <div class="form-element">
                        <p>Tanggal Awal<span>*</span></p>
                        <input type="date" style="width:100%" name="tglawal" />
                        <p class="error" style="display:none">Harap isi tanggal awal</p>
                    </div>

                    <div class="form-element">
                        <p>Tanggal Akhir<span>*</span></p>
                        <input type="date" style="width:100%" name="tglakhir" />
                        <p class="error" style="display:none">Harap isi tanggal akhir</p>
                    </div>

                    <div class="form-element">
                        <p>Tingkat<span>*</span></p>
                        <input type="text" style="width:100%" name="tingkat" />
                        <p class="error" style="display:none">Harap isi tingkat</p>
                    </div>

                    <div class="form-element">
                        <p>Instansi<span>*</span></p>
                        <input type="text" style="width:100%" name="instansi" />
                        <p class="error" style="display:none">Harap isi Instansi</p>
                    </div>

                    <div class="form-element">
                        <p>Deskripsi<span>*</span></p>
                        <textarea name="deskripsi" id="" cols="30" rows="10" style="width:100%"></textarea>
                        <p class="error" style="display:none">Harap isi Deksripsi</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="b-accent" id="simpan-pendidikan" onclick="simpanPendidikan(event)">
                    Simpan
                    <img class="loading-simpan" src="img/loading-buffering.gif" alt="loading" width="20px" height="20px" style="margin-left: 8px;">
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Keterampilan -->
    <div class="modal" id="modal-keterampilan">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Keterampilan</h3>
                <button class="b-close">❌</button>
            </div>
            <div class="modal-body">
                <form id="form-wrap" style="margin-top:0">
                    <input type="hidden" name="id">
                    <div class="form-element">
                        <p>Bahasa<span>*</span></p>
                        <input type="text" name="bahasa" style="width:100%" />
                        <p class="error" style="display:none">Harap isi Bahasa.</p>
                    </div>

                    <div class="form-element">
                        <p>Stat (1-100)<span>*</span></p>
                        <input type="number" name="stat" min="1" max="100" style="width:100%" />
                        <p class="error" style="display:none">Harap isi Stat.</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="b-accent" id="simpan-keterampilan" onclick="simpanKeterampilan(event)">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Modal Hobi -->
    <div class="modal" id="modal-hobi">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Hobi</h3>
                <button class="b-close">❌</button>
            </div>
            <div class="modal-body">
                <form id="form-wrap" style="margin-top:0">
                    <div class="form-element">
                        <p>Hobi<span>*</span></p>
                        <input type="text" style="width:100%" />
                    </div>

                    <div class="form-element">
                        <p>Deskripsi<span>*</span></p>
                        <textarea name="" id="" cols="30" rows="10" style="width:100%"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="b-accent" id="simpan-hobi">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Modal Portofolio -->
    <div class="modal" id="modal-portofolio">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Portofolio</h3>
                <button class="b-close">❌</button>
            </div>
            <div class="modal-body">
                <form id="form-wrap" style="margin-top:0">

                    <div class="form-element">
                        <p>Deskripsi<span>*</span></p>
                        <textarea name="" id="" cols="30" rows="10" style="width:100%"></textarea>
                    </div>

                    <div class="form-element">
                        <p>Penerbit<span>*</span></p>
                        <input type="text" style="width:100%" />
                    </div>

                    <div class="form-element">
                        <p>Gambar<span>*</span></p>
                        <input type="file" style="width:100%" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="b-accent" id="simpan-portofolio">Simpan</button>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- <img src="./img/ribbon-for-book.png" id="ribbon" alt="Ribbon"> -->
        <!-- SVG Pita pada pojok kiri atas -->
        <svg version="1.1" id="ribbon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 483.168 483.168" style="enable-background:new 0 0 483.168 483.168;" xml:space="preserve">
            <g>
                <g>
                    <path d="M52.827,172.69c22.041,0,51.538-5.769,78.7-12.569c3.312-0.832,6.578-1.663,9.798-2.519
			c0.134-0.088,0.256-0.181,0.391-0.269c2.914-1.908,5.887-3.783,8.921-5.646c5.68-3.485,11.537-6.885,17.663-10.189
			c-1.886-0.06-3.811-0.114-5.781-0.172c-7.957-0.21-16.579-0.353-25.543-0.353c-57.276,0-96.583,5.809-112.417,16.306
			c-0.667,1.813-1.1,3.374-1.368,4.584c-0.139,0.611-0.234,1.14-0.303,1.553c1.685,3.206,5.236,5.31,9.582,6.729
			C38.5,172.093,46.1,172.69,52.827,172.69z" />
                    <path d="M16.167,450.686c17.058-53.996,47.164-79.893,48.603-81.095l5.564-4.692l2.182,6.944
			c10.089,32.216,25.438,61.237,34.997,77.692c3.849-183.084,69.753-258.768,103.059-285.451c-9.035-1.08-17.167-4.458-23.77-9.521
			c-1.533-1.176-2.982-2.403-4.334-3.753c-1.262-1.257-2.526-2.519-3.61-3.91c-6.797,3.519-13.387,7.115-19.651,10.852
			c-4.907,2.924-9.647,5.917-14.24,8.969C10.993,255.928,10.474,395.984,16.167,450.686z" />
                    <path d="M341.45,157.334c0.132,0.088,0.265,0.172,0.385,0.26c3.229,0.848,6.488,1.688,9.798,2.519
			c27.162,6.801,56.653,12.569,78.702,12.569c6.716,0,14.314-0.597,20.342-2.553c4.352-1.41,7.919-3.522,9.598-6.734
			c-0.064-0.415-0.156-0.936-0.284-1.537c-0.245-1.196-0.662-2.741-1.295-4.524c-15.766-10.545-55.114-16.375-112.513-16.375
			c-8.956,0-17.58,0.14-25.543,0.353c-1.972,0.052-3.896,0.11-5.774,0.172c6.119,3.304,11.981,6.712,17.672,10.189
			C335.563,153.551,338.541,155.426,341.45,157.334z" />
                    <path d="M300.474,144.945c-0.137,0.188-0.221,0.403-0.354,0.591c-1.025,1.428-2.224,2.717-3.426,4.017
			c-1.25,1.353-2.513,2.671-3.939,3.863c-5.795,4.853-12.948,8.375-20.938,10.047c33.049,26.12,99.969,101.526,103.84,286.072
			c9.562-16.467,24.91-45.509,35.001-77.692l2.176-6.944l5.566,4.692c1.439,1.21,31.522,27.09,48.582,81.046
			c5.643-54.753,5.014-194.801-128.818-283.924c-4.585-3.05-9.321-6.043-14.223-8.961c-6.34-3.795-13.023-7.438-19.917-10.994
			C302.842,146.149,301.664,145.544,300.474,144.945z" />
                    <path d="M21.204,147.724c1.07-0.613,2.426-1.146,3.619-1.725c2.779-1.353,5.907-2.613,9.375-3.775
			c21.446-7.233,55.689-10.953,102.783-10.953c1.304,0,2.561,0.016,3.857,0.024c3.665,0.016,7.246,0.054,10.756,0.106
			c7.095,0.12,13.799,0.292,19.979,0.515c-0.032-0.134-0.058-0.26-0.088-0.395c-0.377-1.679-0.449-3.438-0.587-5.188
			c-0.08-0.972-0.329-1.899-0.329-2.897V84.066c0-6.155,1.613-11.94,4.33-17.184c0.118-0.23,0.276-0.433,0.403-0.651
			c0.336-0.613,0.721-1.2,1.088-1.797c-0.501-0.276-0.996-0.549-1.499-0.826c-5.047-2.763-10.022-5.378-14.862-7.692
			c-9.401-4.508-18.376-8.173-26.916-11.189c-27.079-9.538-49.654-12.245-66.463-12.245c-17.318,0-31.675,2.959-42.625,7.284
			c-10.151,4.005-17.384,9.177-21.071,14.36c-2.809,3.947-3.619,7.708-2.412,11.193c2.703,7.772,5.41,17.294,7.985,27.146
			c5.033,19.233,9.445,39.589,11.956,51.744C20.717,145.372,21,146.72,21.204,147.724z" />
                    <path d="M459.14,39.766c-10.957-4.324-25.315-7.284-42.644-7.284c-16.803,0-39.381,2.707-66.467,12.245
			c-8.54,3.008-17.509,6.672-26.91,11.181c-4.837,2.314-9.811,4.929-14.855,7.692c-1.796,0.982-3.551,1.91-5.366,2.945
			c2.829,5.336,4.537,11.223,4.537,17.513v39.371c0,1.515-0.321,2.945-0.506,4.412c-0.168,1.418-0.229,2.871-0.561,4.248
			c1.19-0.05,2.461-0.097,3.711-0.135c6.58-0.244,13.81-0.44,21.492-0.567c3.518-0.054,7.089-0.092,10.756-0.108
			c1.286-0.008,2.536-0.022,3.847-0.022c47.323,0,81.684,3.749,103.111,11.051c3.338,1.138,6.348,2.364,9.049,3.677
			c1.194,0.579,2.553,1.11,3.618,1.725c0.205-1.006,0.489-2.354,0.733-3.524c2.509-12.155,6.925-32.508,11.954-51.744
			c2.577-9.851,5.29-19.372,7.987-27.146c1.206-3.477,0.393-7.237-2.413-11.193C476.524,48.943,469.287,43.771,459.14,39.766z" />
                    <path d="M223.423,154.931h8.009h4.841h10.621h4.837h8.003h1.604c7.405,0,14.282-1.947,20.033-5.235
			c1.787-1.02,3.426-2.204,4.969-3.479c1.362-1.114,2.553-2.344,3.703-3.633c0.32-0.36,0.697-0.675,0.994-1.054
			c1.029-1.254,1.871-2.623,2.677-4.001c0.108-0.188,0.252-0.369,0.353-0.569c0.008-0.006,0.016-0.022,0.023-0.03
			c0.782-1.395,1.371-2.855,1.908-4.362c0.008-0.016,0.008-0.026,0.016-0.042c0.169-0.471,0.369-0.924,0.514-1.411
			c0.721-2.473,1.218-5.017,1.218-7.686V84.058c0-4.48-1.118-8.729-3.082-12.591c-0.721-1.431-1.614-2.771-2.568-4.082
			c-0.104-0.158-0.185-0.331-0.305-0.487c-0.874-1.154-1.911-2.19-2.938-3.228c-6.677-6.734-16.475-11.101-27.515-11.101h-7.702
			h-24.113h-12.859c-9.979,0-19.021,3.502-25.605,9.145c-1.281,1.1-2.389,2.342-3.471,3.588c-0.463,0.537-0.958,1.038-1.383,1.603
			c-0.557,0.739-0.981,1.555-1.46,2.331c-2.771,4.446-4.488,9.443-4.488,14.829v39.371c0,2.016,0.265,3.979,0.689,5.895
			c0.227,1.028,0.629,1.994,0.966,2.983c0.211,0.621,0.407,1.234,0.66,1.835c0.118,0.285,0.18,0.583,0.306,0.855
			c0.361,0.777,0.81,1.509,1.238,2.254c0.23,0.401,0.487,0.777,0.74,1.168c0.653,1.032,1.266,2.066,2.032,3.018
			c0.246,0.299,0.553,0.547,0.801,0.84c0.024,0.022,0.05,0.038,0.066,0.06c0.391,0.449,0.815,0.868,1.23,1.288
			c1.318,1.343,2.741,2.583,4.292,3.723c1.715,1.249,3.535,2.352,5.49,3.318c5.306,2.615,11.357,4.232,17.897,4.232h6.76V154.931z" />
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
        </svg>

        <!-- Resume -->
        <?php require_once("./resume.php") ?>

        <!-- Portofolio -->
        <?php require_once("./portofolio.php") ?>

        <!-- Contact -->
        <?php require_once("./contact.php") ?>



    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
</body>

</html>