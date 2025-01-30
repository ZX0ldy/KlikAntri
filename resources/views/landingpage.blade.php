<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Klik Antri +</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
            font-family: 'Poppins', sans-serif;
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
            height: auto;
            max-width: 50%;
            max-height: 50%;
            min-width: 25%;
            min-height: 25%;
            object-fit: contain;
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

        /* Mengatur tinggi card agar konsisten */
        .card {
            height: 300px;
            width: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            border-radius: 30px;
        }

        /* Menyesuaikan tinggi gambar agar proporsional */
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 30px 30px 0 0;
        }

        /* Text berada di bawah */
        .card-text {
            text-align: center;
            margin-top: auto;
        }

        .custom-modal-width {
            max-width: 80%;
            /* Atur lebar modal sesuai kebutuhan */
        }

        .biru {
            color: #3A8EF6;
        }

        .bg-blue {
            background-color: rgba(22, 120, 242, 1) !important;
            /* Warna biru dengan opacity 100% */
            color: white;
        }

        .bg-blue-opacity {
            background-color: rgba(22, 120, 242, 0.2);
            /* Warna biru dengan opacity 20% */
        }

        .bg-disabled {
            background-color: #ccc;
            /* Warna abu-abu untuk disabled */
            pointer-events: none;
            /* Disable pointer events */
            color: white;
            /* Warna teks putih */
        }

        .section {
            will-change: transform;
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

        .faq-section {
            padding: 50px 15px;
        }

        .faq-section .sec-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .faq-section .accordion-button {
            background-color: white;
            color: #333;
            font-weight: bold;
            box-shadow: none;
            border: none;
            padding: 15px 20px;
            border-radius: 8px;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .faq-section .accordion-button:focus {
            box-shadow: none;
        }

        .faq-section .accordion-button:not(.collapsed) {
            background-color: #f1f5f9;
            color: #0d6efd;
        }

        .faq-section .accordion-icon {
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 15px;
        }

        .faq-section .accordion-item {
            border: none;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-section .accordion-body {
            padding: 15px;
            font-size: 0.95rem;
            color: #555;
        }

        .modal-content {
            border-radius: 20px;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .modal-header {
            border: none;
            padding: 10px;
            width: 100%;
            text-align: center;
            border-radius: 20px 20px 0 0;
            font-size: 1.2rem;
        }

        .custom-modal-size {
            max-width: 80%;
            width: 60rem;
            height: 10vh;
            /* Tinggi akan menyesuaikan konten */
            margin: auto;
            /* Pusatkan modal */
        }

        .custom-modal-size-2 {
            max-width: 80%;
            width: 60rem;
            height: 100px;
            margin: auto;
        }

        @media (max-width: 768px) {
            .custom-modal-size {
                max-width: 95%;
                /* Sesuaikan modal untuk layar kecil */
                width: auto;
            }

            .modal-header {
                font-size: 1rem;
                /* Ukuran font lebih kecil untuk layar kecil */
            }
        }

        .doc-img {
            max-width: 200px;
            width: 200px;
            height: 250px;
        }

        .detail-image {
            padding-right: 20px;
        }

        .main-title {
            display: flex;
            background: linear-gradient(120deg, #3A8EF6 1%, #5661F8 70%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: bold;
        }

        .title2 {
            background: linear-gradient(120deg, #3A8EF6 1%, #5661F8 70%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .day{
            font-size: 15px;
            padding: 0%;
        }
        
        .time{
            font-size: 15px;
            padding: 0%;
        }
    </style>
</head>

<body>
    <!-- Modal nomorAntrianModal -->
    <div class="modal fade" id="nomorAntrianModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true"
        data-bs-backdrop="true">
        <div class="modal-dialog custom-modal-size modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="modal-header">
                            <h4 class="main-title">Poli Gigi</h4>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-4 text-center doc-img">
                                <img src="assets/photos/drg.Jennie.png" class="card-img" alt="Foto 1"
                                    onclick="showDetailModal('assets/photos/drg.Jennie.png', 'DR. Jennie')">
                                <p>Dokter</p>
                            </div>
                            <div class="col-4 text-center doc-img">
                                <img src="assets/photos/drg.Lisa.png" class="card-img" alt="Foto 2"
                                    onclick="showDetailModal('assets/photos/drg.Lisa.png', 'DR. Lisa')">
                                <p>Dokter</p>
                            </div>
                            <div class="col-4 text-center doc-img">
                                <img src="assets/photos/drg.Rose.png" class="card-img" alt="Foto 3"
                                    onclick="showDetailModal('assets/photos/drg.Rose.png', 'DR. Rose')">
                                <p>Dokter</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detailModal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-size-2 modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-body d-flex">
                    <div class="col-3">
                        <img id="detailImage" src="" class="img-fluid detail-image" alt="Detail Foto">
                    </div>
                    <div class="col-9">
                        <div class="dr-bio">
                            <h5 id="doctorName" class="mb-1">DR. Lisa</h5>
                            <p class="mb-1 biru title-2">Dokter Gigi</p>
                        </div>
                        <p class="mb-2">Jadwal Praktek</p>
                        <div class="row mb-2">
                            <div class="col text-center border-custom rounded-pill mx-0 day" data-day="senin">Senin</div>
                            <div class="col text-center border-custom rounded-pill mx-0 day" data-day="selasa">Selasa</div>
                            <div class="col text-center border-custom rounded-pill mx-0 day" data-day="rabu">Rabu</div>
                            <div class="col text-center border-custom rounded-pill mx-0 day" data-day="kamis">Kamis</div>
                            <div class="col text-center border-custom rounded-pill mx-0 day" data-day="jumat">Jumat</div>
                            <div class="col text-center border-custom rounded-pill mx-0 day" data-day="sabtu">Sabtu</div>
                        </div>
                        <div class="row mt-2 mb-4">
                            <div class="col text-center border-custom rounded mx-0 time" data-day="senin">14.00-16.00</div>
                            <div class="col text-center border-custom rounded mx-0 time" data-day="selasa">14.00-16.00</div>
                            <div class="col text-center border-custom rounded mx-0 time" data-day="rabu">14.00-16.00</div>
                            <div class="col text-center border-custom rounded mx-0 time" data-day="kamis">14.00-16.00</div>
                            <div class="col text-center border-custom rounded mx-0 time" data-day="jumat"></div>
                            <div class="col text-center border-custom rounded mx-0 time" data-day="sabtu">14.00-16.00</div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <button type="button" class="btn btn-primary">Reservasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- FAQ -->
    <!-- FAQ Section -->
    <section id="faq" class="faq-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center mb-5">
                    <h4 class="sec-title">FAQ</h4>
                    <h4 class="sec-title">Frequently Asked Questions</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1-heading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                    <span class="accordion-icon">-</span>
                                    How long until we deliver your first blog post?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1-heading"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Really boy law county she unable her sister. Feet you off its like like six. Among
                                    sex are leave law built now. In built table in an rapid blush. Merits behind on
                                    afraid or warmly.
                                </div>
                            </div>
                        </div>
                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2-heading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                    <span class="accordion-icon">+</span>
                                    How can I make an appointment?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2-heading"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can make an appointment by calling our service center or using our online
                                    booking system.
                                </div>
                            </div>
                        </div>
                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3-heading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                    <span class="accordion-icon">+</span>
                                    What are the visiting hours?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3-heading"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Visiting hours are from 9 AM to 8 PM every day.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer_bg_1.jpg">
        <div class="copyright-wrap" style="background-color: #0A0E31;">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-7">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2025 Klik Antri +.</p>
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
    <!-- Bootstrap Js File -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
        function showNomorAntrianModal() {
            const modal = new bootstrap.Modal(document.getElementById('nomorAntrianModal'));
            modal.show();
        }
    </script>

    <script>
        function showDetailModal(imageSrc, doctorName) {
            const detailImage = document.getElementById('detailImage');
            detailImage.src = imageSrc;
            const doctorNameElement = document.getElementById('doctorName');
            doctorNameElement.textContent = doctorName;
            const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
            detailModal.show();
        }
    </script>

    <script>
        function showDetailModal(imageSrc, doctorName) {
            const detailImage = document.getElementById('detailImage');
            detailImage.src = imageSrc;
            const doctorNameElement = document.getElementById('doctorName');
            doctorNameElement.textContent = doctorName;

            // Update day background colors based on time availability
            document.querySelectorAll('.day').forEach(dayElement => {
                const day = dayElement.getAttribute('data-day');
                const timeElement = document.querySelector(`.time[data-day="${day}"]`);
                if (timeElement && timeElement.textContent.trim() !== '') {
                    dayElement.classList.add('bg-blue-opacity');
                    dayElement.classList.remove('bg-disabled');
                } else {
                    dayElement.classList.add('bg-disabled');
                    dayElement.classList.remove('bg-blue-opacity');
                }
            });

            const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
            detailModal.show();
        }

        // Handle day click to toggle background color between blue with 100% opacity and blue with 20% opacity
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.day').forEach(dayElement => {
                dayElement.addEventListener('click', () => {
                    if (!dayElement.classList.contains('bg-disabled')) {
                        document.querySelectorAll('.day').forEach(el => {
                            el.classList.remove('bg-blue');
                            el.classList.add('bg-blue-opacity');
                        });
                        dayElement.classList.remove('bg-blue-opacity');
                        dayElement.classList.add('bg-blue');
                    }
                });
            });
        });
    </script>

    <script>
        // Perbaikan untuk ikon + dan -
        const accordionButtons = document.querySelectorAll('.accordion-button');

        accordionButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Atur ulang semua ikon ke +
                accordionButtons.forEach(btn => {
                    const icon = btn.querySelector('.accordion-icon');
                    icon.textContent = '+';
                });

                // Ubah ikon pada tombol yang aktif ke -
                if (!button.classList.contains('collapsed')) {
                    const icon = button.querySelector('.accordion-icon');
                    icon.textContent = '-';
                }
            });
        });
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>