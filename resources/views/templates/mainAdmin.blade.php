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
</head>

<body class="sidebar-expand">
    <!-- MAIN CONTENT -->
    @include('partials.headerAdmin')

    @yield('content')
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->
    <script src="../documentation/javascript/script.js""></script>
    <script src="../assetsAdmin/libs/jquery/jquery.min.js"></script>
    <script src="../assetsAdmin/libs/jquery/jquery-ui.min.js"></script>
    <script src="../assetsAdmin/libs/moment/min/moment.min.js"></script>
    <script src="../assetsAdmin/libs/apexcharts/apexcharts.js"></script>
    <script src="../assetsAdmin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assetsAdmin/libs/peity/jquery.peity.min.js"></script>
    <script src="../assetsAdmin/libs/chart.js/Chart.bundle.min.js"></script>
    <script src="../assetsAdmin/libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assetsAdmin/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assetsAdmin/libs/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../assetsAdmin/js/countto.js"></script>
    <script src="../assetsAdmin/libs/date-picker/datepicker.js"></script>
    <script src="../assetsAdmin/libs/rating/js/custom-ratings.js"></script>
    <script src="../assetsAdmin/libs/rating/js/jquery.barrating.js"></script>
    <script src="../assetsAdmin/libs/circle-progress/circle-progress.min.js"></script>
    <script src="../assetsAdmin/libs/simplebar/simplebar.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk tombol delete
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const form = this.closest('form');
            
            const result = await Swal.fire({
                title: 'Apakah Yakin untuk Menghapus Data?',
                text: 'yakin untuk menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                allowOutsideClick: false
            });

            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
    
    // Cek tipe pesan dari session
    const hasCreateSuccess = @json(Session::has('create_success'));
    const hasDeleteSuccess = @json(Session::has('delete_success'));
    const hasError = @json(Session::has('error'));

    // Handle masing-masing tipe pesan
    if (hasCreateSuccess) {
        Swal.fire({
            title: 'Berhasil!',
            text: @json(Session::get('create_success')),
            icon: 'success'
        });
    }
    
    if (hasDeleteSuccess) {
        Swal.fire({
            title: 'Terhapus!',
            text: @json(Session::get('delete_success')),
            icon: 'success'
        });
    }
    
    if (hasError) {
        Swal.fire({
            title: 'Error!',
            text: @json(Session::get('error')),
            icon: 'error'
        });
    }
});
</script>

    <!-- APP JS -->
    <script src="../assetsAdmin/js/main.js"></script>.
    <script src="../assetsAdmin/js/shortcode.js"></script>
    <script src="../assetsAdmin/js/pages/datepicker.js"></script>
    <script src="../assetsAdmin/js/pages/chart-circle.js"></script>
        
</body>

</html>