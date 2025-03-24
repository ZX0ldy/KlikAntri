@extends('templates.mainAdmin')

@section('content')

    <div class="main-header">
        <div class="d-flex">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu'></i>
            </div>
            <div class="main-title">
                Edit Jadwal
            </div>
        </div>

        <div class="d-flex align-items-center">

            <!-- App Search-->

            <input class="switch" type="checkbox">
            <div class="dropdown d-inline-block ">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="info d-xl-inline-block  color-span">
                        <span class="d-block fs-20 font-w600">Admin</span>
                        <span class="d-block mt-7">Admin@gmail.com</span>
                    </span>

                    <i class='bx bx-chevron-down'></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="user-login.html"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span>Logout</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->

    <!-- Pilih Poli -->
    <div id="PilihPoli" class="main">
        <div class="main-content client">
            <br>
            <div class="row flex-wrap justify-content-center g-3">
                @foreach ($polis as $poli)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="box client custom-box d-flex flex-column align-items-center justify-content-center text-center p-4 poli-box"
                             data-id="{{ $poli->id }}">
                            <h1 class="fs-100"><span class="fas fa-hospital"></span></h1>
                            <h3 class="font-main">{{ $poli->nama_poli }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Pilih Dokter -->
    <div id="PilihDokter" class="main" style="display: none;">
        <div class="main-content client">
            <br>
            <!-- Tombol Kembali -->
            <div class="row mb-4">
                <div class="col">
                    <span class="fas fa-chevron-left fs-25 me-1"></span>
                    <a class="f-poppy fs-25" id="backButton">Kembali</a>
                </div>
            </div>

            <!-- Dokter List -->
            <div id="dokterList" class="mb-3"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            // Ketika poli diklik
            $('.poli-box').on('click', function() {
                let poliId = $(this).data('id');
                console.log("Poli ID: ", poliId); // Pastikan poli ID ada
                // Ambil data dokter berdasarkan poli
                $.ajax({
                    url: "getDokterByPoli/" + poliId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $('#dokterList').html(''); // Kosongkan sebelumnya

                            let dokterHtml = '';
                            response.data.dokters.forEach(dokter => {
                                dokterHtml += `
                                    <div class="card p-3 shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2 text-center">
                                                <img src="${dokter.foto}" class="img-fluid rounded detail-image" style="max-width: 100%;" alt="${dokter.name}">
                                            </div>
                                            <div class="col-md-10">
                                                <h2 class="mb-2">${dokter.name}</h2>
                                                <h5 class="my-3 font-w400">Jadwal Praktek</h5>
                                                <div class="row text-center gap-0 p-0 m-0">
                                `;

                                Object.keys(dokter.jadwal).forEach(hari => {
                                    let status = dokter.jadwal[hari] ? "ON" : "OFF";
                                    let activeClass = dokter.jadwal[hari] ? "active" : "";
                                    dokterHtml += `
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-2 p-1 mb-1">
                                            <div class="schedule-box">
                                                <div class="day-text fs-20">${hari}</div>
                                                <div class="gap"></div>
                                                <button class="toggle-btn ${activeClass} w-100">${status}</button>
                                            </div>
                                        </div>
                                    `;
                                });

                                dokterHtml += `</div></div></div></div>`;
                            });

                            $('#dokterList').html(dokterHtml);
                            $('#PilihPoli').hide();
                            $('#PilihDokter').show();
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Tombol kembali ke daftar poli
            $('#backButton').on('click', function() {
                $('#PilihDokter').hide();
                $('#PilihPoli').show();
            });
        });
    </script>

    @endsection
