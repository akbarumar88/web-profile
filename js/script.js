let jenisSimpan
$(document).ready(function () {
    loadRiwayatMagang()
    loadRiwayatPendidikan()
    loadKeterampilanWeb() 
    loadKeterampilanDesktop() 
    loadKeterampilanSeluler() 


    $(document).keydown(function (e) {
        // console.log(e.which)
        if (e.which == 27) {
            // Tekan esc button
            $('.modal').css({
                display: 'none'
            })
        }
    })
    $('.modal .b-close').click(function (e) {
        // console.log('clicked', e)
        // console.log($(this))
        $(this).closest(".modal").css('display', 'none')
    })

    // Button Edit
    $(".b-edit").click(function (e) {
        alert('masuk gan')
        let data = $(this).attr('data-value')
        console.log(data)
        openModalMagang()
    })

})

function editMagang(e) {
    // alert('masuk gan')
    let data = JSON.parse(e.target.dataset.value)
    console.log(data)
    openModalMagang(data)
}

function editPendidikan(e) {
    // alert('masuk gan')
    let data = JSON.parse(e.target.dataset.value)
    console.log(data)
    openModalPendidikan(data)
}

function hapusMagang(e) {
    // alert('masuk gan')
    let id = JSON.parse(e.target.dataset.value)
    console.log(id)
    let yes = confirm("Apakah anda yakin ingin menghapus data magang?")
    if (yes) {
        $.ajax({
            type: 'post',
            url: 'api/magang.php',
            data: {
                id,
                jenis: "hapus"
            },
            dataType: 'JSON',
            success: function (res) {
                alert(res.message)
                loadRiwayatMagang()
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                let res = JSON.parse(XMLHttpRequest.responseText)
                alert(res.message)
                console.log({
                    XMLHttpRequest,
                    textStatus,
                    errorThrown
                })
            }
        })
    }
    // openModalMagang(data)
}

function hapusPendidikan(e) {
    // alert('masuk gan')
    let id = JSON.parse(e.target.dataset.value)
    console.log(id)
    let yes = confirm("Apakah anda yakin ingin menghapus data pendidikan?")
    if (yes) {
        $.ajax({
            type: 'post',
            url: 'api/pendidikan.php',
            data: {
                id,
                jenis: "hapus"
            },
            dataType: 'JSON',
            success: function (res) {
                alert(res.message)
                loadRiwayatPendidikan()
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                let res = JSON.parse(XMLHttpRequest.responseText)
                alert(res.message)
                console.log({
                    XMLHttpRequest,
                    textStatus,
                    errorThrown
                })
            }
        })
    }
    // openModalMagang(data)
}

function loadRiwayatMagang(params) {
    $('#loading-magang').css({
        display: 'block'
    })
    $.ajax({
        url: "api/magang.php",
        data: ({
            jenis: 'get'
        }),
        type: "post",
        dataType: "json",
        success: function (res) {
            // console.log('jQuery', res, typeof res)
            $('#loading-magang').css({
                display: 'none'
            })
            $('#magang-list-wrap').empty()
            const {
                data: riwayatMagang
            } = res
            riwayatMagang.forEach(mag => {
                $('#magang-list-wrap')
                    .append(`
                        <div class="period-wrap editable-wrapper" style="position: relative;">
                            <button onclick="hapusMagang(event)" class="b-accent b-delete" data-value="${mag.id}">❌</button>
                            <button onclick="editMagang(event)" class="b-accent b-edit" data-value='${JSON.stringify(mag)}'>✏️</button>
                            <h2 id="period">${mag.periode}</h1>
                                <h3 class="period-title">${mag.peran}</h3>
                                <p class="period-subtitle">${mag.instansi}</p>
                                <p class="period-description">${mag.deskripsi}</p>
                        </div>
                        `)
            });
        }
    })
}

function loadRiwayatPendidikan(params) {
    $('#loading-pendidikan').css({
        display: 'block'
    })
    $.ajax({
        url: "api/pendidikan.php",
        data: ({
            jenis: 'get'
        }),
        type: "post",
        dataType: "json",
        success: function (res) {
            // console.log('jQuery', res, typeof res)
            $('#loading-pendidikan').css({
                display: 'none'
            })
            $('#pendidikan-list-wrap').empty()
            const {
                data: riwayatPendidikan
            } = res
            console.log('pend.',riwayatPendidikan)
            riwayatPendidikan.forEach(mag => {
                console.log('mag',mag)
                $('#pendidikan-list-wrap')
                    .append(`
                        <div class="period-wrap editable-wrapper" id="#period1" style="position: relative;">
                            <button class="b-accent b-delete" onclick="hapusPendidikan(event)" data-value="${mag.id}">❌</button>
                            <button class="b-accent b-edit" onclick="editPendidikan(event)" data-value='${JSON.stringify(mag)}'>✏️</button>
                            <h2 id="period">${mag.periode}</h1>
                                <h3 class="period-title">${mag.tingkat}</h3>
                                <p class="period-subtitle">di ${mag.instansi}</p>
                                <p class="period-description">${mag.deskripsi}</p>
                        </div>
                        `)
            });
        }
    })
}

