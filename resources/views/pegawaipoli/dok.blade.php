@extends('templates.mainDokter')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid p-0">
            <!-- Page Header -->
            <div class="page-header d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="page-title fw-bold text-primary">
                        <i class='bx bx-clipboard me-2'></i>Antrian {{ $user->poli->nama_poli }}
                    </h1>
                    <p class="text-muted">Manajemen dan pelayanan pasien</p>
                </div>
                <div class="date-display rounded-pill px-4 py-2 bg-light border">
                    <i class='bx bx-calendar me-2'></i>{{ \Carbon\Carbon::now()->format('d M Y') }}
                </div>
            </div>

            <!-- Alerts Section -->
            @if(session('error') || session('success') || $errors->any())
            <div class="row mb-4">
                <div class="col-12">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class='bx bx-error-circle me-2'></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class='bx bx-check-circle me-2'></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class='bx bx-error-circle me-2'></i>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Stats Cards Row -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-primary p-3 me-3">
                                <i class='bx bx-time text-white fs-4'></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Total Antrian</h6>
                                <h3 class="mb-0 fw-bold">{{ count($antrian) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-success p-3 me-3">
                                <i class='bx bx-check-circle text-white fs-4'></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Dilayani</h6>
                                <h3 class="mb-0 fw-bold">{{ $antrian->where('status', 'dilayani')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-warning p-3 me-3">
                                <i class='bx bx-calendar-check text-white fs-4'></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Reservasi</h6>
                                <h3 class="mb-0 fw-bold">{{ isset($reservasi) ? $reservasi->count() : 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Patient Queue Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom-0 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-primary">
                                    <i class='bx bx-user-circle me-2'></i>Daftar Pasien
                                </h5>
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class='bx bx-search'></i>
                                        </span>
                                        <input type="text" id="searchPatient" class="form-control border-start-0 ps-0" placeholder="Cari pasien...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle border-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="rounded-start border-0" style="width: 70px;">No</th>
                                            <th class="border-0" style="width: 150px;">Nomor Antrian</th>
                                            <th class="border-0" style="width: 150px;">Poli</th>
                                            <th class="border-0" style="width: 150px;">Status</th>
                                            <th class="rounded-end border-0" style="width: 250px;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($antrian as $antri)
                                        <tr class="queue-item">
                                            <td class="fw-bold text-muted">{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="badge bg-primary text-white px-3 py-2 fs-6 fw-bold" style="min-width: 80px; display: inline-block;">
                                                    {{ $antri->nomor_antrian }}
                                                </span>
                                            </td>
                                            <td>{{ $antri->poli->nama_poli }}</td>
                                            <td>
                                                @if($antri->status == 'dilayani')
                                                    <span class="badge bg-success px-3 py-2">
                                                        <i class='bx bx-check me-1'></i>Dilayani
                                                    </span>
                                                @elseif($antri->status == 'dipanggil')
                                                    <span class="badge bg-warning px-3 py-2">
                                                        <i class='bx bx-bell me-1'></i>Dipanggil
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary px-3 py-2">
                                                        <i class='bx bx-time me-1'></i>Menunggu
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('antrian.update-status') }}" method="POST" style="display: inline;" id="form-antrian-{{ $antri->id }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $antri->id }}">
                                                        <input type="hidden" name="status" value="dilayani">
                                                        <button type="button" class="btn btn-primary btn-sm btn-call me-2"
                                                            data-id="{{ $antri->id }}"
                                                            data-nomor="{{ $antri->nomor_antrian }}"
                                                            data-poli="{{ $antri->poli->nama_poli }}"
                                                            data-form="form-antrian-{{ $antri->id }}">
                                                            <i class='bx bx-user-voice me-1'></i> Panggil Lagi
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('antrian.delete') }}" method="POST" style="display: inline;" id="form-delete-{{ $antri->id }}" onsubmit="return confirm('Apakah Anda yakin ingin mengakhiri antrian ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $antri->id }}">
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            <i class='bx bx-x-circle me-1'></i> Akhiri Antrian
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if(count($antrian) == 0)
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class='bx bx-list-ul text-muted' style="font-size: 3rem;"></i>
                                                    <p class="mt-2 text-muted">Tidak ada antrian pasien saat ini</p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reservation Card -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pt-4">
                            <h5 class="mb-0 text-primary">
                                <i class='bx bx-calendar-event me-2'></i>Daftar Antrian Reservasi
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle border-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="rounded-start border-0" style="width: 70px;">No</th>
                                            <th class="border-0" style="width: 150px;">Nomor Reservasi</th>
                                            <th class="border-0">Alasan</th>
                                            <th class="border-0" style="width: 150px;">Tanggal</th>
                                            <th class="rounded-end border-0" style="width: 200px;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($reservasi) && $reservasi->count() > 0)
                                            @foreach($reservasi as $res)
                                            <tr>
                                                <td class="fw-bold text-muted">{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="badge bg-info text-white px-3 py-2 fs-6 fw-bold" style="min-width: 80px; display: inline-block;">
                                                        {{ $res->nomor_antrian }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="text-truncate" style="max-width: 300px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $res->alasan }}">
                                                            {{ $res->alasan }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class='bx bx-calendar me-2 text-muted'></i>
                                                        {{ \Carbon\Carbon::parse($res->tanggal)->format('d M Y') }}
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($res->status == 'pending')
                                                        <div class="btn-group" role="group">
                                                            <form action="{{ route('dokter.accept-reservation') }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $res->id }}">
                                                                <button type="submit" class="btn btn-success btn-sm me-2">
                                                                    <i class='bx bx-check me-1'></i> Terima
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('dokter.reject-reservation') }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $res->id }}">
                                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                                    <i class='bx bx-x me-1'></i> Tolak
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        @if($res->status == 'accepted')
                                                            <span class="badge bg-success px-3 py-2">
                                                                <i class='bx bx-check-circle me-1'></i> Diterima
                                                            </span>
                                                        @elseif($res->status == 'rejected')
                                                            <span class="badge bg-danger px-3 py-2">
                                                                <i class='bx bx-x-circle me-1'></i> Ditolak
                                                            </span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center py-4">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <i class='bx bx-calendar-x text-muted' style="font-size: 3rem;"></i>
                                                        <p class="mt-2 text-muted">Tidak ada data reservasi</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Audio elements for notifications -->
<audio id="notif-audio" src="{{ asset('assetsAdmin/audio/notif.mp3') }}" preload="auto"></audio>
<audio id="notif-keluar" src="{{ asset('assetsAdmin/audio/notifkeluar.mp3') }}" preload="auto"></audio>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Search functionality
    const searchInput = document.getElementById('searchPatient');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('.queue-item');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    }

    // Elements
    const callButtons = document.querySelectorAll('.btn-call');
    const notifAudio = document.getElementById('notif-audio');
    const notifKeluar = document.getElementById('notif-keluar');
    const synth = window.speechSynthesis;

    // CSRF Token for requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Event listener for call buttons
    callButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default form submission
            console.log("Button clicked!");

            // Make sure the button has the required data attributes
            const nomorAntrian = button.getAttribute('data-nomor');
            const namaPoli = button.getAttribute('data-poli');
            const antrianId = button.getAttribute('data-id');
            const formId = button.getAttribute('data-form');

            const row = button.closest('tr'); // Find the row where the button is located
            const selectElement = row.querySelector('select'); // Find dropdown in that row
            const selectedDoctor = selectElement ? selectElement.value : "Dokter"; // Default if none selected

            // Skip if any data is missing
            if (!nomorAntrian || !namaPoli) {
                console.log("Button does not have complete data");
                return;
            }

            // Show calling notification
            Swal.fire({
                title: 'Memanggil Pasien',
                html: `<div class="text-center">
                         <div class="spinner-grow text-primary mb-3" role="status"></div>
                         <p>Memanggil nomor antrian <strong>${nomorAntrian}</strong></p>
                         <p class="small text-muted">Mohon tunggu...</p>
                       </div>`,
                showConfirmButton: false,
                allowOutsideClick: false
            });

            console.log(`Number: ${nomorAntrian}, Poly: ${namaPoli}, ID: ${antrianId}`);

            const textToSpeak = `Nomor antrian ${nomorAntrian} ${namaPoli}, menuju ke ruangan Dokter ${namaPoli}.`;
            let repeatCount = 0;
            const maxRepeat = 3;

            // Play notification audio
            notifAudio.play();

            notifAudio.onended = () => {
                if ('speechSynthesis' in window) {
                    function speakText() {
                        if (repeatCount < maxRepeat) {
                            const utterance = new SpeechSynthesisUtterance(textToSpeak);
                            utterance.lang = "id-ID";
                            utterance.volume = 1;
                            utterance.rate = 1;
                            utterance.pitch = 1;

                            utterance.onend = function() {
                                repeatCount++;
                                console.log(`Repetition ${repeatCount} completed`);

                                if (repeatCount >= maxRepeat) {
                                    console.log("Playing exit notification");
                                    notifKeluar.play();

                                    notifKeluar.onended = function() {
                                        // After all sounds finish, submit form to update status
                                        document.getElementById(formId).submit();

                                        // Close the SweetAlert
                                        Swal.close();
                                    };
                                } else {
                                    setTimeout(speakText, 1000);
                                }
                            };

                            synth.speak(utterance);
                            console.log(`Starting repetition ${repeatCount + 1}`);
                        }
                    }

                    speakText();
                } else {
                    console.error("Browser does not support Text-to-Speech feature.");

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Browser Anda tidak mendukung fitur Text-to-Speech.',
                        confirmButtonText: 'OK'
                    });

                    // Submit form directly if TTS is not supported
                    document.getElementById(formId).submit();
                }
            };
        });
    });

    // Function to update queue status to server
    function updateAntrianStatus(id, status) {
        // Get CSRF token from meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/update-status-antrian', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                id: id,
                status: status
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Status successfully updated:', data);

            // Update UI without refresh
            const row = document.querySelector(`button[data-id="${id}"]`).closest('tr');
            const statusCell = row.querySelector('td:nth-child(4) span');

            // Update badge class
            statusCell.className = 'badge bg-success px-3 py-2';
            statusCell.innerHTML = '<i class="bx bx-check me-1"></i>Dilayani';

            // Show success toast
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Status pasien telah diperbarui',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        })
        .catch(error => {
            console.error('Error updating status:', error);

            // Show error toast
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Gagal memperbarui status pasien',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        });
    }
});
</script>

<!-- Additional styles -->
<style>
    .page-title {
        font-size: 1.75rem;
        margin-bottom: 0.25rem;
    }

    .card {
        border-radius: 0.75rem;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05) !important;
    }

    .table th {
        font-weight: 600;
        color: #555;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    .table td {
        padding: 1rem 0.75rem;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.03);
    }

    .btn {
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    .badge {
        font-weight: 500;
        border-radius: 0.5rem;
    }

    .card-header {
        border-top-left-radius: 0.75rem !important;
        border-top-right-radius: 0.75rem !important;
    }
</style>
@endsection
