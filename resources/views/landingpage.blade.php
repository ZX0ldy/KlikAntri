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
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800&family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- ...existing code... -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>
    <div class="modal fade" id="reservasiModal" tabindex="-1" aria-labelledby="reservasiModalLabel" aria-hidden="true"
    data-bs-backdrop="true">
    <div class="modal-dialog custom-modal-size modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="modal-header d-flex justify-content-between align-items-center w-100">
                        <h5 class="main-title mb-0 fw-bold">Reservasi Online</h5>
                        <span class="fs-6 fw-bold text-primary d-flex align-items-center" id="jamOperasional">
                            <i class="bi bi-clock"></i> Jam Operasional:
                            <span id="jam_buka" class="mx-1"></span> -
                            <span id="jam_tutup" class="ms-1"></span>
                        </span>
                    </div>

                    <form id="reservasiForm" class="needs-validation" novalidate method="POST" action="{{ route('reservasi.store') }}">
                        @csrf
                        <input type="hidden" id="poliIdInput" name="poli_id" value="">
                        <input type="hidden" id="jamBukaInput" name="jam_buka" value="">
                        <input type="hidden" id="jamTutupInput" name="jam_tutup" value="">

                        <div class="row justify-content-center mt-3">
                            <div class="col-12 mb-3">
                                <label for="poliInput" class="form-label">Poli</label>
                                <input type="text" class="form-control" id="poliInput" placeholder="" disabled>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="tanggal">Pilih Tanggal Daftar</label>
                                <select name="tanggal" id="tanggal" class="form-select" required>
                                    <!-- Options will be populated by JavaScript -->
                                </select>
                                <div class="invalid-feedback">
                                    Silakan pilih tanggal kunjungan!
                                </div>
                                <small class="text-muted">Waktu server: WIB (GMT+7)</small>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="alasan" class="form-label">Alasan</label>
                                <input type="text" class="form-control text-gray-200" id="nama" name="alasan" placeholder="Beri alasan.." required>
                                <div class="invalid-feedback">
                                    Alasan wajib diisi!
                                </div>
                                <span class="fs-6 fw-bold text-danger d-block mt-2" id="sisaKuota">
                                    <i class="bi bi-people"></i> Kuota antrian tersisa: -
                                </span>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-custom" id="downloadPDF">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

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
                        <div class="service-card">
                            <div class="box-shape">
                                <img src="assetsLanding/img/bg/service_card_bg.png" alt="Service">
                            </div>
                            <div class="box-icon">
                                <img src="{{ asset($poli->icon_image) }}" alt="Icon">
                            </div>
                            <h3 class="box-title">{{ $poli->nama_poli }}</h3>
                            <button type="button" class="btn btn-custom f-bold"
                                onclick="showReservasiModal({{ $poli->id }}, '{{ $poli->nama_poli }}', '{{ $poli->jam_buka }}', '{{ $poli->jam_tutup }}', {{ $poli->kuota_tersisa }})">
                                Ambil Nomor
                            </button>
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
    <!-- Bootstrap Js File -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modified Reservation Modal Script -->
