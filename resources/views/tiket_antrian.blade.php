<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Antrean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Sometype+Mono:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'sometype-mono', monospace;
        }

        .container {
            margin-top: 20vh;
        }

        .table-dotted {
            border-collapse: collapse;
        }

        .table-dotted th,
        .table-dotted td {
            border: 2px dotted black;
            /* Menggunakan dotted border */
            padding: 8px;
        }

        .logo {
            width: 100px;
        }

        p {
            font-size: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="col-lg-4 col-md-4 col-sm-4 mx-auto">
            <table class="table table-dotted">
                <thead>
                    <tr>
                        <td>
                            <img src="assets/logos/logo1380.png" alt="Logo KlikAntri" class="logo mb-3">
                            <p>Jl. Kemarau Selatan No. 32 - Kota Malang 65141 Indonesia</p>
                            <p>Telp: +163 654 3569 Email : inforumahsakit@gmail.com</p>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>TANGGAL : {{ $tanggalCetak }}</p>
                            <h1>{{ $nomorAntrian }}</h1>
                            <p>JAM PELAYANAN</p>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <p>KUPON HANYA BERLAKU PADA HARI DICETAK</p>
                            <p>TERIMA KASIH ATAS KUNJUNGAN ANDA</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
