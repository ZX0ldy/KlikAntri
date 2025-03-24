<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Klik Antri
    </title>
 <link rel="shortcut icon" href="../assetsAdmin/images/icon/logo-.svg" type="image/png">
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- APP CSS -->
    <link rel="stylesheet" href="../assetsAdmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assetsAdmin/css/grid.css">
    <link rel="stylesheet" href="../assetsAdmin/css/style.css">
    <link rel="stylesheet" href="../assetsAdmin/css/responsive.css">
</head>
<style>
    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        zoom: 0.9;
    }

    .fs-15 {
        font-size: 15px;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fs-13 {
        font-size: 13px;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-11 {
        font-size: 11px;
    }

    .fs-10 {
        font-size: 10px;
    }

    a {
        color: #81CEEA;
    }

    .left-section {
        background: #ffffff;
        display: flex;
        align-items: center;
        /* Mengatur gambar ke atas */
        justify-content: center;
        width: 80%;

    }

    .left-section img {
        max-width: 65%;
        height: auto;
    }

    .right-section {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50%;
        padding-top: 60px;
        background-color: #ffffff;
    }

    .login-form {
        width: 100%;
        max-width: 400px;
        padding: 20px;
    }

    .login-form h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .login-form p {
        text-align: center;
        margin-bottom: 20px;
        font-size: 10px;
    }

    .sign-link p {
        font-size: 12px;
        color: #999999;
    }

    .login-form .btn-primary {
        background: linear-gradient(120deg, #3A8EF6 10%, #5661F8 100%);
        border: none;
        height: 50px;
        border-radius: 15px;
    }

    .login-form .btn-primary:hover {
        background: linear-gradient(120deg, #5661F8 10%, #3A8EF6 100%);
    }

    /* Media query untuk layar kecil */
    @media (max-width: 768px) {
        .left-section {
            display: none;
            justify-content: center
        }

        .right-section {
            width: 100%;
        }

    }

    .login-input {
        width: 100%;
        padding: 10px 15px;
        font-size: 14px;
        border: 1.5px solid #999999;
        /* Border dengan warna lembut */
        border-radius: 15px;
        /* Membuat sudut melengkung */
        outline: none;
        box-shadow: none;
        /* Hilangkan shadow default */
        transition: border-color 0.3s ease-in-out;
    }
</style>
</head>

<body>

@yield('content')

</body>

<!-- Left Image Section (sekarang di sebelah kanan) -->


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

    <!-- APP JS -->
    <script src="../protend/js/script.js"></script>
    <script src="../protend/js/main.js"></script>
    <script src="../protend/js/shortcode.js"></script>
    <script src="../protend/js/pages/datepicker.js"></script>
    <script src="../protend/js/pages/chart-circle.js"></script>

</body>

</html>
