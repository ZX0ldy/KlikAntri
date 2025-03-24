<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik Antri</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assetsAdmin/images/icon/logo-.svg" type="image/png">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/icons.min.css') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/libs/date-picker/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/libs/datatable/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/libs/rating/css/rating-themes.css') }}">

    <!-- APP CSS -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/responsive.css') }}">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-lg-3,
        .col-md-4,
        .col-sm-6 {
            flex: 1 1 auto;
            margin-bottom: 1rem;
        }

        @media (max-width: 1200px) {
            .col-lg-3:last-child,
            .col-md-4:last-child,
            .col-sm-6:last-child {
                flex-basis: 100%;
            }

            .row .col-lg-3:last-child,
            .row .col-md-4:last-child,
            .row .col-sm-6:last-child {
                flex-basis: calc(25% - 1rem);
            }
        }
    </style>
</head>

<body class="sidebar-expand" onload="loadTheme()">
    <div class="wrapper">
        @include('partials.headerRole')

        @yield('content')

        <div class="overlay"></div>
    </div>

    <!-- SCRIPT -->
    <!-- jQuery and Plugins -->
    <script src="{{ asset('protend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('protend/libs/jquery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('protend/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('protend/libs/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('protend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('protend/libs/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('protend/libs/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('protend/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('protend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('protend/libs/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('protend/libs/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('protend/libs/rating/js/custom-ratings.js') }}"></script>
    <script src="{{ asset('protend/libs/rating/js/jquery.barrating.js') }}"></script>
    <script src="{{ asset('protend/libs/circle-progress/circle-progress.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('protend/js/countto.js') }}"></script>
    <script src="{{ asset('protend/js/main.js') }}"></script>
    <script src="{{ asset('protend/js/shortcode.js') }}"></script>
    <script src="{{ asset('protend/js/script.js') }}"></script>
    <script src="{{ asset('protend/js/pages/datepicker.js') }}"></script>
    <script src="{{ asset('protend/js/pages/chart-circle.js') }}"></script>

    <!-- Active Menu Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const currentUrl = window.location.href;
            const menuLinks = document.querySelectorAll(".sidebar-menu li a");

            menuLinks.forEach(link => {
                if (link.href === currentUrl) {
                    link.classList.add("active");
                } else {
                    link.classList.remove("active");
                }
            });
        });
    </script>

    <!-- SweetAlert Script -->
    <script>
        if (document.getElementById('akhiriButton')) {
            document.getElementById('akhiriButton').addEventListener('click', function () {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Antrian berhasil diakhiri.',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
