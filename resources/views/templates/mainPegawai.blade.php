<!DOCTYPE html>
<html lang="en">

<head>
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
    </style>
</head>

<body class="sidebar-expand" onload="loadTheme()"></body>

@include('partials.headerPegawai')

@yield('content')

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
<script src="../protend/libs/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="../protend/js/countto.js"></script>
<script src="../protend/libs/date-picker/datepicker.js"></script>
<script src="../protend/libs/rating/js/custom-ratings.js"></script>
<script src="../protend/libs/rating/js/jquery.barrating.js"></script>
<script src="../protend/libs/circle-progress/circle-progress.min.js"></script>
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
<!-- APP JS -->
<script src="../protend/js/main.js"></script>
<script src="../protend/js/shortcode.js"></script>
<script src="../protend/js/script.js"></script>
<script src="../protend/js/pages/datepicker.js"></script>
<script src="../protend/js/pages/chart-circle.js"></script>

</body>

</html>