function loadKeterampilanWeb(params) {
    $('#loading-ketweb').css({
        display: 'block'
    })
    $.ajax({
        url: "api/keterampilan.php",
        data: ({
            jenis: 'get',
            kategori: 'web'
        }),
        type: "post",
        dataType: "json",
        success: function (res) {
            // console.log('jQuery', res, typeof res)
            $('#loading-ketweb').css({
                display: 'none'
            })
            $('#pendidikan-list-wrap').empty()
            const {
                data: keterampilan
            } = res
            keterampilan.forEach(mag => {
                $('#ketweb-list-wrap')
                    .append(`
                        <div class="period-wrap editable-wrapper" id="#period1" style="position: relative;">
                            <button class="b-accent b-delete" onclick="hapusPendidikan(event)" data-value="${mag.id}">❌</button>
                            <button class="b-accent b-edit" onclick="editPendidikan(event)" data-value='${JSON.stringify(mag)}'>✏️</button>
                            <h2 id="period">${mag.periode}</h1>
                                <h3 class="period-title">${mag.tingkat}</h3>
                                <p class="period-subtitle">di ${mag.instansi}</p>
                                <p class="period-description">${mag.deskripsi}</p>
                        </div>
                        `)
            });
        }
    })
}

function loadKeterampilanDesktop() {
    
}

function loadKeterampilanSeluler() {
    
}

function openModalMagang(data) {
    $('#modal-magang').css({
        display: 'flex'
    })
    if (!empty(data)) {
        jenisSimpan = "ubah"
        const {
            tglawal,
            tglakhir,
            peran,
            instansi,
            deskripsi,
            id
        } = data
        $('#modal-magang input[name=id]').val(id)
        $('#modal-magang input[name=tglawal]').val(tglawal)
        $('#modal-magang input[name=tglakhir]').val(tglakhir)
        $('#modal-magang input[name=peran]').val(peran)
        $('#modal-magang input[name=instansi]').val(instansi)
        $('#modal-magang textarea[name=deskripsi]').val(deskripsi)
    } else {
        jenisSimpan = "tambah"
        clearInputModal()
    }
}

function openModalPendidikan(data) {
    $('#modal-pendidikan').css({
        display: 'flex'
    })
    if (!empty(data)) {
        jenisSimpan = "ubah"
        const {
            tglawal,
            tglakhir,
            tingkat,
            instansi,
            deskripsi,
            id
        } = data
        $('#modal-pendidikan input[name=id]').val(id)
        $('#modal-pendidikan input[name=tglawal]').val(tglawal)
        $('#modal-pendidikan input[name=tglakhir]').val(tglakhir)
        $('#modal-pendidikan input[name=tingkat]').val(tingkat)
        $('#modal-pendidikan input[name=instansi]').val(instansi)
        $('#modal-pendidikan textarea[name=deskripsi]').val(deskripsi)
    } else {
        jenisSimpan = "tambah"
        clearInputModal()
    }
}

function openModalKeterampilan(type) {
    $('#modal-keterampilan').attr('data-type', type)
    $('#modal-keterampilan').css({
        display: 'flex'
    })
}

function openModalHobi() {
    $('#modal-hobi').css({
        display: 'flex'
    })
}

function openModalPortofolio() {
    $('#modal-portofolio').css({
        display: 'flex'
    })
}

function empty(val) {
    return val == '' || val == null || val == undefined
}

