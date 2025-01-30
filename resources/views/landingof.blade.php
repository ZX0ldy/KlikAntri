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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .th-hero-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -90px;
            /* Geser background ke atas */
            overflow: hidden;
            /* Mencegah elemen keluar dari area */
        }

        .th-hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/bg/imagebg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.5;
            /* Opacity hanya berlaku untuk latar belakang */
            filter: brightness(0.8);
            /* Opsional: Menyesuaikan kecerahan jika diperlukan */
            pointer-events: none;
            /* Menghindari interaksi dengan latar belakang */
        }

        .container {
            position: relative;
            /* Memastikan elemen ini tetap berada di atas latar belakang */
            color: #000;
            /* Warna teks tetap terlihat jelas */
        }

        .hero-inner img {
            width: auto;
            /* Menjaga rasio aspek gambar */
            height: auto;
            /* Menjaga rasio aspek gambar */
            max-width: 50%;
            /* Batas maksimum lebar gambar */
            max-height: 50%;
            /* Batas maksimum tinggi gambar */
            min-width: 25%;
            /* Batas minimum lebar gambar */
            min-height: 25%;
            /* Batas minimum tinggi gambar */
            object-fit: contain;
            /* Pastikan gambar sesuai dengan area yang diberikan */
        }

        .hero-title {
            background: linear-gradient(to right, #3A8EF6, #6F3AFA);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: bold;
            /* Tambahkan ketebalan font */
        }


        .hero-text {
            color: #333;
            /* Pastikan teks tetap terlihat jelas */
            font-size: 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .btn-custom {
            background: linear-gradient(120deg, #3A8EF6 50%, #5661F8 100%);
            border-radius: 30px;
            color: white;
        }

        .th-header {
            color: #6C87AE;
        }

        .th-header a {
            color: #6C87AE;
        }

        .th-header b {
            color: #6C87AE;
        }
    </style>

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
                                <li class="d-none d-sm-inline-block me-5"><b>Service Center:</b> <a href="tel:+1636543569">+163-654-3569</a></li>
                                <li class="d-none d-sm-inline-block mx-5"><b>Email:</b> <a href="#">inforumahsakit@gmail.com</a></li>
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
        <div class="th-hero-background"></div>
        <div class="hero-inner">
            <div class="container">
                <div class="text-center">
                    <h1 class="hero-title d-flex align-items-center justify-content-center">
                        Selamat datang di
                        <img src="assets/logos/logo1380.png" alt="KlikAntri" class="w-25 h-25 mb-4 ms-3">
                    </h1>
                    <h6 class="hero-text fw-bold">
                        Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan
                        <br> dengan fungsi menyediakan pelayanan paripurna (komprehensif).
                    </h6>
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
                    <div class="service-card">
                        <div class="box-shape">
                            <img src="assets/img/bg/service_card_bg.png" alt="Service">
                        </div>
                        <div class="box-icon">
                            <img src="{{ asset($poli->icon_image) }}" alt="Icon">
                        </div>
                        <!-- <h3><a>{{ $poli->nama_poli }}</a></h3> -->
                        <h3 class="box-title">{{ $poli->nama_poli }}</h3>
                        <a href="#" class="btn btn-custom f-bold" onclick="showNomorAntrianModal()">Ambil Nomor</a>
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
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 Unimasoft All Rights
                            Reserved.</p>
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

    <script>
        function showNomorAntrianAlert() {
            Swal.fire({
                title: 'Nomor antrian sudah siap!',
                text: 'Silahkan ambil nomor antrian pada meja sebelah kanan anda.',
                icon: 'success',
                showConfirmButton: false, // Tidak menampilkan tombol
                timer: 10000 // Menghilang setelah 2 detik (2000 ms)
            });
        }
    </script>

    <script>
        // Menangani event ketika tombol ditekan
        document.querySelector("#tombol").addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah scroll dan pergerakan halaman saat tombol ditekan

            // Menambahkan kelas CSS untuk mencegah scroll
            document.body.style.overflow = 'hidden';

            // Menampilkan SweetAlert
            Swal.fire({
                title: 'Notifikasi',
                text: 'Pesan berhasil dikirim!',
                icon: 'success',
                position: 'center',
                showConfirmButton: true,
                confirmButtonText: 'Tutup',
            }).then(() => {
                // Mengembalikan scroll setelah SweetAlert ditutup
                document.body.style.overflow = '';
            });
        });

    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>