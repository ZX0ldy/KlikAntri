<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rumah Sakit</title>
    <meta name="author" content="Mediax">
    <meta name="description" content="Mediax - Health & Medical HTML Template">
    <meta name="keywords" content="Mediax - Health & Medical HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/logos/logo+.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?
        family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800&
        family=Outfit:wght@300;400;500;600;700;800;900&
        family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- datetimepicker -->
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">
    <!-- ...existing code... -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>

    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->


    <!--********************************
   		Code Start From Here
	******************************** -->

    <!--==============================
     Preloader
  ==============================-->

    <!-- <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div> -->
    <header class="th-header header-layout1">
        <div class="header-top" style="background-color: transparent;">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header-links text-center">
                            <ul class="d-flex justify-content-center">
                                <li class="d-none d-sm-inline-block me-5"><b>Service Center:</b> <a
                                        href="tel:+1636543569">+163-654-3569</a></li>
                                <li class="d-none d-sm-inline-block mx-5"><b>Email:</b> <a
                                        href="#">inforumahsakit@gmail.com</a></li>
                                <li class="d-none d-xxl-inline-block ms-5"><b>Malang</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-2" id="hero">
        <div class="th-hero-bg">
            @php
            $backgroundMediaType = App\Models\Setting::getValue('background_media_type', 'image');
            $backgroundMediaFile = App\Models\Setting::getValue('background_media', 'assets/bg/imagebg.png');
        @endphp
        @if($backgroundMediaType == 'image')
            <img src="{{ asset('storage/' . $backgroundMediaFile) }}" alt="Background" class="poli-image">
        @else
            <video autoplay muted loop class="poli-video">
                <source src="{{ asset('storage/' . $backgroundMediaFile) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
        </div>

        <div class="hero-inner">
            <div class="container">
                <div class="text-center">
                    <h1 class="hero-title d-flex align-items-center justify-content-center">
                        Selamat datang di
                        <img src="assets/logos/logo1380.png" alt="KlikAntri" class="w-25 h-25 mb-4 ms-3">
                    </h1>
                    <p class="hero-text">
                        Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan
                        <br> dengan fungsi menyediakan pelayanan paripurna (komprehensif).
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-4 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="title-area text-center">
                        <span class="sub-title"><img src="assets/logos/logosangathd.png" alt="KlikAntri"
                                class="img-fluid w-25 h-25 mb-4 ms-3"> </span>
                        <h2 class="sec-title">Ambil Nomor Antrian</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                @foreach($polis as $poli)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-card" >
                        <div class="box-shape">
                            <img src="assets/img/bg/service_card_bg.png" alt="Service">
                        </div>
                        <div class="box-icon">
                            <img src={{ asset($poli->icon_image) }} alt="Icon">
                        </div>
                        <h3 class="box-title">{{ $poli->nama_poli }}</h3>
                        <form action="{{ route('ambil.nomor') }}" method="POST" class="ambil-nomor-form">
                            @csrf
                            <input type="hidden" name="poli_id" value="{{ $poli->id }}">
                            <button type="submit" class="btn btn-custom f-bold">Ambil Nomor</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
    <footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer_bg_1.jpg">
        <div class="copyright-wrap" style="background-color: #0A0E31;">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-7">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2025 KlikAntri + </p>
                    </div>
                    <div class="col-md-5 text-center text-md-end">
                        <div class="th-social">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Js -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- datetimepicker -->
    <script src="assets/js/jquery.datetimepicker.min.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.js"></script>

    <!-- Main Js File -->
    <script>
        $(document).ready(function() {
            // Check for antrian data in session
            const antrianData = @json(session('antrian_data') ?? null);

            if (antrianData) {
                // Show Sweet Alert with antrian info
                Swal.fire({
                    title: 'Nomor Antrian',
                    html: `<div class="text-center">
                        <h2 class="mb-3">${antrianData.nomor}</h2>
                        <p class="mb-2">Poli ${antrianData.poli}</p>
                        <p class="small">Nomor antrian Anda akan dipanggil dalam 40 detik.</p>
                        ${antrianData.isFirstAntrian ? '<p class="text-success">Anda adalah pasien pertama untuk poli ini hari ini!</p>' : ''}
                    </div>`,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }

            // Handle form submission to avoid Memproses... getting stuck
            $('.ambil-nomor-form').on('submit', function() {
                const btn = $(this).find('.btn-ambil');
                const originalText = btn.text();

                // Show loading state
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Memproses...');

                // Reset button after timeout to prevent hanging UI
                setTimeout(function() {
                    btn.prop('disabled', false).html(originalText);
                }, 10000); // 10 second timeout
            });
        });
    </script>
    <script>
        window.addEventListener('scroll', function () {
            var header = document.querySelector('.header-wrapper');
            var scrollPosition = window.scrollY;

            if (scrollPosition > header.offsetHeight) {
                header.style.marginTop = '0';
            } else {
                header.style.marginTop = '100vh'; // Menggunakan viewport height untuk tinggi hero
            }
        });
    </script>

    <!-- <script>
        function showNomorAntrianAlert() {
            Swal.fire({
                title: 'Nomor antrian sudah siap!',
                text: 'Silahkan ambil nomor antrian pada meja sebelah kanan anda.',
                icon: 'success',
                showConfirmButton: false, // Tidak menampilkan tombol
                timer: 10000 // Menghilang setelah 2 detik (2000 ms)
            });
        }
    </script> -->

    {{-- <script>
        function showNomorAntrianAlert() {
            Swal.fire({
                title: 'Nomor antrian sudah siap!',
                text: 'Silahkan ambil nomor antrian pada meja sebelah kanan anda.',
                iconHtml: '<i class="fas fa-print"></i>', // Menampilkan ikon print
                customClass: {
                    icon: 'swal2-icon-custom' // Menambahkan kelas khusus untuk ikon
                },
                showConfirmButton: false, // Tidak menampilkan tombol
                timer: 10000 // Menghilang setelah 2 detik (2000 ms)
            });
        }
    </script> --}}

    <script src="assets/js/main.js"></script>
</body>

</html>
