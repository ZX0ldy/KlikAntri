    <!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Klik Antri
    </title>
    <link rel="shortcut icon" href="../assetsAdmin/images/icon/logo.svg" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">
    <!-- Plugin -->
    <link rel="stylesheet" href="../assetsAdmin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assetsAdmin/libs/date-picker/datepicker.css">
    <link rel="stylesheet" href="../assetsAdmin/libs/datatable/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../assetsAdmin/libs/rating/css/rating-themes.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <!-- APP CSS -->
    <link rel="stylesheet" href="../assetsAdmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assetsAdmin/css/grid.css">
    <link rel="stylesheet" href="../assetsAdmin/css/style.css">
    <link rel="stylesheet" href="../assetsAdmin/css/responsive.css">

    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-lg-3,
        .col-md-4,
        .col-sm-6 {
            flex: 1 1 auto;
            /* Kolom akan mengisi ruang yang tersedia */
            margin-bottom: 1rem;
            /* Spasi antar kolom */
        }

        @media (max-width: 1200px) {

            .col-lg-3:last-child,
            .col-md-4:last-child,
            .col-sm-6:last-child {
                flex-basis: 100%;
                /* Kolom terakhir memanjang sepenuhnya */
            }
        }

        @media (max-width: 1200px) {

            .row .col-lg-3:last-child,
            .row .col-md-4:last-child,
            .row .col-sm-6:last-child {
                flex-basis: calc(25% - 1rem);
                /* Lebar kolom terakhir menjadi 25% minus margin */
            }
        }


        /* Menempatkan elemen modal di tengah */
        .modal-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            /* Menjaga semua konten di kiri kecuali input/select */
            text-align: start;
            /* Menjaga teks di kiri */
            width: 100%;
            /* Pastikan modal body menggunakan seluruh lebar modal */
        }

        /* Gaya untuk modal yang aktif */
        .modal.active {
            display: block;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            border: none;
        }

        /* Menyesuaikan lebar modal secara kustom */
        .modal-dialog {
            top: -3%;
            max-width: 80%;
            /* Atur lebar modal menjadi lebih kecil jika diinginkan */
            width: 50%;
            /* Tentukan lebar modal */
        }

        /* Mengubah background dan border modal */
        .modal-content {
            border-radius: 10px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }

        /* Mengubah warna header modal */
        .modal-header {
            height: 70px;
            background-color: #FFFFFF;
            color: black;
            border-bottom: 1px solid #999999;
            align-items: center;
        }

        .modal-title {
            padding-bottom: 30px;
        }

        .modal-footer {
            border: none;
            text-align: center;
        }

        /* Menambahkan jarak pada tombol */
        .modal-footer .btn {
            margin: 10px 0;
        }

        /* Menargetkan input dan select di dalam modal */
        .modal-body input,
        .modal-body select {
            width: 90%;
            /* Mengatur lebar input dan select menjadi 80% */
            margin: 5px 0;
            /* Menambahkan jarak vertikal antar elemen */
            align-self: center;
            /* Memastikan input dan select berada di tengah */
        }
    </style>
</head>


@include('partials.headerDokter')

@yield('content')

<body class="sidebar-expand">
<div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->
    <script src="../protend/libs/jquery/jquery.min.js"></script>
    <script src="../protend/libs/jquery/jquery-ui.min.js"></script>
    <script src="../protend/libs/moment/min/moment.min.js"></script>
    <script src="../protend/libs/apexcharts/apexcharts.js"></script>
    <script src="../protend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../protend/libs/peity/jquery.peity.min.js"></script>
    <script src="../protend/libs/chart.js/Chart.bundle.min.js"></script>
    <script src="../protend/libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="../protend/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../protend/libs/simplebar/simplebar.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Ambil URL halaman saat ini
            const currentUrl = window.location.href;

            // Cari semua link di sidebar
            const menuLinks = document.querySelectorAll(".sidebar-menu li a");

            // Loop untuk mencocokkan URL dan menambahkan class active
            menuLinks.forEach(link => {
                if (link.href === currentUrl) {
                    link.classList.add("active");
                } else {
                    link.classList.remove("active");
                }
            });
        });
    </script>

    <script>
        // Mendapatkan referensi ke tombol
        var akhiriButton = document.getElementById('akhiriButton');

        // Menambahkan event listener untuk klik pada tombol
        akhiriButton.addEventListener('click', function () {
            // Menampilkan SweetAlert
            Swal.fire({
                title: 'Berhasil!',
                text: 'Antrian berhasil diakhiri.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        });
    </script>

    <!-- Modal -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modalElement = document.getElementById("rujukanModal");

            // Inisialisasi modal Bootstrap
            const myModal = new bootstrap.Modal(modalElement, {
                backdrop: true, // Aktifkan backdrop
                keyboard: true  // Aktifkan penutupan dengan tombol Esc
            });

            // Event listener untuk mendeteksi penutupan modal
            modalElement.addEventListener("hidden.bs.modal", () => {
                console.log("Modal telah ditutup");
            });
        });
    </script>

    <!-- Notifikasi -->
    <script>
        function showCustomAlert() {
            var alertBox = document.getElementById('customAlert');
            alertBox.style.display = 'block'; // Tampilkan notifikasi

            // Menutup notifikasi otomatis setelah 3 detik
            setTimeout(function () {
                closeCustomAlert(); // Tutup notifikasi setelah 3 detik
            }, 3000);
        }

        function closeCustomAlert() {
            var alertBox = document.getElementById('customAlert');
            alertBox.style.display = 'none'; // Sembunyikan notifikasi
        }

        // Fungsi untuk menampilkan notifikasi SweetAlert setelah submit
        function showSweetAlert() {
            Swal.fire({
                title: 'Success!',
                text: 'Your form has been submitted.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }

        // Event handler untuk tombol submit pada modal
        document.getElementById('submitButton').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah form submit default
            showSweetAlert(); // Tampilkan notifikasi SweetAlert
            // Lakukan submit form atau aksi lainnya di sini
        });
    </script>

    <!-- APP JS -->
    <script src="../protend/js/script.js"></script>
    <script src="../protend/js/main.js"></script>
    <script src="../protend/js/shortcode.js"></script>
    <script src="../protend/js/pages/datepicker.js"></script>
    <script src="../protend/js/pages/chart-circle.js"></script>

</body>

</html>