<script>
    function showReservasiModal(poliId, poliName, jamBuka, jamTutup, kuotaTersisa) {
        // Set poli_id di input hidden
        document.getElementById('poliIdInput').value = poliId;

        // Store jam operasional in hidden inputs
        document.getElementById('jamBukaInput').value = jamBuka;
        document.getElementById('jamTutupInput').value = jamTutup;

        // Tampilkan nama poli di input teks
        document.getElementById('poliInput').value = poliName;

        // Set jam buka dan jam tutup di modal
        document.getElementById('jam_buka').textContent = jamBuka || 'N/A';
        document.getElementById('jam_tutup').textContent = jamTutup || 'N/A';

        // Set kuota antrean tersisa
        document.getElementById('sisaKuota').innerHTML = `<i class="bi bi-people"></i> Kuota antrian tersisa: ${kuotaTersisa >= 0 ? kuotaTersisa : 0}`;

        // Pastikan event listener untuk submit hanya ditambahkan sekali
        let form = document.getElementById('reservasiForm');
        form.onsubmit = function(event) {
            let poliIdValue = document.getElementById('poliIdInput').value;

            if (!poliIdValue) {
                event.preventDefault(); // Mencegah form terkirim jika poli_id kosong
                console.error("poli_id tidak terisi!");

                // Replace alert with SweetAlert2
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan: poli_id tidak ditemukan. Silakan pilih poli kembali.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        };

        // Buka modal
        let modal = new bootstrap.Modal(document.getElementById('reservasiModal'));
        modal.show();
    }
</script>

<!-- Improved Reservation System Script -->
<script>
    // Reservation handling script for KlikAntri
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the reservation form functionality
        initReservationSystem();
    });

    function initReservationSystem() {
        // Elements
        const reservasiForm = document.getElementById("reservasiForm");
        const downloadPDFBtn = document.getElementById("downloadPDF");
        const poliInput = document.getElementById("poliInput");
        const tanggalSelect = document.getElementById("tanggal");
        const alasanInput = document.getElementById("nama"); // Note: id "nama" is used for "alasan"

        // Populate dates (today and tomorrow)
        populateDates();

        // Handle form submission
        if (downloadPDFBtn) {
            downloadPDFBtn.addEventListener("click", function(event) {
                handleReservationSubmit(event);
            });
        }

        // Form validation setup
        if (reservasiForm) {
            reservasiForm.addEventListener('submit', function(event) {
                if (!this.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                this.classList.add('was-validated');
            });
        }
    }

    function populateDates() {
        const tanggalSelect = document.getElementById("tanggal");
        if (!tanggalSelect) return;

        // Clear existing options
        tanggalSelect.innerHTML = "";

        // Get today and tomorrow dates
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1);

        // Format dates
        const todayFormatted = formatDate(today);
        const tomorrowFormatted = formatDate(tomorrow);

        // Add options
        const todayOption = document.createElement("option");
        todayOption.value = formatDateValue(today);
        todayOption.textContent = `Hari Ini (${todayFormatted})`;
        tanggalSelect.appendChild(todayOption);

        const tomorrowOption = document.createElement("option");
        tomorrowOption.value = formatDateValue(tomorrow);
        tomorrowOption.textContent = `Besok (${tomorrowFormatted})`;
        tanggalSelect.appendChild(tomorrowOption);
    }

    function formatDate(date) {
        const day = date.getDate();
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                           "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const month = monthNames[date.getMonth()];
        const year = date.getFullYear();

        return `${day} ${month} ${year}`;
    }

    function formatDateValue(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }

    // Modified function with time validation improvement
    function handleReservationSubmit(event) {
        // Get form elements
        const poliInput = document.getElementById("poliInput");
        const tanggalSelect = document.getElementById("tanggal");
        const alasanInput = document.getElementById("nama");
        const downloadPDFBtn = document.getElementById("downloadPDF");
        const reservasiForm = document.getElementById("reservasiForm");
        const jamBuka = document.getElementById("jamBukaInput").value;
        const jamTutup = document.getElementById("jamTutupInput").value;

        // Validate required fields
        if (!alasanInput.value.trim()) {
            event.preventDefault();
            alasanInput.classList.add("is-invalid");

            Swal.fire({
                title: 'Error!',
                text: 'Alasan wajib diisi sebelum melanjutkan.',
                icon: 'error',
                confirmButtonText: 'OK'
            });

            alasanInput.focus();
            return;
        }

        // Check time restrictions only for same-day reservations
        const selectedDate = new Date(tanggalSelect.value);
        const today = new Date();

        // Reset date portions to compare only the dates
        const todayDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());
        const selectedDateOnly = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), selectedDate.getDate());

        if (selectedDateOnly.getTime() === todayDate.getTime()) {
            // Only apply time restriction for today's reservations
            const currentHour = today.getHours();
            const currentMinute = today.getMinutes();

            // Parse operational hours
            const openTimeParts = jamBuka.split(':').map(Number);
            const closeTimeParts = jamTutup.split(':').map(Number);

            const openHour = openTimeParts[0];
            const openMinute = openTimeParts[1] || 0;
            const closeHour = closeTimeParts[0];
            const closeMinute = closeTimeParts[1] || 0;

            // Convert to minutes for easier comparison
            const currentTimeMinutes = (currentHour * 60) + currentMinute;
            const openTimeMinutes = (openHour * 60) + openMinute;
            const closeTimeMinutes = (closeHour * 60) + closeMinute;

            if (currentTimeMinutes < openTimeMinutes || currentTimeMinutes > closeTimeMinutes) {
                event.preventDefault();

                Swal.fire({
                    title: 'Informasi',
                    text: `Reservasi untuk hari ini hanya dapat dilakukan pada jam operasional: ${jamBuka} - ${jamTutup}`,
                    icon: 'info',
                    confirmButtonText: 'OK'
                });

                return;
            }
        }

        // Form is valid, proceed with submission
        alasanInput.classList.remove("is-invalid");

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Show loading state
        downloadPDFBtn.disabled = true;
        downloadPDFBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...';

        // Create FormData for AJAX submission
        const formData = new FormData();
        formData.append('poli_id', document.getElementById('poliIdInput').value);
        formData.append('tanggal', tanggalSelect.value);
        formData.append('alasan', alasanInput.value);
        formData.append('_token', csrfToken);

        // Send AJAX request to Laravel backend
        fetch('/reservasi/store', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Generate and download PDF with the returned queue number
                createPDF({
                    poli_name: poliInput.value,
                    tanggal_text: tanggalSelect.options[tanggalSelect.selectedIndex].text,
                    alasan: alasanInput.value,
                    nomor_antrian: data.data.nomor_antrian
                });

                // Show success message
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Reservasi berhasil dibuat. Nomor antrian Anda: ' + data.data.nomor_antrian,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Close modal
                const reservasiModal = bootstrap.Modal.getInstance(document.getElementById("reservasiModal"));
                if (reservasiModal) {
                    reservasiModal.hide();
                }

                // Reset form
                reservasiForm.reset();
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: data.message || 'Terjadi kesalahan saat membuat reservasi.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error("Error saving reservation:", error);
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim data. Silakan coba lagi.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        })
        .finally(() => {
            // Reset button state
            downloadPDFBtn.disabled = false;
            downloadPDFBtn.innerHTML = 'Submit';
        });
    }

    // Replace this event listener to use SweetAlert2
    document.getElementById('reservasiForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah submit default
        handleReservationSubmit(event);
    });

    // Enhanced PDF generation function
    function createPDF(data) {
        // Make sure jsPDF is properly loaded
        if (typeof window.jspdf === 'undefined') {
            console.error('jsPDF is not loaded properly');

            // Replace alert with SweetAlert2
            Swal.fire({
                title: 'Error!',
                text: 'Tidak dapat membuat PDF: jsPDF tidak tersedia',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        try {
            // Use jsPDF
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const pageWidth = doc.internal.pageSize.width;

            // Function to center text
            function centerText(text, y, fontSize = 12) {
                doc.setFontSize(fontSize);
                const textWidth = doc.getTextWidth(text);
                doc.text(text, (pageWidth - textWidth) / 2, y);
            }

            doc.setFont("courier", "bold");
            doc.setFontSize(12);

            centerText("TIKET ANTREAN", 30, 16);
            centerText("Jl. Kemarau Selatan No. 32 - Kota Malang 65141 Indonesia", 40, 10);
            centerText("Telp: +163 654 3569 Email : inforumahsakit@gmail.com", 45, 10);

            doc.line(20, 50, 190, 50); // Divider line

            // Add patient name/reason to PDF
            centerText("ALASAN: " + data.alasan, 60, 12);

            // Add polyclinic to PDF
            centerText("POLI: " + data.poli_name, 70, 12);

            // Add date to PDF
            centerText("TANGGAL: " + data.tanggal_text, 80, 12);

            centerText("NOMOR ANTRIAN:", 90, 12);
            centerText(data.nomor_antrian, 105, 35); // Make queue number larger

            centerText("JAM PELAYANAN", 125, 12);
            centerText("001 - 010 : 09:00 - 11:30", 135, 12);
            centerText("011 - 020 : 13:00 - 15:30", 145, 12);

            doc.line(20, 155, 190, 155);

            centerText("KUPON HANYA BERLAKU PADA HARI DICETAK", 165, 10);
            centerText("TERIMA KASIH ATAS KUNJUNGAN ANDA", 175, 10);

            // Download the PDF
            doc.save("tiket_antrean_" + data.nomor_antrian + ".pdf");

            // Add success notification (optional)
            Swal.fire({
                title: 'Sukses!',
                text: 'Tiket antrian berhasil diunduh',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        } catch (error) {
            console.error('Error creating PDF:', error);

            // Show error with SweetAlert2
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat membuat PDF: ' + error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }
</script>

    <script src="assets/js/main.js"></script>
</body>

</html>