function simpanMagang(e) {
    let id = $('#modal-magang input[name=id]').val()
    let tglAwal = $('#modal-magang input[name=tglawal]').val()
    let tglAkhir = $('#modal-magang input[name=tglakhir]').val()
    let peran = $('#modal-magang input[name=peran]').val()
    let instansi = $('#modal-magang input[name=instansi]').val()
    let deskripsi = $('#modal-magang textarea[name=deskripsi]').val()
    let valid = true

    // Clear data error dulu
    $('#modal-magang input, #modal-magang textarea').removeClass('error')
    $('#modal-magang p.error').css('display', 'none')
    if (empty(tglAwal)) {
        $('#modal-magang input[name=tglawal]').addClass('error')
        $('#modal-magang input[name=tglawal]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(tglAkhir)) {
        $('#modal-magang input[name=tglakhir]').addClass('error')
        $('#modal-magang input[name=tglakhir]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(peran)) {
        $('#modal-magang input[name=peran]').addClass('error')
        $('#modal-magang input[name=peran]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(instansi)) {
        $('#modal-magang input[name=instansi]').addClass('error')
        $('#modal-magang input[name=instansi]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(deskripsi)) {
        $('#modal-magang textarea[name=deskripsi]').addClass('error')
        $('#modal-magang textarea[name=deskripsi]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (!empty(tglAwal) && !empty(tglAkhir) && tglAwal == tglAkhir) {
        alert("Tanggal Awal dan Tanggal Akhir tidak boleh sama.")
        valid = false
    }
    if (!valid) return

    // console.log({
    //     tglAwal,
    //     tglAkhir,
    //     peran,
    //     instansi,
    //     deskripsi,
    // })

    $(".loading-simpan").css({
        display: 'inline'
    })
    $.ajax({
        type: 'post',
        url: 'api/magang.php',
        data: {
            id,
            tglAwal,
            tglAkhir,
            peran,
            instansi,
            deskripsi,
            jenis: jenisSimpan
        },
        dataType: 'JSON',
        success: function (res) {
            alert(res.message)
            $('#modal-magang').css({
                display: 'none'
            })
            $(".loading-simpan").css({
                display: 'none'
            })
            loadRiwayatMagang()
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            let res = JSON.parse(XMLHttpRequest.responseText)
            alert(res.message)
            console.log({
                XMLHttpRequest,
                textStatus,
                errorThrown
            })
            $(".loading-simpan").css({
                display: 'none'
            })
        }
    })
}

function simpanPendidikan(e) {
    let id = $('#modal-pendidikan input[name=id]').val()
    let tglAwal = $('#modal-pendidikan input[name=tglawal]').val()
    let tglAkhir = $('#modal-pendidikan input[name=tglakhir]').val()
    let tingkat = $('#modal-pendidikan input[name=tingkat]').val()
    let instansi = $('#modal-pendidikan input[name=instansi]').val()
    let deskripsi = $('#modal-pendidikan textarea[name=deskripsi]').val()
    let valid = true

    // Clear data error dulu
    $('#modal-pendidikan input, #modal-pendidikan textarea').removeClass('error')
    $('#modal-pendidikan p.error').css('display', 'none')
    if (empty(tglAwal)) {
        $('#modal-pendidikan input[name=tglawal]').addClass('error')
        $('#modal-pendidikan input[name=tglawal]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(tglAkhir)) {
        $('#modal-pendidikan input[name=tglakhir]').addClass('error')
        $('#modal-pendidikan input[name=tglakhir]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(tingkat)) {
        $('#modal-pendidikan input[name=tingkat]').addClass('error')
        $('#modal-pendidikan input[name=tingkat]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(instansi)) {
        $('#modal-pendidikan input[name=instansi]').addClass('error')
        $('#modal-pendidikan input[name=instansi]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (empty(deskripsi)) {
        $('#modal-pendidikan textarea[name=deskripsi]').addClass('error')
        $('#modal-pendidikan textarea[name=deskripsi]').siblings('.error').css('display', 'block')
        valid = false
    }
    if (!empty(tglAwal) && !empty(tglAkhir) && tglAwal == tglAkhir) {
        alert("Tanggal Awal dan Tanggal Akhir tidak boleh sama.")
        valid = false
    }
    if (!valid) return

    // console.log({
    //     tglAwal,
    //     tglAkhir,
    //     tingkat,
    //     instansi,
    //     deskripsi,
    // })

    $(".loading-simpan").css({
        display: 'inline'
    })
    $.ajax({
        type: 'post',
        url: 'api/pendidikan.php',
        data: {
            id,
            tglAwal,
            tglAkhir,
            tingkat,
            instansi,
            deskripsi,
            jenis: jenisSimpan
        },
        dataType: 'JSON',
        success: function (res) {
            alert(res.message)
            $('#modal-pendidikan').css({
                display: 'none'
            })
            $(".loading-simpan").css({
                display: 'none'
            })
            loadRiwayatPendidikan()
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            let res = JSON.parse(XMLHttpRequest.responseText)
            alert(res.message)
            console.log({
                XMLHttpRequest,
                textStatus,
                errorThrown
            })
            $(".loading-simpan").css({
                display: 'none'
            })
        }
    })
}

function clearInputModal() {
    // Modal magang
    $('#modal-magang input[name=tglawal]').val('')
    $('#modal-magang input[name=tglakhir]').val('')
    $('#modal-magang input[name=peran]').val('')
    $('#modal-magang input[name=instansi]').val('')
    $('#modal-magang textarea[name=deskripsi]').val('')

    // Modal Pendidikan
    $('#modal-pendidikan input[name=id]').val('')
    $('#modal-pendidikan input[name=tglawal]').val('')
    $('#modal-pendidikan input[name=tglakhir]').val('')
    $('#modal-pendidikan input[name=tingkat]').val('')
    $('#modal-pendidikan input[name=instansi]').val('')
    $('#modal-pendidikan textarea[name=deskripsi]').val('')
}