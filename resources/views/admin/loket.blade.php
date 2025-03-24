@extends('templates.mainAdmin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="main">
    <div class="container-fluid p-0">
        <!-- Header Section -->
        <div class="header-bar rounded-lg d-flex justify-content-between align-items-center mb-4 px-4 py-3 bg-white shadow-sm">
            <div class="d-flex align-items-center">
                <div class="header-icon bg-primary rounded-circle me-3">
                    <i class="bx bx-plus-medical text-white"></i>
                </div>
                <h2 class="mb-0 fw-bold">Manajemen Poli</h2>
            </div>
            <div>
                <a href="{{ route('daftarantri') }}" class="btn btn-primary rounded-4 px-4">
                    <i class="bx bx-desktop"></i> Display Antrian
                </a>
            </div>
        </div>

        <!-- Add Poli Section -->
        <div class="section-title d-flex align-items-center mb-3">
            <div class="icon-wrapper bg-primary-soft rounded-circle me-2">
                <i class="bx bx-plus text-primary"></i>
            </div>
            <h3 class="mb-0 fs-5 fw-semibold">Tambah Poli Baru</h3>
        </div>

        <div class="form-container bg-white rounded-lg shadow-sm p-4 mb-5">
            <form action="{{ route('loket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label class="form-label text-muted mb-2">Nama Poli</label>
                        <input type="text" class="form-control form-control-lg" name="nama_poli" placeholder="Masukkan nama poli" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label text-muted mb-2">Jumlah Loket</label>
                        <input type="number" class="form-control form-control-lg" name="limit_reservasi" placeholder="Masukkan jumlah loket" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label text-muted mb-2">Jam Operasional</label>
                        <div class="d-flex align-items-center">
                            <input type="time" class="form-control form-control-lg" name="jam_buka" required>
                            <div class="mx-3 text-muted">hingga</div>
                            <input type="time" class="form-control form-control-lg" name="jam_tutup" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label text-muted mb-2">Icon Poli</label>
                        <div class="file-input-container">
                            <input type="file" class="form-control form-control-lg" name="icon_image" id="icon_image">
                            <div class="form-text mt-1">Format: PNG, JPG, SVG (max: 2MB)</div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-light btn-lg px-4 me-2">Reset</button>
                        <button type="submit" class="btn btn-primary btn-lg px-5">Simpan Poli</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Poli List Section -->
        <div class="section-title d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <div class="icon-wrapper bg-primary-soft rounded-circle me-2">
                    <i class="bx bx-list-ul text-primary"></i>
                </div>
                <h3 class="mb-0 fs-5 fw-semibold">Daftar Poli</h3>
            </div>
            <span class="badge bg-primary rounded-pill px-3 py-2">
                {{ count($polis) }} Poli
            </span>
        </div>

        <!-- Poli Cards -->
        <div class="row g-3">
            @foreach($polis as $poli)
            <div class="col-lg-4 col-md-6">
                <div class="poli-card bg-white rounded-lg shadow-sm p-4 mb-2">
                    <div class="poli-header d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <div class="poli-icon rounded-circle bg-primary me-3">
                                <i class="bx bx-plus-medical text-white"></i>
                            </div>
                            <h4 class="mb-0 fs-5 fw-semibold">{{ $poli->nama_poli }}</h4>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-horizontal-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="bx bx-edit me-2 text-primary"></i> Edit
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger deleteButton" href="javascript:void(0);" data-id="{{ $poli->id }}">
                                        <i class="bx bx-trash me-2"></i> Hapus
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="poli-info mb-4">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon me-3 bg-light rounded-circle">
                                <i class="bx bx-time text-primary"></i>
                            </div>
                            <div>
                                <div class="info-label text-muted">Jam Operasional</div>
                                <div class="info-value">
                                    {{ isset($poli->jam_buka) && isset($poli->jam_tutup) ?
                                       \Carbon\Carbon::parse($poli->jam_buka)->format('H:i') . ' - ' .
                                       \Carbon\Carbon::parse($poli->jam_tutup)->format('H:i') :
                                       'Tidak diatur' }}
                                </div>
                            </div>
                        </div>

                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon me-3 bg-light rounded-circle">
                                <i class="bx bx-user text-primary"></i>
                            </div>
                            <div>
                                <div class="info-label text-muted">Jumlah Pegawai</div>
                                <div class="info-value">{{ $poli->users_count }} Orang</div>
                            </div>
                        </div>

                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon me-3 bg-light rounded-circle">
                                <i class="bx bx-cabinet text-primary"></i>
                            </div>
                            <div>
                                <div class="info-label text-muted">Jumlah Loket</div>
                                <div class="info-value">{{ $poli->limit_reservasi ?? 'Tidak diatur' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="poli-status d-flex justify-content-between align-items-center pt-3 border-top">
                        <div class="status-label">Status Poli</div>
                        <div class="status-toggle">
                            <label class="switch-wrapper">
                                <input type="checkbox" class="switch"
                                       data-id="{{ $poli->id }}"
                                       {{ $poli->status == 2 ? 'checked' : '' }}>
                                <span class="slider round"></span>
                                <span class="status-text ms-2">{{ $poli->status == 2 ? 'Aktif' : 'Nonaktif' }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Hidden Delete Form -->
                <form id="deleteForm-{{ $poli->id }}" action="{{ route('poli.destroy', $poli->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            @endforeach

            <!-- Empty State -->
            @if(count($polis) == 0)
            <div class="col-12">
                <div class="empty-state bg-white rounded-lg shadow-sm p-5 text-center">
                    <div class="empty-icon-wrapper">
                        <div class="empty-icon bg-light rounded-circle d-inline-flex">
                            <i class="bx bx-plus-medical text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-2">Belum Ada Poli</h4>
                    <p class="text-muted mb-4">Tambahkan poli baru untuk mulai mengelola antrian pasien</p>
                    <button class="btn btn-primary btn-lg px-4" onclick="document.querySelector('input[name=nama_poli]').focus();">
                        <i class="bx bx-plus-circle me-1"></i> Tambah Poli Sekarang
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Delete button handlers
        document.querySelectorAll(".deleteButton").forEach(button => {
            button.addEventListener("click", function () {
                let poliId = this.getAttribute("data-id");

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data poli akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="bx bx-trash me-1"></i> Ya, hapus!',
                    cancelButtonText: '<i class="bx bx-x me-1"></i> Batal',
                    reverseButtons: true,
                    buttonsStyling: true,
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-light me-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`deleteForm-${poliId}`).submit();
                    }
                });
            });
        });

        // Toggle switch handlers
        document.querySelectorAll('.switch').forEach(switchElement => {
            switchElement.addEventListener('change', function() {
                const poliId = this.getAttribute('data-id');
                const newStatus = this.checked ? 2 : 1;
                const statusLabel = this.nextElementSibling;

                // Update label text immediately for responsive UI
                statusLabel.textContent = this.checked ? 'Aktif' : 'Nonaktif';

                // Show loading toast
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });

                Toast.fire({
                    icon: 'info',
                    title: 'Memperbarui status...'
                });

                fetch(`/admin/poli/toggle-status/${poliId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Status poli berhasil diperbarui'
                        });
                    } else {
                        // Revert switch if error
                        this.checked = !this.checked;
                        statusLabel.textContent = this.checked ? 'Aktif' : 'Nonaktif';

                        Toast.fire({
                            icon: 'error',
                            title: data.message || 'Terjadi kesalahan'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Revert switch if error
                    this.checked = !this.checked;
                    statusLabel.textContent = this.checked ? 'Aktif' : 'Nonaktif';

                    Toast.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan pada server'
                    });
                });
            });
        });

        // File input preview
        const iconInput = document.getElementById('icon_image');
        if (iconInput) {
            iconInput.addEventListener('change', function() {
                // Could add image preview functionality here
                const fileName = this.files[0]?.name || 'Tidak ada file dipilih';
                this.parentElement.querySelector('.form-control').setAttribute('title', fileName);
            });
        }
    });
</script>

<style>
    /* Modern, clean styling */
    body {
        background-color: #f5f7fa;
    }

    .main {
        padding: 1.5rem;
    }

    /* Header styling */
    .header-bar {
        background-color: #fff;
        height: 70px;
    }

    .header-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Section titles */
    .section-title {
        padding: 0.5rem 0;
    }

    .icon-wrapper {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bg-primary-soft {
        background-color: rgba(13, 110, 253, 0.1);
    }

    /* Form styling */
    .form-container {
        border-radius: 12px;
    }

    .form-control {
        border-radius: 8px;
        border-color: #e2e8f0;
        padding: 0.75rem 1rem;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.15);
    }

    .form-control-lg {
        height: 54px;
    }

    .form-label {
        font-weight: 500;
        font-size: 0.875rem;
    }

    /* Button styling */
    .btn {
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-lg {
        height: 54px;
    }

    .rounded-4 {
        border-radius: 12px;
    }

    /* Poli card styling */
    .poli-card {
        border-radius: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .poli-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08) !important;
    }

    .poli-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-label {
        font-size: 0.75rem;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-weight: 500;
    }

    /* Toggle switch styling */
    .switch-wrapper {
        position: relative;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
        margin: 0;
        vertical-align: middle;
        -webkit-appearance: none;
        appearance: none;
        outline: none;
    }

    .switch:before {
        content: "";
        position: absolute;
        width: 36px;
        height: 16px;
        left: 2px;
        bottom: 2px;
        background-color: #e2e8f0;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .switch:after {
        content: "";
        position: absolute;
        width: 18px;
        height: 18px;
        left: 2px;
        bottom: 1px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s;
    }

    .switch:checked:before {
        background-color: #3b82f6;
    }

    .switch:checked:after {
        transform: translateX(18px);
    }

    .status-text {
        font-weight: 500;
        font-size: 0.875rem;
    }

    /* Empty state styling */
    .empty-state {
        padding: 3rem;
        border-radius: 12px;
    }
    .empty-icon-wrapper {
            margin-bottom: 1.5rem;
        }
        .empty-icon {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .empty-icon i {
            font-size: 3rem;
        }
</style>
@endsection
