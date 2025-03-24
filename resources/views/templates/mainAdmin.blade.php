<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Klik Antri
    </title>
    <link rel="shortcut icon" href="../../assetsAdmin/images/icon/logo-.svg" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">
    <!-- Plugin -->
    <link rel="stylesheet" href="../../assetsAdmin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../assetsAdmin/libs/date-picker/datepicker.css">
    <link rel="stylesheet" href="../../assetsAdmin/libs/datatable/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../../assetsAdmin/libs/rating/css/rating-themes.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- APP CSS -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="../../assetsAdmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assetsAdmin/css/grid.css">
    <link rel="stylesheet" href="../../assetsAdmin/css/style.css">
    <link rel="stylesheet" href="../../assetsAdmin/css/responsive.css">
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <style>
       .preview-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 25px;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .preview-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .preview-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .preview-header i {
            font-size: 20px;
            margin-right: 10px;
            color: #3498db;
        }

        .preview-header h5 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .marquee-preview {
            overflow: hidden;
            white-space: nowrap;
            background-color: #333;
            color: white;
            padding: 10px 0;
            border-radius: 6px;
        }

        .marquee-preview-text {
            display: inline-block;
            animation: marquee 15s linear infinite;
            padding: 0 20px;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .hero-preview {
            height: 120px;
            background-size: cover;
            background-position: center;
            border-radius: 6px;
            margin-bottom: 15px;
            position: relative;
        }

        .logo-preview-container {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
            margin-top: 20px;
        }

        .logo-preview {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo-preview img {
            max-height: 60px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #444;
        }

        #previewMarqueeSpeed {
            font-weight: bold;
            color: #3498db;
        }

        .speed-slider {
            width: 100%;
            height: 8px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .file-upload-container {
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .file-upload-container input[type="file"] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-upload {
            border: 2px dashed #ccc;
            color: #6c757d;
            background-color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-upload:hover {
            border-color: #3498db;
            color: #3498db;
        }

        .btn-upload i {
            font-size: 24px;
            margin-right: 10px;
        }

        .upload-label {
            display: block;
            margin-bottom: 8px;
        }

        .settings-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .settings-header {
            margin-bottom: 15px;
            color: #2c3e50;
            font-weight: 600;
        }

        .save-changes-container {
            background-color: #fff;
            border-top: 1px solid #e0e0e0;
            padding: 20px 0;
            text-align: right;
        }

        .preview-description {
            color: #666;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .marquee-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .marquee-controls select {
            width: 120px;
        }

        .current-image-preview {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 4px;
            font-size: 0.85rem;
            color: #666;
        }

        .current-image-preview i {
            margin-right: 5px;
            color: #3498db;
        }
    </style> --}}
</head>

<body class="sidebar-expand">
    <!-- MAIN CONTENT -->
    @include('partials.headerAdmin')
        @if(session('success'))
    <script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success"
    });
    </script>
    @endif

    @if(session('error'))
    <script>
    Swal.fire({
        title: "Gagal!",
        text: "{{ session('error') }}",
        icon: "error"
    });
    </script>
    @endif
    @yield('content')
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->
    <script src="../../documentation/javascript/script.js""></script>
    <script src="../../assetsAdmin/libs/jquery/jquery.min.js"></script>
    <script src="../../assetsAdmin/libs/jquery/jquery-ui.min.js"></script>
    <script src="../../assetsAdmin/libs/moment/min/moment.min.js"></script>
    <script src="../../assetsAdmin/libs/apexcharts/apexcharts.js"></script>
    <script src="../../assetsAdmin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assetsAdmin/libs/peity/jquery.peity.min.js"></script>
    <script src="../../assetsAdmin/libs/chart.js/Chart.bundle.min.js"></script>
    <script src="../../assetsAdmin/libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="../../assetsAdmin/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assetsAdmin/libs/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../assetsAdmin/js/countto.js"></script>
    <script src="../../assetsAdmin/libs/date-picker/datepicker.js"></script>
    <script src="../../assetsAdmin/libs/rating/js/custom-ratings.js"></script>
    <script src="../../assetsAdmin/libs/rating/js/jquery.barrating.js"></script>
    <script src="../../assetsAdmin/libs/circle-progress/circle-progress.min.js"></script>
    <script src="../../assetsAdmin/libs/simplebar/simplebar.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('#deleteButton').forEach(button => {
                button.addEventListener('click', function () {
                    let poliId = this.getAttribute('data-target');
                    if (confirm('Apakah Anda yakin ingin menghapus poli ini?')) {
                        fetch(`/poli/${poliId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Poli berhasil dihapus');
                                location.reload();
                            } else {
                                alert('Gagal menghapus poli: ' + data.message);
                            }
                        }).catch(error => console.error('Error:', error));
                    }
                });
            });
        });
        </script>

    <script>
<>
document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk tombol delete
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const form = this.closest('form');

            const result = await Swal.fire({
                title: 'Hapus Data Ini?',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                allowOutsideClick: false
            });

            if (result.isConfirmed) {
                form.submit();  // Mengirimkan form untuk menghapus data
            } else {
                Swal.fire({
                    title: 'Dibatalkan!',
                    text: 'Data tidak dihapus.',
                    icon: 'info'
                });
            }
        });
    });

    // Menggunakan data dari appData yang sudah didefinisikan
    const { messages } = appData;

    // Handle masing-masing tipe pesan
    if (messages.hasCreateSuccess === true) {
        Swal.fire({
            title: 'Berhasil!',
            text: messages.createSuccessText,
            icon: 'success'
        });
    }

    if (messages.hasDeleteSuccess === true) {
        Swal.fire({
            title: 'Terhapus!',
            text: messages.deleteSuccessText,
            icon: 'success'
        });
    }

    if (messages.hasError === true) {
        Swal.fire({
            title: 'Error!',
            text: messages.errorText,
            icon: 'error'
        });
    }
});
</script>

    <!-- APP JS -->
    <script src="../../assetsAdmin/js/main.js"></script>.
    <script src="../../assetsAdmin/js/shortcode.js"></script>
    <script src="../../assetsAdmin/js/pages/datepicker.js"></script>
    <script src="../../assetsAdmin/js/pages/chart-circle.js"></script>

</body>

</html>
