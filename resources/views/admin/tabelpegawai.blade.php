@extends('templates.mainAdmin')
@section('content')

<!-- MAIN CONTENT -->
<div class="main py-5" style="margin-top: 20px;">
    <div class="container-fluid">


        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card bg-white rounded-lg shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon rounded-circle bg-primary-soft me-3">
                            <i class="bx bx-group text-primary"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ count($pegawai) }}</h3>
                            <p class="text-muted mb-0">Total Pegawai</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card bg-white rounded-lg shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon rounded-circle bg-success-soft me-3">
                            <i class="bx bx-user-check text-success"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $pegawai->where('role_id', 2)->count() }}</h3>
                            <p class="text-muted mb-0">Dokter</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card bg-white rounded-lg shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon rounded-circle bg-info-soft me-3">
                            <i class="bx bx-user-voice text-info"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $pegawai->where('role_id', 3)->count() }}</h3>
                            <p class="text-muted mb-0">Petugas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card bg-white rounded-lg shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon rounded-circle bg-warning-soft me-3">
                            <i class="bx bx-clinic text-warning"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $jumlahPoli }}</h3>
                            <p class="text-muted mb-0">Poli Terintegrasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table Card -->
        <div class="data-card bg-white rounded-lg shadow-sm mb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3 px-4 border-bottom">
                <h5 class="mb-0 fw-semibold">
                    <i class="bx bx-list-ul text-primary me-1"></i> Daftar Pegawai
                </h5>
                <div class="search-box">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="bx bx-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-0 bg-light" id="searchUsers" placeholder="Cari pegawai...">
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="usersTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3 px-4 text-center" style="width: 50px;">No</th>
                                <th class="py-3 px-4">Nama</th>
                                <th class="py-3 px-4">Role</th>
                                <th class="py-3 px-4">Poli</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4 text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $worker)
                            <tr>
                                <td class="text-center px-4">{{ $loop->iteration }}</td>
                                <td class="px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-circle bg-light me-2">
                                            <span class="avatar-initials">{{ substr($worker->name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">{{ $worker->name }}</p>
                                            @if($worker->poli)
                                                <small class="text-muted d-block d-md-none">{{ $worker->poli->nama_poli }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4">
                                    <span class="badge rounded-pill px-3 py-2
                                        @if($worker->role->name == 'Admin') bg-danger
                                        @elseif($worker->role->name == 'Dokter') bg-success
                                        @elseif($worker->role->name == 'Petugas') bg-info
                                        @else bg-secondary @endif">
                                        {{ $worker->role->name }}
                                    </span>
                                </td>
                                <td class="px-4">
                                    @if($worker->poli)
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-clinic text-primary me-1"></i>
                                            <span>{{ $worker->poli->nama_poli }}</span>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-envelope text-muted me-1"></i>
                                        <span>{{ $worker->email }}</span>
                                    </div>
                                </td>
                                <td class="text-center px-4">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('admin.pegawai.edit', $worker->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Edit Pegawai">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('pegawai.destroy', $worker->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                            data-id="{{ $worker->id }}"
                                            title="Hapus Pegawai">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if(count($pegawai) == 0)
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="empty-state">
                                            <div class="empty-icon-wrapper mb-3">
                                                <i class="bx bx-user-x text-secondary" style="font-size: 3rem;"></i>
                                            </div>
                                            <h5>Tidak ada data pegawai</h5>
                                            <p class="text-muted">Belum ada pegawai yang terdaftar dalam sistem</p>
                                            <a href="{{ route('admin.pegawai.create') ?? '#' }}" class="btn btn-primary mt-2">
                                                <i class="bx bx-plus me-1"></i> Tambah Pegawai Baru
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-top d-flex justify-content-between align-items-center py-3 px-4">
                <div class="pagination-info text-muted small">
                    Menampilkan <span class="fw-semibold">1-{{ count($pegawai) }}</span> dari <span class="fw-semibold">{{ count($pegawai) }}</span> data
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="bx bx-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select">
                            <option value="">Semua Role</option>
                            <option value="admin">Admin</option>
                            <option value="dokter">Dokter</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Poli</label>
                        <select class="form-select">
                            <option value="">Semua Poli</option>
                            @foreach($pegawai->whereNotNull('poli_id')->pluck('poli_id', 'poli.nama_poli')->unique() as $nama => $id)
                                <option value="{{ $id }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Terapkan Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="delete-icon-wrapper mb-3 mx-auto">
                    <i class="bx bx-trash text-danger"></i>
                </div>
                <h5 class="mb-2">Hapus Pegawai</h5>
                <p class="text-muted mb-4">Apakah Anda yakin ingin menghapus pegawai ini? Data yang terhapus tidak dapat dikembalikan.</p>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* General styles */
    body {
        background-color: #f5f7fa;
    }

    .main {
        padding: 2rem 1.5rem;
        margin-top: 30px;
    }

    /* Header styling */
    .header-bar {
        background-color: #fff;
        height: 70px;
        margin-top: 30px;
    }

    .header-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Cards styling */
    .stat-card {
        border-radius: 12px;
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .data-card {
        border-radius: 12px;
        overflow: hidden;
    }

    /* Icon backgrounds */
    .bg-primary-soft {
        background-color: rgba(13, 110, 253, 0.1);
    }

    .bg-success-soft {
        background-color: rgba(25, 135, 84, 0.1);
    }

    .bg-info-soft {
        background-color: rgba(13, 202, 240, 0.1);
    }

    .bg-warning-soft {
        background-color: rgba(255, 193, 7, 0.1);
    }

    /* Stats icons */
    .stat-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    /* Avatar styling */
    .avatar {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .avatar-initials {
        font-weight: 600;
        font-size: 0.875rem;
        color: #6c757d;
    }

    .avatar-circle {
        border-radius: 50%;
    }

    /* Table styling */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        font-weight: 600;
        color: #495057;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    .table tbody tr {
        border-color: #f0f0f0;
    }

    .table tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.03);
    }

    /* Buttons styling */
    .btn {
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    /* Empty state */
    .empty-state {
        padding: 2rem 1rem;
        text-align: center;
    }

    .empty-icon-wrapper {
        margin-bottom: 1rem;
    }

    /* Search box */
    .search-box .input-group {
        border-radius: 0.375rem;
        overflow: hidden;
    }

    .search-box .form-control:focus {
        box-shadow: none;
    }

    /* Delete icon */
    .delete-icon-wrapper {
        width: 60px;
        height: 60px;
        background-color: rgba(220, 53, 69, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .delete-icon-wrapper i {
        font-size: 2rem;
    }

    /* Pagination styling */
    .pagination .page-link {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.25rem;
        margin: 0 0.125rem;
    }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .stat-card {
            margin-bottom: 1rem;
        }

        .table-responsive {
            border-radius: 0.375rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Search functionality
        const searchInput = document.getElementById('searchUsers');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchValue = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('#usersTable tbody tr');

                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // Delete confirmation
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        let currentForm = null;

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                currentForm = this.closest('form');
                deleteModal.show();
            });
        });

        const confirmDeleteBtn = document.getElementById('confirmDelete');
        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function() {
                if (currentForm) {
                    currentForm.submit();
                }
                deleteModal.hide();
            });
        }
    });
</script>
<script>
$(document).on('click', '.delete-btn', function(e) {
    e.preventDefault();
    const deleteForm = $(this).closest('.delete-form');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data pegawai akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteForm.submit();
        }
    });
});

</script>
@if(session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
@endif

@endsection
